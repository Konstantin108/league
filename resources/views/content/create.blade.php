@extends('layouts.app')
@section('content')

    <form
        @if($user)
        action="{{ route('update', ['id' => $user->id ]) }}"
        method="post"
        @else
        action="{{ route('store') }}"
        method="post"
        @endif
        enctype="multipart/form-data"
    >
        @csrf
        @method('POST')
        @if($user)
            <h1>Редактирование пользователя {{$user->name}} ID{{$user->id}}</h1>
        @else
            <h1>Создание нового пользователя</h1>
        @endif
        <div style="height: 16px;">
        </div>
        <div class="form-group">
            <label for="avatar">Аватар пользователя</label>
            <div style="width: 300px;
                                display:flex;
                                justify-content: flex-start;
                                margin-bottom: 20px;"
            >
                @if($user)
                    @if($user->avatar_path)
                        <img src="{{ \Storage::disk('public')->url( $user->avatar_path) }}" alt="avatar"
                             style="width: 200px;">
                    @else
                        <img src="/img/no_photo.jpg" alt="avatar" style="width: 200px;">
                    @endif
                @else
                    <img src="/img/no_photo.jpg" alt="avatar" style="width: 200px;">
                @endif
            </div>
            <input type="file" id="avatar_path" name="avatar_path" class="form-control"
                   style="width: 500px; margin-bottom: 10px; cursor: pointer">
        </div>
        <div style="display: flex; width: 430px; justify-content: space-between">
            <div>
                <label for="name">Имя</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    autocomplete="off"
                    @error('name')
                    style="border: red 1px solid;"
                    @enderror
                    @if($user)
                    value="{{ $user->name }}"
                    @endif
                >
                <div>
                    @if($errors->has('name'))
                        @foreach($errors->get('name') as $error)
                            <span
                                style="color: red;
                                    height: 2px;width: 150px;
                                    margin-left: 20px;">
                                    {{ $error }}
                                </span>
                        @endforeach
                    @endif
                </div>
            </div>
            <div>
                <label for="phone_number">Телефон</label>
                <input
                    type="text"
                    id="phone_number"
                    name="phone_number"
                    autocomplete="off"
                    @error('phone_number')
                    style="border: red 1px solid;"
                    @enderror
                    @if($user)
                    value="{{ $user->phone_number }}"
                    @endif
                >
                <div>
                    @if($errors->has('phone_number'))
                        @foreach($errors->get('phone_number') as $error)
                            <span
                                style="color: red;
                                    height: 2px;width: 150px;
                                    margin-left: 20px;">
                                    {{ $error }}
                                </span>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        <button
            type="submit"
            style="color: white;
                       background-color: #2D3748;
                       padding: 6px;
                       border-radius: 10px;
                       margin-top: 14px;
                       outline: none;
                       cursor: pointer;
                ">
            Сохранить
        </button>
    </form>

@endsection
