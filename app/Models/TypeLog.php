<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeLog extends Model
{
    protected $fillable = [
        'desc_type_logs'
    ];

    protected $table = 'types_logs';
}
