<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visitant extends Model
{
    protected $fillable = [
        'dt_birth', 'img_visitant_link'
    ];

    public function user()
    {
        return $this->hasOne('App\Models\User');
    }
}

