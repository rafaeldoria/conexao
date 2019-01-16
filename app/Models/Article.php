<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title', 'details_article', 'visibility', 'capa_article_link', 'type_article_id', 'user_data_id'
    ];

    public function typeArticle()
    {
        return $this->hasOne('App\Models\TypeArticle', 'id', 'type_article_id');
    }

    public function userData()
    {
        return $this->hasOne('App\Models\UserData', 'id', 'user_data_id');
    }
}
