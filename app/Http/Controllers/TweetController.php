<?php

namespace App\Http\Controllers;

use App\ChildUser;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Subscriber\Oauth\Oauth1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TweetController extends Controller
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
        return view('patron.tweet');
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

                $res = $client->post('statuses/update.json', ['query' => [
                    'status' => $request->input('metin')
                ]]);
            }
            return redirect()->to('patron/tweet')->with('status', 'Tweet atma işlemi başarılı !');
        } catch (ClientException $e) {
            $response = $e->getResponse();
            $cikti = $response->getBody();
            $cikti = json_decode($cikti);

            $hatalar = $cikti->errors[0]->code;

            if ($hatalar > 0) {
                return redirect()->to('patron/tweet')->with('hata', $cikti->errors[0]->message);
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
