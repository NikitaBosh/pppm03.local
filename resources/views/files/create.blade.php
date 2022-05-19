@extends('layouts.app')

@section('content')
@can('admin')
<div class="row">
    <div class="col col-md-10 offset-md-1 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3">
      <div class="card-body">
          <form action="{{ route('files.store') }}" method="post" enctype="multipart/form-data">
              @csrf
              @include('files.partials.form')
          </form>
      </div>
    </div>
</div>
@endcan
@endsection
