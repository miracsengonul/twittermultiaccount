@include('patron.layouts.master')
<body class="fix-header fix-sidebar card-no-border">
<div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
    </svg>
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
                            <img src="{{asset('icon/star.png')}}" alt="Twitter">
                            <p>
                            <h2 style="color: black">Paketler </h2></p>
                            <hr>
                            <div class="container">
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">

                                        <div class="panel price panel-red">
                                            <div class="panel-heading  text-center">
                                                <h3 style="color: white;">Mini Paket</h3>
                                            </div>
                                            <div class="panel-body text-center">
                                                <p class="lead" style="font-size:40px"><strong>25 TL / ay</strong></p>
                                            </div>
                                            <ul class="list-group list-group-flush text-center">
                                                <li class="list-group-item"><i class="icon-ok text-danger"></i> 25 Alt
                                                    Üye
                                                </li>
                                                <li class="list-group-item"><i class="icon-ok text-danger"></i> Sınırsız
                                                    İşlem
                                                </li>
                                                <li class="list-group-item"><i class="icon-ok text-danger"></i> 7/24
                                                    Destek
                                                </li>
                                            </ul>
                                            <div class="panel-footer">
                                                <a class="btn btn-lg btn-block btn-danger" href="iletisim">SATIN AL!</a>
                                            </div>
                                        </div>


                                    </div>

                                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">

                                        <div class="panel price panel-blue">
                                            <div class="panel-heading arrow_box text-center">
                                                <h3 style="color: white;">Orta Paket</h3>
                                            </div>
                                            <div class="panel-body text-center">
                                                <p class="lead" style="font-size:40px"><strong>50 TL / ay</strong></p>
                                            </div>
                                            <ul class="list-group list-group-flush text-center">
                                                <li class="list-group-item"><i class="icon-ok text-info"></i> 55 Alt Üye
                                                </li>
                                                <li class="list-group-item"><i class="icon-ok text-danger"></i> Sınırsız
                                                    İşlem
                                                </li>
                                                <li class="list-group-item"><i class="icon-ok text-danger"></i> 7/24
                                                    Destek
                                                </li>
                                            </ul>
                                            <div class="panel-footer">
                                                <a class="btn btn-lg btn-block btn-info" href="iletisim">SATIN AL!</a>
                                            </div>
                                        </div>


                                    </div>

                                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">


                                        <div class="panel price panel-green">
                                            <div class="panel-heading arrow_box text-center">
                                                <h3 style="color: white;">Büyük Paket</h3>
                                            </div>
                                            <div class="panel-body text-center">
                                                <p class="lead" style="font-size:40px"><strong>75 TL / ay</strong></p>
                                            </div>
                                            <ul class="list-group list-group-flush text-center">
                                                <li class="list-group-item"><i class="icon-ok text-success"></i> 85 Alt
                                                    Üye
                                                </li>
                                                <li class="list-group-item"><i class="icon-ok text-danger"></i> Sınırsız
                                                    İşlem
                                                </li>
                                                <li class="list-group-item"><i class="icon-ok text-danger"></i> 7/24
                                                    Destek
                                                </li>
                                            </ul>
                                            <div class="panel-footer">
                                                <a class="btn btn-lg btn-block btn-success" href="iletisim">SATIN
                                                    AL!</a>
                                            </div>
                                        </div>



                                    </div>

                                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">

                                        <div class="panel price panel-grey">
                                            <div class="panel-heading arrow_box text-center">
                                                <h3 style="color: white;">Mega Paket</h3>
                                            </div>
                                            <div class="panel-body text-center">
                                                <p class="lead" style="font-size:40px"><strong>100 TL / ay</strong></p>
                                            </div>
                                            <ul class="list-group list-group-flush text-center">
                                                <li class="list-group-item"><i class="icon-ok text-success"></i> 120 Alt
                                                    Üye
                                                </li>
                                                <li class="list-group-item"><i class="icon-ok text-danger"></i> Sınırsız
                                                    İşlem
                                                </li>
                                                <li class="list-group-item"><i class="icon-ok text-danger"></i> 7/24
                                                    Destek
                                                </li>
                                            </ul>
                                            <div class="panel-footer">
                                                <a class="btn btn-lg btn-block btn-primary" href="iletisim">SATIN
                                                    AL!</a>
                                            </div>
                                        </div>



                                    </div>


                                </div>


                            </div>
                            <br>
                            <hr>
                            <h3>Daha yüksek alt üyelikler için lütfen iletişime geçiniz.</h3>
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
