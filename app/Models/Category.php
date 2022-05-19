<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FileModel;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function fileModels()
    {
        return $this->hasMany(FileModel::class);
    }
}
