<?php

namespace App\Repositories;

use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;

class InDataBaseUserRepository implements UserRepositoryInterface
{
    public function getAll()
    {
        return UserResource::collection(User::all());
    }

    public function store(UserRequest $userRequest)
    {
        $user = User::create($userRequest->validated());
        return new UserResource($user);
    }

    public function getOne(User $user)
    {
        return new UserResource($user);
    }

    public function update(UserRequest $userRequest, User $user)
    {
        $user->update($userRequest->validated());
        return new UserResource($user);
    }

    public function delete(User $user)
    {
        return $user->delete();
    }
}
