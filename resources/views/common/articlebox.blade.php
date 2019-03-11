<div class='articlebox'>
    <a href="{{ '/'.$article->category_id.'/'.\App\Helper::getFriendlyURL($article->title) }}">
        <img class="image" src="{{ asset('images/articles/'.$article->id.'/'.$article->image.' ') }}" />
    </a>
    <div class="category">{{ $article->category_id }}</div>
    <h1 class="title">{{ $article->title }}</h1>
</div>