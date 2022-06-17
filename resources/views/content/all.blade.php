@extends('layouts.app')
@section('content')

    <h1>Все пользователи</h1>
    <div style="height: 16px;">
        @if(session()->has('success'))
            <span style="color: green">{{session()->get('success')}}</span>
        @elseif(session()->has('error'))
            <span style="color: red">{{session()->get('fail')}}</span>
        @endif
    </div>
    <table>
        <thead style="border-bottom: 2px solid black; border-right: 1px solid black; padding: 10px">
        <tr style="border: 2px solid black; padding: 10px">
            <th style="border: 2px solid black; padding: 10px">ID</th>
            <th style="border: 2px solid black; color: blue; padding: 10px">Ссылка</th>
            <th style="border: 2px solid black; padding: 10px">Имя</th>
            <th style="border: 2px solid black; padding: 10px">Аватар</th>
            <th style="border: 2px solid black; padding: 10px">Телефон</th>
        </tr>
        </thead>
        <tbody>
        @forelse($users as $user)
            <tr style="border-bottom: 2px solid black; border-right: 1px solid black; padding: 10px">
                <td style="border-bottom: 2px solid black; border-right: 1px solid black; padding: 10px">{{ $user->id }}</td>
                <th style="border: 2px solid black; color: blue; padding: 10px">
                    <a href="{{route('one', ['id' => $user->id])}}">
                        перейти
                    </a>
                </th>
                <td style="border-bottom: 2px solid black; border-right: 1px solid black; padding: 10px">{{ $user->name }}</td>
                <td style="border-bottom: 2px solid black; border-right: 1px solid black; padding: 10px">{{ $user->avatar_path }}</td>
                <td style="border-bottom: 2px solid black; border-right: 1px solid black; padding: 10px">{{ $user->phone_number }}</td>
            </tr>
        @empty
            <td colspan="4">данные отсутствуют</td>
        </tbody>
    </table>
    @endforelse

@endsection
