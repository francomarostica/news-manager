<div class="row">
    <div class="col-md-9">
        <label for="txtTitle">Título</label>
        <input id="txtTitle" name="title" type="text" class="form-control" value="{{ $article->title }}" />
    </div>
    <div class="col-md-3">
            <label for="txtCategory">Categoria</label>
            <select id="txtCategory" name="category_id" type="text" class="form-control">
            @foreach ($categories as $category)
                <option value="{{ $category->url }}" {{ $article->category_id==$category->url ? 'selected' : '' }} >{{ $category->title }}</option>
            @endforeach
            </select>
        </div>
    <div class="col-md-12 py-2">
        <label for="txtDescription">Descripción</label>
        <textarea id="txtDescription" name="description" type="text" class="form-control"></textarea>
    </div>
    <div class="col-md-12 py-2">
        <input id="btnFile" name="image" type="file">
    </div>
</div>