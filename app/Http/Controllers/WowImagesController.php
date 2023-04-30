<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WowImage;

class WowImagesController extends Controller{

    public function save(Request $request){
        // in the real world I would validate data here
        $image = WowImage::create($request->all());
        return response()->json($image->id);
    }

    public function wowed(Request $request){
        $image = WowImage::where('date', '=', $request->date)->first();
        return response()->json((isset($image->id)) ? $image->id : '0' );
    }

    public function destroy($id){
        $item = WowImage::find($id);
        $item->delete();
        return response()->json('Deleted!');
    }
}
