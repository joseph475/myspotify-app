<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\HelperController;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $client_id = "";
    private $client_secret = "";
    private $token = "";

    public function __construct()
    {
        $this->middleware('auth');
      
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $helper = new HelperController();

        $data = [
            'userTopTracks' => $helper->getData('https://api.spotify.com/v1/me/top/tracks?limit=6'),
            // 'featuredPlaylist' => $result = $this->getData('https://api.spotify.com/v1/browse/categories'),
            'categoryOpm' => $helper->getData('https://api.spotify.com/v1/browse/categories/opm/playlists?limit=6'),
            'categoryMood' => $helper->getData('https://api.spotify.com/v1/browse/categories/mood/playlists?limit=6'),
            'categoryChill' => $helper->getData('https://api.spotify.com/v1/browse/categories/chill/playlists?limit=6'),
            'categoryToplist' => $helper->getData('https://api.spotify.com/v1/browse/categories/toplists/playlists?limit=6'),
        ];

        // echo "<pre>";
        // print_r($data['categoryToplist']);
        // echo "</pre>";
        // exit;
        if($data) return view('home', $data);
        
    }
}
