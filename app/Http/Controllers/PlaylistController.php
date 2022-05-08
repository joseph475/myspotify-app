<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\HelperController;

class PlaylistController extends Controller
{
    
    public function show($id){
        $helper = new HelperController();

        $result = $helper->getData('https://api.spotify.com/v1/playlists/' . $id);

        // echo "<pre>";
        // print_r($result);
        // echo "</pre>";
        // exit;

        if($result) return view('playlist', ['data' => $result]);
    }
}
