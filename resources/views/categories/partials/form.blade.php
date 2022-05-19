<div class="form-group">
  <label for="name">Название задачи</label>
  <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $category->name ?? old('name')}}" placeholder="Введите название задачи" required>
    @error('name')
        <div class="invalid-feedback">
            {{$message}}
        </div>
    @enderror
</div>
<hr>
<button type="submit" class="btn btn-primary">Сохранить</button>
<a class="btn btn-danger" href="{{ route('admin.categories.index') }}">Отмена</a>
