<div class="row mt-3">
  <div class="col col-md-10 offset-md-1 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3">
    <table class="table border">
      <thead>
        <th class="pl-3">#</th>
        <th>Название</th>
      </thead>
      <tbody class="table-sm">
        @forelse ($files as $file)
          <tr>
            <td class="pl-3">{{ $loop->iteration }}</td>
            <td>{{ $file }}</td>
            <td class="text-right">
              <a class="btn btn-sm btn-outline-success" href="{{ route('download', ['filename' => $file]) }}">
                Скачать
              </a>
            </td>
            <td class="text-right">
              <a class="btn btn-sm btn-outline-primary" href="{{ route('upload.show', ['filename' => $file]) }}">
                Просмотреть
              </a>
            </td>
            @can("admin")
            <td class="text-right">
              <a class="btn btn-sm btn-outline-danger" href="{{ route('delete', ['filename' => $file]) }}">
                Удалить
              </a>
            </td>
            @endcan
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
