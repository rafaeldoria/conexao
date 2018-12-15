<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeUser extends Model
{
    protected $fillable = [
        'desc_type_user', 'status_type_user'
    ];

    protected $table = 'types_users';
}
