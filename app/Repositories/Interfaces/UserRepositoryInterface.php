<?php

namespace App\Repositories\Interfaces;

use App\Http\Requests\UserRequest;
use App\Models\User;

interface UserRepositoryInterface
{
    public function getAll();

    public function store(UserRequest $userRequest);

    public function getOne(User $user);

    public function update(UserRequest $userRequest, User $user);

    public function delete(User $user);
}
