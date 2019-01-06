<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    protected $fillable = [
        'name', 'dt_birth', 'desc_user', 'img_user_link', 'user_id'
    ];

    public function user()
    {
        return $this->hasOne('App\Models\User');
    }
}
