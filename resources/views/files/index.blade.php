@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        @component('components.error', [
                            'title' => 'Ошибка',
                            'message' => $error,
                        ])

                        @endcomponent
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    @include('files.main')

    @include('files.list')

@endsection
