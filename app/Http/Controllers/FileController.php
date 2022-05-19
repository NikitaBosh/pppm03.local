<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FileModel;
use App\Http\Requests\File\FileStore;
use App\Http\Requests\File\FileUpdate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Category;

class FileController extends Controller
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

    public function create()
    {
        $categories = Category::all();

        return view('files.create', ['categories' => $categories]);
    }

    public function store(FileStore $request)
    {
        if(!$request->user()->checkRole('admin'))
        {
            abort(403);
        }

        $disk = Storage::disk('files');

        $file = $request->file('file');
        $name = time().'_'.$file->getClientOriginalName();
        $disk->putFileAs('', $file, $name);

        FileModel::create([
            'path' => $name,
            'type' => $request->type,
            'author' => $request->author,
            'category_id' => $request->category_id,
            'isPublic' => $request->isPublic ? 1 : 0,
        ]);

        return redirect()->route('files.index');
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

    public function edit(Request $request, $id)
    {
        $fileModel = FileModel::findOrFail($id);

        $categories = Category::all();

        return view('files.edit', ['categories' => $categories, 'fileModel' => $fileModel]);
    }

    public function update(FileUpdate $request, $id)
    {
        if(!$request->user()->checkRole('admin'))
        {
            abort(403);
        }
        $fileModel = FileModel::findOrFail($id);

        $disk = Storage::disk('files');

        $file = $request->file('file');
        $name;
        if ($file != null) {
            $disk->delete($fileModel->path);
            $name = time().'_'.$file->getClientOriginalName();
            $disk->putFileAs('', $file, $name);
        }
        else {
            $name = $fileModel->path;
        }

        $fileModel->update([
            'path' => $name,
            'type' => $request->type,
            'author' => $request->author,
            'category_id' => $request->category_id,
            'isPublic' => $request->isPublic ? 1 : 0,
        ]);

        return redirect()->route('files.index');
    }

    public function destroy(Request $request, $id)
    {
        if(!$request->user()->checkRole('admin'))
        {
            abort(403);
        }

        $fileModel = FileModel::findOrFail($id);    

        $disk = Storage::disk('files');
        $disk->delete($fileModel->path);

        $fileModel->delete();

        return redirect()->route('files.index');
    }

    public function download(Request $request, $id)
    {
        $fileModel = FileModel::findOrFail($id);

        $disk = Storage::disk('files');
        return $disk->download($fileModel->path);
    }
}
