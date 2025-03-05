@extends('layout')
@section('content')

    <body>
        <h2>Редактирование товара</h2>
        <form action="{{ route('items.update', ['id' => $item->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <input type="text" name="name" placeholder="name"
                value="@if (old('name')) {{ old('name') }}@else{{ $item->name }} @endif"><br>
            @error('name')
                <p style="color:rgb(237, 42, 42)">{{ $message }}</p>
            @enderror
            <input type="text" name="description" placeholder="description"
                value="@if (old('description')) {{ old('description') }}@else{{ $item->description }} @endif"><br>
            @error('description')
                <p style="color:rgb(237, 42, 42)">{{ $message }}</p>
            @enderror
            <input type="text" name="price" placeholder="price"
                value="@if (old('price')) {{ old('price') }}@else{{ $item->price }} @endif"><br>
            @error('price')
                <p style="color:rgb(237, 42, 42)">{{ $message }}</p>
            @enderror
            <input type="file" name="image"><br>
            @error('image')
                <p style="color:rgb(237, 42, 42)">{{ $message }}</p>
            @enderror
            <button type="submit">Сохранить изменения</button>
        </form>
        <a href="{{ route('home') }}">← Назад</a>
    </body>
@endsection
