<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WowImagesComment extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function wow_images(){
        return $this->belongsTo('App\Models\WowImage');
    }
}
