<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $fillable = [
        'desc_log', 'type_log_id', 'user_id'
    ];

    public function typeLog()
    {
        return $this->hasOne('App\Models\TypeLog');
    }
}
