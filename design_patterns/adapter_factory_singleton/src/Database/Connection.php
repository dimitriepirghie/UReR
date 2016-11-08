<?php

namespace Urer\Database;

use Urer\Config;
use Urer\Database\Driver\DriverFactory;
use Urer\Database\Driver\DriverInterface;

class Connection
{
    /**
     * @var Connection
     */
    private static $instance;

    /**
     * @var DriverInterface
     */
    private $driver;

    /**
     * Get the instance.
     *
     * @return Connection
     */
    public static function getInstance()
    {
        if (null === static::$instance) {
            static::$instance = new static((new DriverFactory())->make(Config::get('database')));
        }

        return static::$instance;
    }

    /**
     * Connection constructor.
     *
     * @param DriverInterface $driver
     */
    protected function __construct(DriverInterface $driver)
    {
        $this->driver = $driver;
        $this->driver->connect();
    }

    /**
     * Close our connection.
     */
    protected function __destruct()
    {
        $this->driver->disconnect();
    }

    /**
     * Private clone method to prevent cloning of the instance of the
     * Connection instance.
     *
     * @return void
     */
    private function __clone() {}

}