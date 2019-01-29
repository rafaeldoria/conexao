<?php

namespace App\Http\Resources;

class ArticleTransformer
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($article)
    {   
        return [
            'id' => $article->id,
            'title' => $article->title,
            'summary' => $article->summary,
            'details_article' => $article->details_article,
            'visibility' => $article->visibility,
            'total_hits' => $article->total_hits,
            'img_capa_article' => $article->img_capa_article,
            'img_carousel_article' => $article->img_carousel_article,
            'type_article_id' => $article->type_article_id,
            'user_data_id' => $article->user_data_id,
            'created_at' => $article->created_at,
        ];
    }
}
