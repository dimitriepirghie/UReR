<?php

namespace Urer\Database\Driver;

abstract class Driver implements DriverInterface
{
    /**
     * @var array
     */
    private $credentials;

    /**
     * @var string
     */
    private $database;

    /**
     * @var string
     */
    private $prefix;

    /**
     * Driver constructor.
     *
     * @param array $credentials
     * @param string $database
     * @param string $prefix
     */
    public function __construct($credentials, $database, $prefix)
    {
        $this->credentials = $credentials;
        $this->database = $database;
        $this->prefix = $prefix;
    }
}