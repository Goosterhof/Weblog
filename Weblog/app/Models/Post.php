<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\Models\{User, Category, Comment};

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $primaryKey = 'id';

    protected $touches = ['categories'];

    protected $fillable = [
      'id',
      'title',
      'body',
      'slug',
      'user_id',
      'media_name',
      'media_path',
      'is_premium',
    ];

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function comments()
    {
      return $this->hasMany(Comment::class);
    }
}
