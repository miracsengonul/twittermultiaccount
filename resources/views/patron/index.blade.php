@include('patron.layouts.master')
<body class="fix-header fix-sidebar card-no-border">
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <div id="main-wrapper">
        @include('patron.layouts.header')
        @include('patron.layouts.sol_menu')
        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor">Panel</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Anasayfa</a></li>
                            <li class="breadcrumb-item active">Panel</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-xlg-12 col-md-12">

                        @if (session('status'))
                            <div class="alert alert-success text-center">
                                {{ session('status') }}
                            </div>
                        @endif


                        @if (session('hata'))
                            <div class="alert alert-danger text-center">
                                {{ session('hata') }}
                            </div>
                        @endif

                        <div class="card">
                            <div class="card-block little-profile text-center">
                                <img src="{{asset('icon/twitter.png')}}" alt="Twitter">
                                <p><h2 style="color: black">TwitGroup Adresiniz </h2></p>
                                <hr>
                                <h4>{{$kisa_link}}</h4>
                                <hr>
                            </div>
                            <div class="card-block">
                                Yukarıda size ait olan adrese, bağlamak istediğiniz hesaplar tarafından giriş yapılmasını sağlayın.
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-xlg-12 col-md-12">
                        <div class="card">
                            <div class="card-block little-profile text-center">
                                <h4 style="color: black;">Toplam : {{$toplam_cocuk}} adet alt üyeniz var.</h4>

                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">

                    @foreach($cocuklar as $cocuk)

                    <div class="col-lg-4 col-xlg-3 col-md-5">

                        <div class="card">
                            <img class="card-img-top" src="{{asset('assets/images/background/profile-bg.jpg')}}" alt="{{$cocuk->name}}">
                            <div class="card-block little-profile text-center">
                                <a href="https://twitter.com/{{$cocuk->handle}}" target="_blank">
                                    <div class="pro-img"><img src="{{$cocuk->avatar}}" alt="user" /></div>
                                    <h3 class="m-b-0" style="font-weight: 400;color:black">{{$cocuk->name}}</h3>
                                    <p style="color:#333">{{$cocuk->handle}}</p>
                                </a>
                                <form action="" method="POST">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <input type="hidden" name="id" value="{{$cocuk->id}}">
                                    <input type="submit" value="Listeden Çıkar" style="color:#333" class="m-t-10 btn btn-success btn-md ">
                                </form>
                            </div>
                        </div>
                    </div>

                @endforeach



                </div>

            </div>

            @include('patron.layouts.footer')

        </div>

    </div>

    @include('patron.layouts.script')
</body>

</html>
