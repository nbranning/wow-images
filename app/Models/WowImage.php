<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WowImage extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function wow_images_comments(){
        return $this->hasMany('App\Models\WowImagesComment');
    }
}
