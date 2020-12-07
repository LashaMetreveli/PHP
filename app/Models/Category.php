<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $table = 'categories';
    public $guarded = [];

    public function posts()
    {
        return $this->hasMany(Post::class,  'category_id', 'id');
    }
}
