@can('admin')
<div class="row">
    <div class="col col-md-10 offset-md-1 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3">
      <p>
      <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
        Добавить файл
      </a>
    </p>
    <div class="collapse" id="collapseExample">
    <div class="card">
      <div class="card-body">
          <form action="{{ route('upload_files') }}" method="post" enctype="multipart/form-data">
              @csrf
              @include('files.partials.form')
          </form>
      </div>
    </div>
    </div>
    </div>
</div>
@endcan
