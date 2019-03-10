<header>
    <div class="container-fluid">
        <a href="{{ URL('/') }}">
            <img src="{{ asset('images/logo.svg') }}" />
        </a>
    </div>
    <nav class="categories-navbar">
        <div class="container-fluid">
            @foreach ($categories as $category)
                <a href="/{{ $category->url }}" class="category-mnu-item {{ ($currentCategory == $category->url) ? 'active' : '' }}">{{ $category->title }}</a>
            @endforeach
        </div>
    </nav>
</header>