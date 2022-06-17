<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use function redirect;
use function view;

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
//        return view('content/all', ['users' => $users]);
        return $users;
    }

    public function one($id)
    {
        $id = User::findOrFail($id);
        $user = $this->userRepository->getOne($id);
//        return view('content/one', ['user' => $user]);    //<-- для WEB
        return $user;
    }

    public function delete($id): \Illuminate\Http\RedirectResponse
    {
        $id = User::findOrFail($id);
        return $this->userRepository->delete($id);
//        return redirect()->route('index')
//            ->with('success', 'Пользователь удалён');    //<-- для WEB
        $users = $this->userRepository->getAll();
        return $users;
    }

    public function create($id)
    {
        if ($id != 0) {
            $id = User::findOrFail($id);
            $user = $this->userRepository->getOne($id);
            return view('content/create', ['user' => $user]);
        } else {
            return view('content/create', ['user' => 0]);
        }
    }

    public function store(UserRequest $userRequest)
    {
        $done = $this->userRepository->store($userRequest);
        return $done;
//        if ($done) {
//            return redirect()->route('index')
//                ->with('success', 'Пользователь добавлен');    //<-- для WEB
//        }
//        return redirect()->route('index')
//            ->with('error', 'Произошла ошибка');
    }

    public function update(UserRequest $userRequest, $id)
    {
        $user = User::findOrFail($id);
        $done = $this->userRepository->update($userRequest, $user);
        if ($done) {
            return redirect()->route('index')
                ->with('success', 'Данные пользователя обновлены');
        }
        return redirect()->route('index')
            ->with('error', 'Произошла ошибка');
    }
}
