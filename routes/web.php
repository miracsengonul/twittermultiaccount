<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return view('welcome');
});


//Yedek hesap başarıyla kayıt olursa view dosyasını göster
Route::get('/success', function () {
    return view('success');
})->name('success');

//Kullanıcının paket süresi bitti ise view dosyasını göster
Route::get('/sure_bitti', function () {
    return view('sure_bitti');
})->name('sure_bitti');


//Yedek hesabın üye olacığı adres
Route::prefix('child')->group(function () {
    Route::get('auth/twitter/{id}', 'Auth\ChildAuthController@redirectToProvider');
});

//Patron Login
Route::get('login', 'Auth\ChildAuthController@redirectToProvider')->name('login');

Route::prefix('patron')->middleware('kontrol')->group(function () {


    Route::get('panel', 'IndexController@index');
    Route::post('panel', 'IndexController@destroy');

    Route::get('profil', 'ProfilController@index');

    Route::get('tweet', 'TweetController@index');
    Route::post('tweet', 'TweetController@store');

    Route::get('takip-et', 'TakipEtController@index');
    Route::post('takip-et', 'TakipEtController@store');

    Route::get('retweet', 'RetweetController@index');
    Route::post('retweet', 'RetweetController@store');

    Route::get('unretweet', 'UnRetweetController@index');
    Route::post('unretweet', 'UnRetweetController@store');

    Route::get('fav', 'FavController@index');
    Route::post('fav', 'FavController@store');

    Route::get('unfav', 'UnFavController@index');
    Route::post('unfav', 'UnFavController@store');

    Route::get('paketler', function () {
        return view('patron.paketler');
    });

    Route::get('iletisim', 'IletisimController@index');
});

Route::get('auth/twitter/callback', 'Auth\ChildAuthController@handleProviderCallback');

