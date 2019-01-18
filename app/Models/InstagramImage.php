<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InstagramImage extends Model
{
    protected $fillable = [
        'desc_image', 'visibility', 'img_instagram' 
    ];

    protected $table = 'instagram_images';

}
