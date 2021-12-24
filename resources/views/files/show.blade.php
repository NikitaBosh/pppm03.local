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
                        <strong>Размер (МБ):</strong> {{ $item->sizeMB }}
                    </li>
                    <li class="list-group-item">
                        <strong>Последняя модификация:</strong> {{ $item->lastModified }}
                    </li>
                </ul>
                @can("admin")
                <div class="card-body">
                    
                  <a class="btn btn-sm btn-outline-danger" href="{{ route('delete', ['filename' => $item->name]) }}">
                    Удалить
                </a> 
                    
                </div>@endcan
            </div>
        </div>
    </div>
</div>
@endsection
