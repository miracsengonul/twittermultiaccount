<?php

namespace App\Http\Controllers\Auth;

use App\ChildUser;
use App\User;
use Laravel\Socialite\Facades\Socialite;
use Mockery\CountValidator\Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class ChildAuthController extends Controller
{
    protected $redirectPath = '/home';

    /**
     * Redirect the user to the Twitter authentication page.
     *
     * @return Response
     */
    public function redirectToProvider($id=NULL)
    {
        //User_id kontrolü yapabiliriz.
        //Eğer user tablosunda böyle bir id yoksa salla gitsin.
        $user_id = $id;
        Session::put('user_id',$user_id);

        return Socialite::driver('twitter')->redirect();
    }

    /**
     * Obtain the user information from Twitter.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {

        try {
            $user = Socialite::driver('twitter')->user();
        } catch (Exception $e) {
            return redirect('child/auth/twitter/');
        }

        $authUser = $this->findOrCreateUser($user);



        if(Session::get('user_id')!=NULL) {

            if(Auth::check()){

                $user_id = Auth::user()->id;

                if($user_id == Session::get('user_id')){
                    return redirect()->to('patron/panel');
                    exit;
                }

            }

            return redirect()->route('success');
        }else{
            Auth::login($authUser, true);
            return redirect()->to('patron/panel');
        }
    }

    /**
     * Return user if exists; create and return if doesn't
     *
     * @param $twitterUser
     * @return User
     */
    private function findOrCreateUser($twitterUser)
    {


        if(Session::get('user_id')!=NULL){

            //Eğer adam kendi üyelik açıp kendi adına alt üye olmak isterse sıkıntı

            //Ama adam ana üye olup bir başkasının alt üyesi de olabilir.

            if(Auth::check()){

                $user_id = Auth::user()->id;

                if($user_id == Session::get('user_id')){
                    return redirect()->to('patron/panel');
                    exit;
                }

            }

             $cocuk_eklenebilir = User::find(Session::get('user_id'))->cocuk_eklenebilir;
            //Eğer Limit'e ulaştıysa Alt üye ekleyemez.
            //Limit'e ulaştığı zamanda cocuk_eklenebilir kolonunu 0 yapın.
            if($cocuk_eklenebilir != 1){ //Birden farklıysa yani eğer 0 ise o zaman kapanmış demektir.Yani ekleme yapma işlemi iptal et.Exit.
                return view('cocuk_eklenemez');
                exit;
                return false;
            }

            $child_kontrol = ChildUser::where('twitter_id', $twitterUser->id)->first();

            //Eğer child zaten kayıtlıysa tekrar DB'ye ekleme.
            if ($child_kontrol){
                return redirect()->route('success');
            }

            return ChildUser::create([
                'name' => $twitterUser->name,
                'handle' => $twitterUser->nickname,
                'twitter_id' => $twitterUser->id,
                'avatar' => $twitterUser->avatar_original,
                'token' => $twitterUser->token,
                'tokenSecret' => $twitterUser->tokenSecret,
                'user_id' => Session::get('user_id')
            ]);
        }else{

            $authUser = User::where('twitter_id', $twitterUser->id)->first();

            if ($authUser){
                return $authUser;
            }

            return User::create([
                'name' => $twitterUser->name,
                'handle' => $twitterUser->nickname,
                'twitter_id' => $twitterUser->id,
                'avatar' => $twitterUser->avatar_original,
                'token' => $twitterUser->token,
                'tokenSecret' => $twitterUser->tokenSecret
            ]);
        }

    }
}
