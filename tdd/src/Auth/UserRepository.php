<?php

namespace Urer\Auth;

class UserRepository
{
    /*
     * @var \Urer\Auth\User[]
     */
    protected $users;

    /**
     * UserRepository constructor.
     */
    public function __construct()
    {
        $users = require 'users.php';

        $this->users = array_map(function ($value) {
            return new User($value['username'], $value['password']);
        }, $users);
    }

    /**
     * Find a user by username.
     *
     * @param string $username
     * @return \Urer\Auth\User|null
     */
    public function findByUsername($username)
    {
        $found = array_filter($this->users, function (User $value) use ($username) {
            return $username === $value->getUsername();
        });

        return count($found) ? reset($found) : null;
    }
}