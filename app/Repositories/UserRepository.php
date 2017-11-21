<?php

namespace App\Repositories;

use App\User;

class UserRepository implements UserRepositoryInterface
{
    protected $eloquent;

    public function __construct(User $eloquent)
    {
        $this->eloquent = $eloquent;
    }

    public function createUser(array $params)
    {
        return $this->eloquent->create($params);
    }
}
