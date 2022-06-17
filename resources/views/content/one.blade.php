@extends('layouts.app')
@section('content')

    <h1>Данные пользователя {{$user->name}} ID{{$user->id}}</h1>
    <div style="height: 16px;">
    </div>
    @if($user->avatar_path)
        <img src="{{ \Storage::disk('public')->url( $user->avatar_path) }}" alt="avatar"
             style="width: 200px;">
    @else
        <img src="/img/no_photo.jpg" alt="avatar" style="width: 200px;">
    @endif
    <table style="margin-bottom: 30px;">
        <thead style="border-bottom: 2px solid black; border-right: 1px solid black; padding: 14px">
        <tr style="border: 2px solid black; padding: 14px">
            <th style="border: 2px solid black; padding: 14px">ID</th>
            <th style="border: 2px solid black; color: blue; padding: 14px">Имя</th>
            <th style="border: 2px solid black; padding: 14px">Аватар</th>
            <th style="border: 2px solid black; padding: 14px">Телефон</th>
        </tr>
        </thead>
        <tbody>
        <tr style="border-bottom: 2px solid black; border-right: 1px solid black; padding: 14px">
            <td style="border-bottom: 2px solid black; border-right: 1px solid black; padding: 14px">{{ $user->id }}</td>
            <td style="border-bottom: 2px solid black; border-right: 1px solid black; padding: 14px">{{ $user->name }}</td>
            <td style="border-bottom: 2px solid black; border-right: 1px solid black; padding: 14px">{{ $user->avatar_path }}</td>
            <td style="border-bottom: 2px solid black; border-right: 1px solid black; padding: 14px">{{ $user->phone_number }}</td>
        </tr>
        </tbody>
    </table>
    <a  style="color: white;
    text-decoration: none;
                       background-color: #2D3748;
                       padding: 6px;
                       border-radius: 10px;
                       margin-right: 14px;
                       outline: none;
                       cursor: pointer;
                " href="{{route('delete', ['id' => $user->id])}}">
        Удалить
    </a>
    <a  style="color: white;
    text-decoration: none;
                       background-color: #2D3748;
                       padding: 6px;
                       border-radius: 10px;
                       margin-right: 14px;
                       outline: none;
                       cursor: pointer;
                " href="{{route('create', ['id' => $user->id])}}">
        Редактировать
    </a>

@endsection
