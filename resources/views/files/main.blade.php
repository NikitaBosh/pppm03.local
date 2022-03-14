@can('admin')
<div class="row">
    <div class="col col-md-10 offset-md-1 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3">
        <div class="card">
          <div class="card-body">
              <form action="{{ route('upload_files') }}" method="post" id="filesForm" enctype="multipart/form-data">
                  @csrf
                  @include('files.partials.form')
              </form>
          </div>
        </div>
    </div>
</div>
@endcan
