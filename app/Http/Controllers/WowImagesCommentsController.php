<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WowImagesComment;

class WowImagesCommentsController extends Controller{

    public function index($img_id){
        $comments = WowImagesComment::where('wow_image_id', '=', $img_id)->get();
        return response()->json($comments);
    }

    public function save(Request $request){
        // in the real world I would validate data here
        $comment = WowImagesComment::create($request->all());
        // return all comments for the image
        $comments = WowImagesComment::where('wow_image_id', '=', $comment->wow_image_id)->get();
        return response()->json($comments);
    }
}
