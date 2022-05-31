@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h3 class="card-header">
                    Добавление пользователя
                </h3>

                <div class="card-body">
                    <form action="{{ route('admin.users.store') }}" method="post">
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                @component('components.error', [
                                    'message' => $error,
                                ])
                            @endcomponent
                        @endforeach
                    @endif        
                    @csrf
                        @include('admin.partials.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
