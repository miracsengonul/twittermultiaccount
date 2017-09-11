<?php

namespace App\Http\Controllers;

use App\ChildUser;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Subscriber\Oauth\Oauth1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TakipEtController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('patron.takip_et');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            $user_id = Auth::user()->id;

            $cocuklar = ChildUser::where('user_id', $user_id)->get();


            $adres = explode('.com/', $request->input('adres'));
            $adres = str_replace('/', '', $adres[1]);


            $stack = HandlerStack::create();
            $middleware = new Oauth1([
                'consumer_key' => env('TWITTER_CLIENT_ID'),
                'consumer_secret' => env('TWITTER_CLIENT_SECRET'),
                'token' => env('TOKEN'),
                'token_secret' => env('TOKEN_SECRET')
            ]);
            $stack->push($middleware);
            $client = new Client([
                'base_uri' => 'https://api.twitter.com/1.1/',
                'handler' => $stack,
                'auth' => 'oauth',
            ]);

            $res = $client->get('users/show.json', ['query' => [
                'screen_name' => $adres
            ]]);


            $res = json_decode($res->getBody());

            $twitter_id = $res->id;


            foreach ($cocuklar as $cocuk) {

                $token = $cocuk->token;
                $token_secret = $cocuk->tokenSecret;
                $stack = HandlerStack::create();

                $middleware = new Oauth1([
                    'consumer_key' => 'TpV3BW9ULrQymfc5QSlkw4Wqb',
                    'consumer_secret' => 'XLVOP2pBgNDAZPp4EUN47YtHXpoSLWHiJLuH9WUP58AN3HVGPo',
                    'token' => $token,
                    'token_secret' => $token_secret
                ]);
                $stack->push($middleware);
                $client = new Client([
                    'base_uri' => 'https://api.twitter.com/1.1/',
                    'handler' => $stack,
                    'auth' => 'oauth',
                ]);

                $res = $client->post('friendships/create.json', ['query' => [
                    'user_id' => $twitter_id,
                    'follow' => true,
                ]]);
            }
            return redirect()->to('patron/takip-et')->with('status', 'Takip işlemi başarılı !');
        } catch (ClientException $e) {
            $response = $e->getResponse();
            $cikti = $response->getBody();
            $cikti = json_decode($cikti);

            $hatalar = $cikti->errors[0]->code;

            if ($hatalar > 0) {
                return redirect()->to('patron/takip-et')->with('hata', $cikti->errors[0]->message);
            }

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
