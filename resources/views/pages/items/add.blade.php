@extends('layout')
@section('content')

    <body>
        <h2>Добавление</h2>
        <form action="{{ route('items.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="text" name="name" placeholder="name" value="{{ old('name') }}"><br>
            @error('name')
                <p style="color:rgb(237, 42, 42)">{{ $message }}</p>
            @enderror
            <input type="text" name="description" placeholder="description" value="{{ old('description') }}"><br>
            @error('description')
                <p style="color:rgb(237, 42, 42)">{{ $message }}</p>
            @enderror
            <input type="text" name="price" placeholder="price" value="{{ old('price') }}"><br>
            @error('price')
                <p style="color:rgb(237, 42, 42)">{{ $message }}</p>
            @enderror
            <input type="file" name="image"><br>
            @error('image')
                <p style="color:rgb(237, 42, 42)">{{ $message }}</p>
            @enderror
            <button type="submit">Добавить</button>
        </form>
        <a href="{{ route('home') }}">← Назад</a>
    </body>
@endsection
