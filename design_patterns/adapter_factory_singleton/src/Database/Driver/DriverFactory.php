<?php

namespace Urer\Database\Driver;

use InvalidArgumentException;

class DriverFactory
{
    /**
     * Create a driver based on the configuration.
     *
     * @param  array $config
     * @return Driver
     */
    public function make($config)
    {
        list($driver, $credentials, $database, $prefix) = $this->parseConfig($config);

        return $this->createDriver($driver, $credentials, $database, $prefix);
    }

    /**
     * Create a new driver instance.
     *
     * @param string $driver
     * @param array $credentials
     * @param string $database
     * @param string $prefix
     * @return MySqlDriver|Oci8Driver|SqlServerDriver
     */
    protected function createDriver($driver, $credentials, $database, $prefix = '')
    {
        switch ($driver) {
            case 'mysql':
                return new MySqlDriver($credentials, $database, $prefix);
            case 'oci':
                return new Oci8Driver($credentials, $database, $prefix);
            case 'sqlsrv':
                return new SqlServerDriver($credentials, $database, $prefix);
        }

        throw new InvalidArgumentException("Unsupported driver [$driver]");
    }

    /**
     * Parse the config structure.
     *
     * @param $config
     * @return array
     */
    protected function parseConfig($config)
    {
        return [
            $config['driver'],
            $config['credentials'],
            $config['database'],
            $config['prefix'],
        ];
    }
}