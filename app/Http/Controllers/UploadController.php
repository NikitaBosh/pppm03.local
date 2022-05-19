<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FileModel;
use App\Http\Requests\FileRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class UploadController extends Controller
{
    /**
     * Метод отображения формы для загрузки и списка загруженных файлов
     *
     * @return View Представление
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $files;
        if ($search != null)
        {
            if(Auth::check()) {
                $files = FileModel::search($search)->get();
            }
            else {
                $files = FileModel::where('isPublic', 1)->search($search)->get();
            } 
        }
        else {
            if(Auth::check()) {
                $files = FileModel::all();
            }
            else {
                $files = FileModel::where('isPublic', 1)->get();
            }
        }

        return view('files.index', [
            'search' => $search,
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

        $files = $request->file('file');
        $name = time().'_'.$files[0]->getClientOriginalName();
        $disk->putFileAs('', $files[0], $name);

        FileModel::create([
            'path' => $name,
            'type' => $request->type,
            'author' => $request->author,
            'category' => $request->category,
            'isPublic' => $request->isPublic ? 1 : 0,
        ]);

        return redirect('upload');
    }

    public function download(Request $request, $id)
    {
        $fileModel = FileModel::findOrFail($id);

        $disk = Storage::disk('files');
        return $disk->download($fileModel->path);
    }

    /**
     * Метод для удаления файла
     */
    public function delete(Request $request, $id)
    {
        if(!$request->user()->checkRole('admin'))
        {
            abort(403);
        }

        $fileModel = FileModel::findOrFail($id);    

        $disk = Storage::disk('files');
        $disk->delete($fileModel->path);

        $fileModel->delete();

        return redirect('upload');
    }

    public function show(Request $request, $id)
    {
        $fileModel = FileModel::findOrFail($id);

        $disk = Storage::disk('files');
        $sizeMB = round($disk->size($fileModel->path) / 1048576, 5);
        $lastModified = Carbon::createFromTimestamp($disk->lastModified($fileModel->path));

        $fileModel->sizeMB = $sizeMB;
        $fileModel->lastModified = $lastModified;
        return view('files.show', ['fileModel' => $fileModel]);
    }
}
