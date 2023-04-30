<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class NASAAPIController extends Controller{

    public function get_images($page){
        $api_key = config('nasa_api.api_key');
        $days = (-7 * $page);
        $start_date = date('Y-m-d', strtotime($days.' days'));
        $end_date = date('Y-m-d');
        
        $response = Http::get('https://api.nasa.gov/planetary/apod', [
            'api_key' => config('nasa_api.api_key'),
            'start_date' => $start_date,
            'end_date' => $end_date,
        ]);

        // sort the images so newest is first
        $nasa_images = $response->json();
        usort($nasa_images, function ($a, $b) {
            return strtotime($b['date']) - strtotime($a['date']);
        });
        return response()->json($nasa_images);
    }
}