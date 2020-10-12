<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $table = 'posts';
    const UPDATED_AT = null;
    protected $fillable = ['title', 'slug', 'content', 'image', 'user_id'];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
