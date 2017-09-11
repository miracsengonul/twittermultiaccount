<aside class="left-sidebar">

    <div class="scroll-sidebar">

        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li> <a class="waves-effect waves-dark" href="../patron/panel" aria-expanded="false"><img src="{{asset('icon/dashboard.png')}}"><span class="hide-menu"> Panel</span></a>
                </li>
                <li> <a class="waves-effect waves-dark" href="../patron/profil" aria-expanded="false"><img src="{{asset('icon/user.png')}}" width="24"></i><span class="hide-menu"> Profil</span></a>
                </li>
                <li> <a class="waves-effect waves-dark" href="../patron/tweet" aria-expanded="false"><img src="{{asset('icon/tweet.png')}}" width="24"></i><span class="hide-menu"> Tweet</span></a>
                </li>
                <li> <a class="waves-effect waves-dark" href="../patron/takip-et" aria-expanded="false"><img src="{{asset('icon/takip.png')}}"><span class="hide-menu"> Takip Et</span></a>
                </li>
                <li> <a class="waves-effect waves-dark" href="../patron/retweet" aria-expanded="false"><img src="{{asset('icon/retweet1.png')}}"><span class="hide-menu"> Retweet</span></a>
                </li>
                <li> <a class="waves-effect waves-dark" href="../patron/unretweet" aria-expanded="false"><img src="{{asset('icon/rtsil.png')}}"><span class="hide-menu"> Retweet Sil</span></a>
                </li>
                <li> <a class="waves-effect waves-dark" href="../patron/fav" aria-expanded="false"><img src="{{asset('icon/fav1.png')}}"><span class="hide-menu"> Fav</span></a>
                </li>
                <li> <a class="waves-effect waves-dark" href="../patron/unfav" aria-expanded="false"><img src="{{asset('icon/favsil.png')}}"><span class="hide-menu"> Fav Sil</span></a>
                </li>
                <li> <a class="waves-effect waves-dark" href="../patron/paketler" aria-expanded="false"><img src="{{asset('icon/para.png')}}"><span class="hide-menu"> Paketler</span></a>
                </li>
                <li> <a class="waves-effect waves-dark" href="../patron/iletisim" aria-expanded="false"><img src="{{asset('icon/whatsapp.png')}}"><span class="hide-menu"> İletişim</span></a>
                </li>
            </ul>

        </nav>

    </div>

    <div class="sidebar-footer">
        <a href="../patron/ayarlar" class="link" data-toggle="tooltip" title="Ayarlar"><i class="ti-settings"></i></a>
        <a href="mailto:info@twitgroup.net" class="link" data-toggle="tooltip" title="Email"><i class="mdi mdi-gmail"></i></a>
        <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"
                       class="link" data-toggle="tooltip" title="Çıkış"><i class="mdi mdi-power"></i></a>
                       <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                       </form>
    </div>

</aside>