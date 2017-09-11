<header class="topbar">
    <nav class="navbar top-navbar navbar-toggleable-sm navbar-light">

        <div class="navbar-header">
            <a class="navbar-brand" href="../patron/panel">

                    <img src="{{asset('assets/images/logo-light-icon.png')}}" alt="homepage" class="light-logo" />
                </b>
               <span><img src="{{asset('assets/images/logo-light-text.png')}}" class="light-logo" alt="homepage" /></span> </a>
        </div>

        <div class="navbar-collapse">

            <ul class="navbar-nav mr-auto mt-md-0">

                <li data-toggle="modal" data-target="#myModal" class="nav-item"><a style="font-size:15px" class="nav-link nav-toggler text-muted waves-effect waves-dark" href="javascript:void(0)">Nasıl Çalışır ?</a></li>
                <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>

            </ul>

            <ul class="navbar-nav my-lg-0">

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{Auth::user()->avatar}}" alt="user" class="profile-pic m-r-10" />{{Auth::user()->name}}</a>
                </li>
            </ul>
        </div>
    </nav>
</header>


<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      
        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title text-center">Nasıl Çalışır ?</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <p>Öncelikle Panel sayfasında size özel tanımlanan linki kopyalayın.</p>
                <p>Daha sonra alt üye yapmak istediğiniz hesapların bu linke giriş yapmasını sağlayın.</p>
                <p>Artık alt üyelerinize istediğiniz işlemi yaptırabilirsiniz !</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
            </div>
        </div>

    </div>
</div>