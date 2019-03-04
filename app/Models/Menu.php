<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'title', 'route', 'class', 'visibility'
    ];

    protected $table = 'menus';
}
