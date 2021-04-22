<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{Post, User, Category};

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $primaryKey = 'id';

    protected $touches = ['posts'];

    protected $fillable = [
      'id',
      'name',
    ];

    protected $with = [
      'posts',
    ];

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
