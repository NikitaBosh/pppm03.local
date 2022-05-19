<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class FileModel extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function ScopeSearch($query, $search) {
        return $query->where('path', 'like', '%'.$search.'%');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
