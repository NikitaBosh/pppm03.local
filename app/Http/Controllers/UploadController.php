<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FileRequest;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class UploadController extends Controller
{
    /**
     * Метод отображения формы для загрузки и списка загруженных файлов
     *
     * @return View Представление
     */
    public function index()
    {
        $disk = Storage::disk('files');
        $files = $disk->allFiles();

        return view('files.index', [
            'files' => $files,
        ]);
    }

    /**
     * Метод для загрузки фалов
     */
    public function upload(FileRequest $request)
    {
        if(!$request->user()->checkRole('admin'))
        {
            abort(403);
        }

        $disk = Storage::disk('files');

        $files = $request->file('files');
        foreach ($files as $file) {
            $disk->putFileAs('', $file, time().'_'.$file->getClientOriginalName());
        }
        return redirect('upload');
    }

    public function download(Request $request)
    {
        $disk = Storage::disk('files');
        return $disk->download($request->filename);
    }

    /**
     * Метод для удаления файла
     */
    public function delete(Request $request)
    {
        if(!$request->user()->checkRole('admin'))
        {
            abort(403);
        }

        $disk = Storage::disk('files');
        $disk->delete($request->filename);

        return redirect('upload');
    }

    public function show(Request $request)
    {
        $disk = Storage::disk('files');
        $sizeMB = round($disk->size($request->filename) / 1048576, 5);
        $lastModified = Carbon::createFromTimestamp($disk->lastModified($request->filename))->toDateTimeString();
        $item = (object)[];
        $item->name = $request->filename;
        $item->sizeMB = $sizeMB;
        $item->lastModified = $lastModified;
        return view('files.show', ['item' => $item]);
    }
}
