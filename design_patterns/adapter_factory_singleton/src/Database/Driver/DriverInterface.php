<?php

namespace Urer\Database\Driver;

interface DriverInterface
{
    /**
     * Connect to the database.
     *
     * @return mixed
     */
    public function connect();

    /**
     * Reconnect to the database.
     *
     * @return mixed
     */
    public function reconnect();

    /**
     * Disconnect from the database.
     *
     * @return mixed
     */
    public function disconnect();

    /**
     * Execute a statement.
     *
     * @param string $statement
     * @return mixed
     */
    public function execute($statement);
}