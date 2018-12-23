<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = [
        'name', 'dt_birth', 'desc_autor', 'img_author_link', 'user_id'
    ];

    public function user()
    {
        return $this->hasOne('App\Models\User');
    }
}
