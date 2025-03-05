<header>
    <div class="container">
        <div class="logo"><img src="" alt=""></div>
        <nav>
            <a href="#">Каталог</a>
            <a href="{{ route('register') }}">Войти</a>
            <a href="#">menu1</a>

            @auth
                @if (auth()->user()->role_id == 3)
                    <a href="{{ route('items.create') }}">Добавить товар+</a>
                @endif
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <input type="submit" value="выйти">
                </form>
            @endauth
        </nav>
    </div>
</header>
