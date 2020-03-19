<header class="container-fluid fixed-top">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Boolean</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto ">
        {{-- @dd(url()->current())
        @dd(Request::route()->getName()) --}}
        {{-- if(Request::route()->getName() == 'static_page.home') {
          active
        }
        (Request::route()->getName() == 'static_page.home') ? 'active' : '' --}}
          <li class="nav-item {{(Request::route()->getName() == 'static_page.home') ? 'active' : ''}}">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Corso</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Dopocorso</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Lezione Gratuita</a>
        </li>
        
    </div>
  </nav>
 </header>  