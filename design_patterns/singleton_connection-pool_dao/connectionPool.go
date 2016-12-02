package database

import (
	"sync"
	"time"
)

type connInterface interface {
	Query(params map[string]string)
	dbType() string
	close()
}

type databaseInterface interface {
	getConnection() *connInterface
	returnConnection(conn *connInterface) bool
	canCreateMoreConnections() bool
	mkConn() *connInterface
}

type databaseManager struct {
	databases         map[string]*databaseInterface
	hasAvailableSpace map[string]chan bool
}

var instance *databaseManager
var once sync.Once

func GetDatabaseManager() *databaseManager {
	once.Do(func() {
		instance = &databaseManager{}
		//register all posible databases
	})
	return instance
}

func (dbManager *databaseManager) getConnection(connType string) *connInterface {
	return (*dbManager.databases[connType]).getConnection()
}

func (dbManager *databaseManager) canCreateMoreConnections(connType string) bool {
	return (*dbManager.databases[connType]).canCreateMoreConnections()
}

func (dbManager *databaseManager) mkConn(connType string) *connInterface {
	return (*dbManager.databases[connType]).mkConn()
}

func (dbManager *databaseManager) GetConnection(connType string) (*connInterface, error) {
	if _, ok := instance.databases[connType]; !ok {
		//database type does not exist - return error
	}

	// Try to grab an available connection within 1ms
	select {
	case conn := dbManager.getConnection(connType):
		return conn, nil
	case <-time.After(time.Millisecond):
	// No connection came around in time, let's see
	// whether we can get one or build a new one first.
		select {
		case conn := dbManager.getConnection(connType):
			return conn, nil
		case dbManager.canCreateMoreConnections(connType):
		// Room to make a connection
			conn := dbManager.mkConn(connType)
			return conn
		}
	}
}

func (cp *databaseManager) Return(conn *connInterface) {
	if !(*cp.databases[(*conn).dbType()]).returnConnection(conn) {
		(*conn).close()
	}
}