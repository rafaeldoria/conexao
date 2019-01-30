<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'txt_message', 'article_id', 'user_id'
    ];

    public function user()
    {
        return $this->hasOne('App\Models\user', 'id', 'user_id');
    }

    public function article()
    {
        return $this->hasOne('App\Models\Article', 'id', 'article_id');
    }
}