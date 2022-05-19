@extends('layouts.app')

@section('content')
<div class="container">
<div class="card">
  <h3 class="card-header">
    {{ $category->name }}
  </h3>
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><strong>Категория:</strong> {{ $category->name }}</li>
    <li class="list-group-item"><strong>Дата категории:</strong> {{ $category->created_at }}</li>
    <li class="list-group-item"><strong>Дата редактирования категории:</strong> {{ $category->updated_at }}</li>
  </ul>
  <div class="card-body">
      <a class="btn btn-secondary" href="{{ route('admin.categories.edit', $category->id) }}">
        Редактировать
      </a>
      <a class="btn btn-danger" href="{{ route('admin.categories.index') }}">
        Отмена
      </a>
  </div>
</div>
</div>
@endsection
