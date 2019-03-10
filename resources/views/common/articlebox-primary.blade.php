<div class="articlebox primary">
    <img class="image" src="{{ asset('images/articles/'.$article->id.'/'.$article->image.' ') }}" />
    <div class="titlebox">
        <div class="category">{{ $article->category_id }}</div>
        <h1 class="title">{{ $article->title }}</h1>
    </div>
</div>