<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use SpotifyWebAPI;
use Carbon\Carbon;

class SpotifyConnectController extends Controller
{
    private $client_id = "";
    private $client_secret = "";
    // private $token = "BQBKGcvmiQ7gbR8ixp-78R2CjFQ1RJk2jm5wi-anCFI99gh8Yes62g5pYqUayGQ4d0ryPkybNjud1vQpUO8oFy_GqRlP7stDEjq90rywgYFeZG3D_PV7DVFVgFyhXl307ezVOaWpvRLWJzp1momUSFU_TTLJPGg850MG13IiGxefhGqO5gqyqkiQSsl2QfSQ9SfRErxXytx2DwOXbmZDqB7Q4jHmVXEYexetS9U3SBIF7bdn7aDFx_bUBLSDioaRIOTZFfk7O7_Pbu4";
    public $token = "";
    public $authEndpoint = "";

    public function __construct()
    {
        $this->middleware('auth');
        
    }

    public function index(){
        if(Session::has('spotify_token') && Session::has('spotify_token_exp')){

            $date1 = Carbon::createFromFormat('Y-m-d H:i:s', date("Y-m-d H:i:s", session('spotify_token_exp')));
            $date2 = Carbon::createFromFormat('Y-m-d H:i:s', date('Y-m-d H:i:s'));

            $result = $date2->gt($date1);
            
            if($result){
                return redirect('/home');
            }
        }
        $session = new SpotifyWebAPI\Session(
            config('services.spotify.client_id'),
            config('services.spotify.client_secret'),
            config('services.spotify.redirect')
        );
        
        // $state = $session->generateState();

        $options = [
            'scope' => [
                'streaming',
                'user-top-read',
                'user-modify-playback-state',
                'user-read-playback-state',
                'user-read-currently-playing',
                'playlist-read-private',
                'playlist-modify-public',
                'playlist-modify-private',
                'user-library-read',
                'user-library-modify'
            ],
        ];
        // print_r($session); exit;
        header('Location: ' . $session->getAuthorizeUrl($options));
        die();
    }

    public function callback(){
        $session = new SpotifyWebAPI\Session(
            config('services.spotify.client_id'),
            config('services.spotify.client_secret'),
            config('services.spotify.redirect')
        );

        $session->requestAccessToken($_GET['code']);
        $exptime = $session->getTokenExpiration();

        // echo "<pre>";
        // print_r(date("Y-m-d H:i:s", $exptime));
        // echo "</pre>";
        // exit;
        $accessToken = $session->getAccessToken();
        // $refreshToken = $session->getRefreshToken();
        // $this->token =  $accessToken;
        session(['spotify_token' => $accessToken]);
        session(['spotify_token_exp' => $exptime]);

        return redirect('/home');
        // return view('home');
    }

    public function get_Api( $url, $params = [] ){
        $authorization = "Authorization: Bearer " .  session('spotify_token');

        $ch2 = curl_init();

        curl_setopt($ch2, CURLOPT_URL, $url);
        // curl_setopt($ch2, CURLOPT_URL, $spotifyURL);
        curl_setopt($ch2,  CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization));
        curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch2, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:x.x.x) Gecko/20041107 Firefox/x.x");
        curl_setopt($ch2, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, false);
        $json2 = curl_exec($ch2);
        $json2 = json_decode($json2);
        curl_close($ch2);
        
        // echo "asd";
        // echo '<pre>'.print_r($json2, true).'</pre>';
        // exit;
        return $json2;
    }
}
