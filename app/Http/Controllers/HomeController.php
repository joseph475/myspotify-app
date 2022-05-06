<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\SpotifyConnectController;
use Illuminate\Support\ServiceProvider;
use SpotifyWebAPI;

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
        // $this->client_id = "a5ea01d7d994400a8d9db81e7c49a995";
        // $this->client_secret = "7c6525d9f9244b43b2b14cfb88992526";
        // $this->token = "BQD8Lw2S0P2OtCB3ev37AfJ6k4HnH86bBgjHfqtr4k68d2l0AgU-mxoHUzT6DevP77C7hm-1KQxL6mqjrBvzd-Bsw6_giUghzU6iEi-bJXET9Q2FONG2GFrnlZf0tp3eN27Vz9Aw3_tqlTdnhF5f2LKJOsRmaZ0DUycbvgsnyLs2EzvAOVdU0SPs4evD5PTqn3IxBUjFYUAhMtlPtpvfoYMUGljOPhHEEvouiKbVfY9KzLumEYIQsJQ2KwVgzTsqrOpF7q5eA6sYvas";
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $top_tracks_url = 'https://api.spotify.com/v1/me/top/tracks?limit=6';

        $result = (new SpotifyConnectController)->get_Api($top_tracks_url);
       

        // echo '<pre>'.print_r($result, true).'</pre>';

        // exit;

        // return view('home');
        return view('home', ['data' => $result]);
    }

    // public function callback(){
    //     $session = new SpotifyWebAPI\Session(
    //         config('services.spotify.client_id'),
    //         config('services.spotify.client_secret'),
    //         config('services.spotify.redirect')
    //     );
        
    //     // $state = $_GET['state'];
        
    //     // Fetch the stored state value from somewhere. A session for example
        
    //     // if ($state !== $storedState) {
    //     //     // The state returned isn't the same as the one we've stored, we shouldn't continue
    //     //     die('State mismatch');
    //     // }
        
    //     // Request a access token using the code from Spotify
    //     $session->requestAccessToken($_GET['code']);
        
    //     $accessToken = $session->getAccessToken();
    //     $refreshToken = $session->getRefreshToken();
        
    //     echo $accessToken; exit;
    //     // Store the access and refresh tokens somewhere. In a session for example
        
    //     // Send the user along and fetch some data!
    //     header('Location: app.php');
    //     die();

    //     // return view('home');
    // }

    // protected function _videoLists($keywords){
    //     $part = 'snippet';
    //     $country = 'PH';
    //     $apiKey = config('services.youtube.api_key');
    //     $maxResults = 12;
    //     $youTubeEndPoint = config('services.youtube.search_endpoint');
    //     $type = 'video'; // You can select any one or all, we are getting only videos

    //     $url = "$youTubeEndPoint?part=$part&maxResults=$maxResults&regionCode=$country&type=$type&key=$apiKey&q=$keywords";
    //     $response = Http::get($url);
    //     $results = json_decode($response);
    //     // $results = @json_decode(json_encode($response), true);;

    //     // We will create a json file to see our response
    //     // File::put(storage_path() . '/app/public/results.json', $response->body());
    //     return $results;
    // }

    // public function search(Request $request)
    // {
    //     $videoLists = $this->_videoLists($request->search);
    //     // $videoLists = $this->_videoLists('sun and moon');
    //     echo "<pre>";
    //     print_r($videoLists);
    //     echo "</pre>";
    //     exit;

    //     return view('home' , ['data' => $videoLists]);
    //     // return view('home');
    // }
}
