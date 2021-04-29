<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\Models\{User, Post};

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';

    protected $primaryKey = 'id';

    protected $fillable = [
      'id',
      'title',
      'body',
      'post_id',
      'user_id'
    ];


    protected $with = [
      'user',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function posts()
    {
      return $this->belongsTo(Post::class);
    }

}
