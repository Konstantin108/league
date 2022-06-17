<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserController extends Controller
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $users = $this->userRepository->getAll();
        return view('content/all', ['users' => $users]);
    }

    public function one($id): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $id = User::find($id);
        $user = $this->userRepository->getOne($id);
        return view('content/one', ['user' => $user]);
    }

    public function delete($id): \Illuminate\Http\RedirectResponse
    {
        $id = User::find($id);
        $this->userRepository->delete($id);
        return redirect()->route('index')
            ->with('success', 'Пользователь удалён');
    }

    public function create($id)
    {
        if ($id != 0) {
            $id = User::find($id);
            $user = $this->userRepository->getOne($id);
            return view('content/create', ['user' => $user]);
        } else {
            return view('content/create', ['user' => 0]);
        }
    }

    public function store(UserRequest $userRequest)
    {
        $done = $this->userRepository->store($userRequest);
        if ($done) {
            return redirect()->route('index')
                ->with('success', 'Пользователь добавлен');
        }
        return redirect()->route('index')
            ->with('error', 'Произошла ошибка');
    }

    public function update(UserRequest $userRequest, $id)
    {
        $user = User::find($id);
        $done = $this->userRepository->update($userRequest, $user);
        if ($done) {
            return redirect()->route('index')
                ->with('success', 'Данные пользователя обновлены');
        }
        return redirect()->route('index')
            ->with('error', 'Произошла ошибка');
    }
}
