@extends('layouts.app')

@section('content')
<div class="container">
<div class="card">
  <h3 class="card-header">
    Редактировать категорию
  </h3>
  <div class="card-body">
    <form action="{{ route('admin.categories.update', $category->id) }}" method="post">
      @csrf
      @method('put')

      @include('categories.partials.form')
    </form>
  </div>
</div>
</div>
@endsection
