<nav class="navbar navbar-expand-lg navbar-light fixed-top navbar-shrink" id="mainNav">
  <div class="container">
    <a class="navbar-brand js-scroll-trigger" href="{{url('/')}}">Ceklokasi</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="{{url('menjadi-partner')}}">Menjadi Partner</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="{{url('bantuan')}}">Bantuan</a>
        </li> -->
        @if(Auth::check())
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="{{url('logout')}}">Log Out</a>
        </li>
        @else
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="javascript:;"  data-toggle="modal" data-target="#daftarUser" >Daftar</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="javascript:;" data-toggle="modal" data-target="#loginUser">Log In</a>
        </li>
        @endif
      </ul>
    </div>
  </div>
</nav>