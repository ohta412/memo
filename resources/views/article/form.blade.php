<div class="mb-3">
    @foreach ($categories as $category)
        <div class="form-check form-check-inline">
            <input
                class="form-check-input"
                type="checkbox"
                id="form-category_{{ $category->id }}"
                name="categories[]"
                value="{{ $category->id }}"
                @if (isset($article) && $article->categories->contains($category))
                    checked
                @endif
            >
            <label class="form-check-label" for="form-category_{{ $category->id }}">{{ $category->name }}</label>
        </div>
    @endforeach
</div>
<div class="mb-3">
    <input type="text" class="form-control" name="title" value="{{ $article->title ?? old('title') }}" placeholder="タイトル">
    @error('title')
        <div class="alert alert-danger mt-2" role="alert">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="mb-3">
    <textarea class="form-control" name="content" rows="15" placeholder="本文">{{ $article->content ?? old('content') }}</textarea>
    @error('content')
        <div class="alert alert-danger mt-2" role="alert">
            {{ $message }}
        </div>
    @enderror
</div>