<div class="mb-3">
    <input type="text" class="form-control" name="name" value="{{ $category->name ?? old('name') }}" placeholder="カテゴリ名">
    @error('name')
        <div class="alert alert-danger mt-2" role="alert">
            {{ $message }}
        </div>
    @enderror
</div>