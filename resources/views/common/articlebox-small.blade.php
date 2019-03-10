<div class='articlebox small'>
    <img class="image" src="{{ asset('images/articles/'.$article->id.'/'.$article->image.' ') }}" />
    <div class="category"><a href="{{ '/'.$article->category_id }}">{{ $article->category_id }}</a></div>
    <h1 class="title">{{ $article->title }}</h1>
</div>