<?php

namespace App\Http\Controllers;

use App\ChildUser;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Subscriber\Oauth\Oauth1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UNRetweetController extends Controller
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
        return view('patron.unretweet');
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

            $adres = explode('status/', $request->input('adres'));

            $adres = $adres[1];


            foreach ($cocuklar as $cocuk) {

                $token = $cocuk->token;
                $token_secret = $cocuk->tokenSecret;
                $stack = HandlerStack::create();

                $middleware = new Oauth1([
                    'consumer_key' => env('TWITTER_CLIENT_ID'),
                    'consumer_secret' => env('TWITTER_CLIENT_SECRET'),
                    'token' => $token,
                    'token_secret' => $token_secret
                ]);
                $stack->push($middleware);
                $client = new Client([
                    'base_uri' => 'https://api.twitter.com/1.1/',
                    'handler' => $stack,
                    'auth' => 'oauth',
                ]);

                /*
                $resm = $client->get('statuses/user_timeline.json', ['query' => [
                        'count' => 200,

                    ]]);

                        $ciktim    = $resm->getBody();
                        $ciktim    = json_decode($ciktim);
                foreach ($ciktim as $key => $value) {
                    echo $value->id;
                    }
                */

                $res = $client->post('statuses/unretweet/' . $adres . '.json');
            }
            return redirect()->to('patron/unretweet')->with('status', 'Retweet silme işlemi başarılı !');
        } catch (ClientException $e) {
            $response = $e->getResponse();
            $cikti = $response->getBody();
            $cikti = json_decode($cikti);

            $hatalar = $cikti->errors[0]->code;

            if ($hatalar > 0) {
                return redirect()->to('patron/unretweet')->with('hata', $cikti->errors[0]->message);
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
