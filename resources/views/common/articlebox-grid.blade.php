<a href="{{ '/'.$article->category_id.'/'.\App\Helper::getFriendlyURL($article->title) }}">
    <img class="image" src="{{ asset('images/articles/'.$article->id.'/'.$article->image.' ') }}" />
</a>
<div class="titlebox">
    <div class="category"><a href="{{ $article->category_id }}">{{ $article->category_id }}</a></div>
    <h1 class="title">{{ $article->title }}</h1>
</div>