<?php

namespace App\Repositories;

use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\DB;

class InDataBaseUserRepository implements UserRepositoryInterface
{
    private $table = 'users';

    public function getAll(): array
    {
        return DB::select("SELECT * FROM " . $this->table);
    }

    public function getOne(User $user)
    {
        return DB::selectOne("SELECT * FROM " . $this->table . " WHERE id = :id", ['id' => $user->id]);
    }

    public function update(UserRequest $userRequest, User $user)
    {
        $data = $userRequest->validated();
        $data['avatar_path'] = $user->avatar_path;
        if ($userRequest->hasFile('avatar_path')) {
            $image = $userRequest->file('avatar_path');
            $originalExt = $image->getClientOriginalExtension();
            $fileName = uniqid();
            $fileLink = $image->storeAs('users', $fileName . '.' . $originalExt, 'public');
            $data['avatar_path'] = $fileLink;
        }
        return DB::update(
            "UPDATE " .
            $this->table .
            " SET `name` = ?, `avatar_path` = ?, `phone_number` = ?
            WHERE `id` = ?",
            [$data['name'], $data['avatar_path'], $data['phone_number'], $user->id]
        );
    }

    public function store(UserRequest $userRequest)
    {
        $data = $userRequest->validated();
        $data['avatar_path'] = '';
        if ($userRequest->hasFile('avatar_path')) {
            $image = $userRequest->file('avatar_path');
            $originalExt = $image->getClientOriginalExtension();
            $fileName = uniqid();
            $fileLink = $image->storeAs('users', $fileName . '.' . $originalExt, 'public');
            $data['avatar_path'] = $fileLink;
        }
        return DB::insert(
            "INSERT INTO " .
            $this->table .
            " (`name`, `avatar_path`, `phone_number`)
            VALUES (?, ?, ?)",
            [$data['name'], $data['avatar_path'], $data['phone_number']]
        );
    }

    public function delete(User $user)
    {
        return DB::selectOne("DELETE FROM " . $this->table . " WHERE id = :id", ['id' => $user->id]);
    }
}
