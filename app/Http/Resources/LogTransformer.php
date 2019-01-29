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
    public function toArray($log)
    {   
        return [
            'id' => $log->id,
            'desc_log' => $log->desc_log,
            'type_log_id' => $log->type_log_id,
            'created_at' => $log->created_at,
        ];
    }
}