@extends('layout')
@section('content')
    <section class="main">
        <h2>Каталог</h2>
        <div class="container">
            <div class="card_item-section">
                @forelse ($items as $item)
                    <div class="item_card">
                        <div class="cover">
                            <img src="{{ asset('storage/items/' . $item->image) }}" alt="{{ $item->name }}"
                                class="item_card-image">
                        </div>
                        <h4 class="item_card-title">{{ $item->name }}</h4>
                        <div class="btn_price">
                            <p class="item_card-price">{{ $item->price }}₽</p>
                            <a href="" class="btn">Подробнее</a>
                        </div>

                        <div class="btn_price">
                            <a href="/items/{{$item->id}}/edit" class="btn edit">Редачить✏️</a>
                            <form action="{{ route('items.destroy', ['id' => $item->id]) }}" method="post"
                                onclick=" return confirm('Вы точно хотите удалить товар?')">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn del" value="Удалить❌">
                            </form>
                        </div>
                    </div>
                @empty
                    Товаров нет
                @endforelse
            </div>
        </div>
    </section>
@endsection
