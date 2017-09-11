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
                        <h3 class="text-themecolor">Tweet</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Anasayfa</a></li>
                            <li class="breadcrumb-item active">Tweet</li>
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
                                <p><h2 style="color: black">Tweet : </h2></p>
                                <hr>
                                <form action="" method="POST">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <textarea class="form-control metin" type="text" maxlength="140" name="metin" placeholder="Tweet metinini giriniz...." autocomplete="off" required></textarea>
                                    <hr>
                                    <div class="col-md-12">
                                        <div style="float:left;margin-top:10px;">Kalan:&nbsp</div>
                                        <div class="say1" style="float:left;margin-top:10px;font-weight:bold">140</div>
                                    </div>
                                </div>
                                     <p class="text-center"><input type="submit" class="btn btn-info" value="Tweetle"></p>
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
    <script>
        $(function(){
            var say1 = 140; // var olan değer
            $('.metin').bind('keydown keyup keypress change',function(){
                var thisValueLength = $(this).val().length;
                var saymin = (say1)-(thisValueLength);
                $('.say1').html(saymin);

                if(saymin < 0){
                    $('.say1').css({color:'#ff0000',fontWeight:'bold'});
                } else {
                    $('.say1').css({color:'#000000',fontWeight:'bold'});
                }
            });
            $(window).load(function(){
                $('.say1').html(say1);
            });
        });
    </script>
</body>

</html>
