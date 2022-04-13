<div class="form-group">
    <input type="file" class="form-control-file @error('file') is-invalid @enderror" name="file[]" id="file">
    @error('file')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>
<div class="form-group">
    <label for="type">Тип</label>
    <input type="text" class="form-control @error('type') is-invalid @enderror" id="type" name="type" value="{{ old('type') }}">
    @error('type')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>
<div class="form-group">
    <label for="author">Автор</label>
    <input type="text" class="form-control @error('author') is-invalid @enderror" id="author" name="author" value="{{ old('type') }}">
    @error('author')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>
<div class="form-group">
    <label for="category">Категория</label>
    <input type="text" class="form-control @error('category') is-invalid @enderror"  id="category" name="category" value="{{ old('type') }}">
    @error('category')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>
<div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="isPublic" name="isPublic">
    <label class="form-check-label" for="exampleCheck1">Открый доступ</label>
</div>
<button type="submit" class="btn btn-primary">Сохранить</button>

