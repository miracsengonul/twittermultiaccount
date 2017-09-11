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
                        <h3 class="text-themecolor m-b-0 m-t-0">Profil</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Anasayfa</a></li>
                            <li class="breadcrumb-item active">Profil</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-block">
                                <center class="m-t-30"> <img src="{{Auth::user()->avatar}}" class="img-circle" width="150" />
                                    <h4 class="card-title m-t-10">{{Auth::user()->name}}</h4>
                                    <h6 class="card-subtitle">{{Auth::user()->handle}}</h6>
                                </center>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <div class="card-block">
                                <form class="form-horizontal form-material">
                                    <div class="form-group">
                                        <label class="col-md-12">İsim</label>
                                        <div class="col-md-12">
                                            <span>{{Auth::user()->name}}</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Email</label>
                                        <div class="col-md-12">
                                            <span>{{Auth::user()->mail}}</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Cinsiyet</label>
                                        <div class="col-md-12">
                                            {{Auth::user()->cinsiyet}}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Telefon</label>
                                        <div class="col-md-12">
                                            +90{{Auth::user()->telefon}}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Üyelik Sonlanma Tarihi</label>
                                        <div class="col-md-12">
                                            {{Auth::user()->paket_bitisi}}
                                        </div>
                                    </div>
                                </form>
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
