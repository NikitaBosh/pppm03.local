@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h3 class="card-header">
                    Детали
                </h3>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <strong>Название и формат:</strong> {{ $item->name }}
                    </li>
                    <li class="list-group-item">
                        <strong>Тип:</strong> {{ $item->name }}
                    </li>
                    <li class="list-group-item">
                        <strong>Автор:</strong> {{ $item->name }}
                    </li>
                    <li class="list-group-item">
                        <strong>Категория:</strong> {{ $item->name }}
                    </li>
                    <li class="list-group-item">
                        <strong>Размер (МБ):</strong> {{ $item->sizeMB }}
                    </li>
                    <li class="list-group-item">
                        <strong>Последняя модификация:</strong> {{ $item->lastModified }}
                    </li>
                </ul>
                @auth
                <div class="card-body">
                @can("admin")
                  <a class="btn btn-sm btn-outline-danger" href="{{ route('delete', ['filename' => $item->name]) }}">
                    Удалить
                </a>
                @endcan
                <a class="btn btn-sm btn-outline-success" href="{{ route('download', ['filename' => $item->name]) }}">
                Скачать
                </a> 
                </div>
                @endauth 
            </div>
        </div>
    </div>
</div>
@endsection
