@extends('layout')
@section('content')

    <body>
        <h2>Вход</h2>
        <form action="/login" method="post">
            @csrf
            <input type="email" name="email" placeholder="email" value="{{ old('email') }}"><br>
            @error('email')
                <p style="color:rgb(237, 42, 42)">{{ $message }}</p>
            @enderror
            <input type="password" name="password" placeholder="password"><br>
            @error('password')
                <p style="color:rgb(237, 42, 42)">{{ $message }}</p>
            @enderror
            <button type="submit">Войти</button>
        </form>
        <p>Нет профиля?</p>
        <a href="/register">Создать</a>
    </body>
@endsection
