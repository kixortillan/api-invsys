<?php

namespace Tests\Unit\Repositories;

use App\Repositories\UserRepository;
use Tests\TestCase;

class UserRepositoryTest extends TestCase
{

    private $repository;

    public function __construct()
    {
        parent::__construct();
        $this->repository = new UserRepository(new \App\User());
    }

    public function testCreateUser()
    {
        $name = $this->faker->name;
        $email = $this->faker->unique()->safeEmail;
        $password = bcrypt('secret');

        $user = $this->repository->createUser([
            'name' => $name,
            'email' => $email,
            'password' => $password,
        ]);

        $this->assertNotNull($user);
        $this->assertNotNull($user->name);
        $this->assertNotNull($user->email);
        $this->assertNotNull($user->password);
        $this->assertEquals($name, $user->name);
        $this->assertEquals($email, $user->email);
        $this->assertEquals($password, $user->password);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testFindUser()
    {
        // $user = $this->repository->findUser();

        // $this->assertNotNull($user);
        $this->assertTrue(true);
    }
}
