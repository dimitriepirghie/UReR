<?php

namespace Urer\Auth;

use Doctrine\Instantiator\Exception\InvalidArgumentException;
use Urer\Exceptions\InvalidCredentialsException;
use Urer\Exceptions\UserNotFoundException;

class Auth
{
    /*
     * @var \Urer\Auth\UserRepository
     */
    protected $repository;

    /*
     * @var \Urer\Auth\Session
     */
    protected $session;

    /**
     * Auth constructor.
     */
    public function __construct()
    {
        $this->repository = new UserRepository();
        $this->session = new Session();
    }

    /**
     * Logs in the user.
     *
     * @param string $username
     * @param string $password
     * @return User
     *
     * @throws InvalidCredentialsException
     * @throws InvalidArgumentException
     * @throws UserNotFoundException
     */
    public function login($username, $password)
    {
        if (! $username || ! $password) {
            throw new InvalidArgumentException('You must provide a username and a password.');
        }

        if (! $user = $this->repository->findByUsername(trim($username))) {
            throw new UserNotFoundException();
        }

        if ($user->checkPassword($password)) {
            $this->session->set('user', $user);
            return $user;
        }

        throw new InvalidCredentialsException();
    }

    /**
     * Checks if the user is logged in.
     *
     * @return bool
     */
    public function isLoggedIn()
    {
        return $this->session->has('user');
    }

    /**
     *Logs out the user.
     *
     * @return void
     */
    public function logout()
    {
        $this->session->remove('user');
    }
}
