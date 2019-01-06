<?php

namespace App\Http\Resources;

class UserDataTransformer
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($userData)
    {   
        return [
            'id' => $userData->id,
            'name' => $userData->name,
            'dt_birth' => $userData->dt_birth,
            'desc_user' => $userData->desc_user,
            'total_articles' => $userData->total_articles,
            'img_user_link' => $userData->img_user_link,
        ];
    }
}
