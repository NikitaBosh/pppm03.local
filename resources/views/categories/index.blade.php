@extends('layouts.app')

@section('content')
<div class="container">
<div class="card">
  <h3 class="card-header">
    Список категорий
    <a class="btn btn-sm btn-success float-right" href="{{ route('admin.categories.create') }}">
      Добавить категорию
    </a>
  </h3>
  <div class="card-body">
    <table class="table table-sm">
      <thead>
        <tr>
          <th scope="col">Название</th>
          <th scope="col" class="text-right">Действия</th>
        </tr>
      </thead>
      <tbody>
        @forelse($categories as $category)
        <tr>
          <td>{{ $category->name }}</td>
          <td class="text-right">
            <a class="btn btn-sm btn-primary" href="{{ route('admin.categories.show', $category->id) }}">
              Просмотреть
            </a>
            <a class="btn btn-sm btn-secondary" href="{{ route('admin.categories.edit', $category->id) }}">
              Редактировать
            </a>&nbsp;
            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="post" class="float-right">
              @csrf
              @method('delete')
              <button class="btn btn-sm btn-danger" type="submit">Удалить</a>
            </form>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="3">
            <h3 class="text-center">Текущие категории отсутствуют</h3>
          </td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
</div>
@endsection
