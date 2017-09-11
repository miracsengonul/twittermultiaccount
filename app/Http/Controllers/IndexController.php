<?php

namespace App\Http\Controllers;

use App\ChildUser;
use App\myClass\Google;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class IndexController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $googl = new Google('YOUR_API_KEY');

        $kisa_link = url('/') . "/child/auth/twitter/" . Auth::user()->id . "";
        // URL Kısalt
        $kisa_link = $googl->shorten($kisa_link);

        unset($googl);

        $toplam_cocuk = ChildUser::where('user_id', Auth::user()->id)->count();

        $cocuklar = ChildUser::where('user_id', Auth::user()->id)->limit(20)->get();

        return view('patron.index', compact('kisa_link'), compact('toplam_cocuk', 'cocuklar'));

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
        //
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
    public function destroy(Request $request)
    {
        $user_id = Auth::user()->id;

        $cocuk_id = $request->input('id');

        $cocuk_kontrol = ChildUser::where('user_id', $user_id)->where('id', $cocuk_id)->count();

        if ($cocuk_kontrol > 0) {

            $cocuk = ChildUser::find($cocuk_id);

            $cocuk->delete();

            return redirect()->to('patron/panel')->with('status', 'Hesap kaldırıldı !');

        } else {
            return redirect()->to('patron/panel')->with('hata', 'Böyle bir sonuç bulunamadı !');
        }


    }
}
