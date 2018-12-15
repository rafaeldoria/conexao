<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'txt_message', 'article_id', 'user_id'
    ];

    public function typeUser()
    {
        return $this->hasOne('App\Models\TypeUser');
    }

    public function article()
    {
        return $this->hasOne('App\Models\Article');
    }
}