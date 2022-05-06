<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WatchController extends Controller
{
    public function index(Request $request)
    {
        // $videoLists = $this->_videoLists('sun and moon');
        // return view('home' , ['data' => $videoLists]);
        return view('watch', ['video_id' => $request->id]);
    }
}
