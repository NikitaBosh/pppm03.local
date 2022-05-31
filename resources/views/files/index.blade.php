@extends('layouts.app')

@section('content')
<div class="row mt-3">
  <div class="col col-md-10 offset-md-1 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3">
    @can('admin')
    <a class="btn btn-primary float-right mb-2" href="{{ route('files.create') }}" role="button">Добавить новый файл</a>
    @endcan
    <form action="{{ route('files.store') }}" method="get">
      @csrf
      <div class="input-group mb-3">
      <input type="text" class="form-control" placeholder="Введите название файла" name="search" value="{{ $search ?? '' }}">
      <div class="input-group-append">
        <button class="btn btn-outline-secondary" type="submit">Поиск</button>
      </div>
    </form>
  </div>
    <table class="table border">
      <thead>
        <th class="pl-3">#</th>
        <th>Название</th>
        <th>Действия</th>
      </thead>
      <tbody class="table-sm">
        @forelse ($files as $file)
          <tr>
            <td class="pl-3">{{ $loop->iteration }}</td>
            <td>{{ $file->path }}</td>
            <td class="d-flex flex-nowrap justify-content-end">
              <a class="btn btn-sm btn-outline-success mr-2" href="{{ route('files.download', ['file' => $file]) }}">
                Скачать
              </a>
              <a class="btn btn-sm btn-outline-primary mr-2" href="{{ route('files.show', ['file' => $file]) }}">
                Просмотреть
              </a>
              @can("admin")
              <a class="btn btn-sm btn-outline-secondary mr-2" href="{{ route('files.edit', ['file' => $file]) }}">
                Редактировать
              </a>
              @endcan
              @can("admin")
                <form action="{{ route('files.destroy', ['file' => $file]) }}" method="post" class="float-end">
                @csrf
                @method('delete')
                <button class="btn btn-sm btn-outline-danger" type="submit">Удалить</a>
                </form>
              @endcan
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="3" class="text-center p-3">Файлы отсутствуют</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>

@endsection
