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
                        <strong>Название и формат:</strong> {{ $fileModel->path }}
                    </li>
                    <li class="list-group-item">
                        <strong>Тип:</strong> {{ $fileModel->type }}
                    </li>
                    <li class="list-group-item">
                        <strong>Автор:</strong> {{ $fileModel->author }}
                    </li>
                    <li class="list-group-item">
                        <strong>Категория:</strong> {{ $fileModel->category }}
                    </li>
                    <li class="list-group-item">
                        <strong>Размер (МБ):</strong> {{ $fileModel->sizeMB }}
                    </li>
                    <li class="list-group-item">
                        <strong>Последняя модификация:</strong> {{ $fileModel->lastModified }}
                    </li>
                </ul>
                @auth
                <div class="card-body">
                @can("admin")
                  <a class="btn btn-sm btn-outline-danger" href="{{ route('delete', ['filename' => $fileModel->path]) }}">
                    Удалить
                </a>
                @endcan
                <a class="btn btn-sm btn-outline-success" href="{{ route('download', ['filename' => $fileModel->path]) }}">
                Скачать
                </a> 
                </div>
                @endauth 
            </div>
        </div>
    </div>
</div>
@endsection
