<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeArticle extends Model
{
    protected $fillable = [
        'desc_type_article', 'status_type_article'
    ];

    protected $table = 'types_articles';
}