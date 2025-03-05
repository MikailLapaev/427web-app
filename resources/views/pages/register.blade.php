@extends('layout')
@section('content')

    <body>
        <h2>Регистрация</h2>
        <form action="/register" method="post">
            @csrf
            <input type="text" name="name" placeholder="name" value="{{ old('name') }}"><br>
            @error('name')
                <p style="color:rgb(237, 42, 42)">{{ $message }}</p>
            @enderror
            <input type="email" name="email" placeholder="email" value="{{ old('email') }}"><br>
            @error('email')
                <p style="color:rgb(237, 42, 42)">{{ $message }}</p>
            @enderror
            <input type="password" name="password" placeholder="password"><br>
            @error('password')
                <p style="color:rgb(237, 42, 42)">{{ $message }}</p>
            @enderror
            <input type="password" name="password_confirmation" placeholder="password"><br>
            <button type="submit">Создать</button>
        </form>
        <p>Уже есть профиль?</p>
        <a href="/login">Войти</a>
    </body>
@endsection
