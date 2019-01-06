<?php

namespace App\Http\Resources;

class UserTransformer
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($user)
    {   
        return [
            'id' => $user->id,
            'username' => $user->username,
            'email' => $user->email,
            'type_user_id' => $user->type_user_id,
            'created_at' => $user->created_at,
            'updated_at' => $user->updated_at,
            'deleted_at' => $user->deleted_at,
        ];
    }
}
