{{-- @extends('layouts.app')

@section('content') --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h2>Регистрация</h2>
    <form action="/register" method="post">
        @csrf
        <input type="text" name="name" placeholder="name"><br>
        <input type="email" name="email" placeholder="email"><br>
        <input type="password" name="password" placeholder="password"><br>
        <input type="password" name="password_confirmation" placeholder="password"><br>
        <button type="submit">Создать</button>
    </form>
    <p>Уже есть профиль?</p>
    <a href="/login">Войти</a>
</body>

</html>

{{-- @endsection --}}
