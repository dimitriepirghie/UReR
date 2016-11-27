<?php

use PHPUnit\Framework\TestCase;
use Urer\Exceptions\InvalidCredentialsException;
use Urer\Exceptions\UserNotFoundException;

class AuthTest extends TestCase
{
    /**
     * @var \Urer\Auth\Auth
     */
    public $auth;

    public function setUp()
    {
        parent::setUp();

        $this->auth = new Urer\Auth\Auth();
    }

    /** @test */
    public function is_in_guest_mode()
    {
        $this->assertFalse($this->auth->isLoggedIn());
    }

    /** @test */
    public function it_authenticates_the_user()
    {
        $this->assertFalse($this->auth->isLoggedIn());

        $this->auth->login('eduard', 'tofan');

        $this->assertTrue($this->auth->isLoggedIn());
    }

    /** @test */
    public function it_authenticates_the_user_using_spaces_in_the_username()
    {
        $this->auth->login('eduard   ', 'tofan');

        $this->assertTrue($this->auth->isLoggedIn());
    }

    /** @test */
    public function it_logs_out_the_user()
    {
        $this->auth->login('eduard', 'tofan');

        $this->auth->logout();

        $this->assertFalse($this->auth->isLoggedIn());
    }

    /** @test */
    public function throws_exception_when_no_params_are_passed_on_login()
    {
        $this->expectException(InvalidArgumentException::class);

        $this->auth->login('', '');
    }

    /** @test */
    public function throws_exception_when_password_is_invalid()
    {
        $this->expectException(InvalidCredentialsException::class);

        $this->auth->login('eduard', 'tofan123');
    }

    /** @test */
    public function throws_exception_when_user_is_not_found()
    {
        $this->expectException(UserNotFoundException::class);

        $this->auth->login('eduard123', 'tofan123');
    }
}
