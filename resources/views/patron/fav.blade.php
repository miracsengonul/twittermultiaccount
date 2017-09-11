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
                        <h3 class="text-themecolor">Fav</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Anasayfa</a></li>
                            <li class="breadcrumb-item active">Fav</li>
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
                                <img src="{{asset('icon/fav.png')}}" alt="Twitter">
                                <p><h2 style="color: black">Fav Yapılacak Durum : </h2></p>
                                <hr>
                                <form action="" method="POST">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <input class="form-control" type="text" name="adres" placeholder="https://twitter.com/TwitterTurkiye/status/852836043468357634" autocomplete="off" required>
                                    <hr>
                                    <input type="submit" class="btn btn-info" value="Favla">
                                </form>
                            </div>

                        </div>
                    </div>
                </div>


                </div>
            </div>
            @include('patron.layouts.footer')
        </div>
    </div>
    @include('patron.layouts.script')
</body>

</html>
