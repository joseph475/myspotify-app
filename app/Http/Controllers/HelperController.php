<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\SpotifyConnectController;

class HelperController extends Controller
{
    public function getData($url, $params = []){

        $result = (new SpotifyConnectController)->get_Api($url);
        return $result;
    }
}
