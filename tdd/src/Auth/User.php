<?php

namespace Urer\Auth;

class User
{
    /*
     * @var string
     */
    private $username;

    /*
     * @var string
     */
    private $password;

    /**
     * User constructor.
     *
     * @param $username
     * @param $password
     */
    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return bool
     */
    public function checkPassword($password)
    {
        return $password === $this->password;
    }
}