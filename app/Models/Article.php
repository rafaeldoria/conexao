<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'details_article', 'visibility', 'capa_article_link', 'type_article_id'
    ];

    public function typeArticle()
    {
        return $this->hasOne('App\Models\TypeArticle');
    }

    public function author()
    {
        return $this->hasOne('App\Models\Author');
    }
}
