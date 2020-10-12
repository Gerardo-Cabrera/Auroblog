<!DOCTYPE html>
<html lang="en">
  <head>
    <title> Auroblog </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700|Playfair+Display:400,700,900" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('blog') }}/fonts/icomoon/style.css">
    <link rel="stylesheet" href="{{ asset('blog') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('blog') }}/css/magnific-popup.css">
    <link rel="stylesheet" href="{{ asset('blog') }}/css/jquery-ui.css">
    <link rel="stylesheet" href="{{ asset('blog') }}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('blog') }}/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{ asset('blog') }}/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="{{ asset('blog') }}/fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="{{ asset('blog') }}/css/aos.css">
    <link rel="stylesheet" href="{{ asset('blog') }}/css/style.css">
  </head>
  <body>
  
  <div class="site-wrap">
    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
    
    <header class="site-navbar" role="banner" style="border-bottom: 1px solid #223160; color:#223160;">
      <div class="container-fluid">
        <div class="row align-items-center">
          
          <div class="col-12 search-form-wrap js-search-form">
            <form method="get" action="#">
              <input type="text" id="s" class="form-control" placeholder="Search...">
              <button class="search-btn" type="submit"><span class="icon-search"></span></button>
            </form>
          </div>

          <div class="col-4 site-logo">
            <a href="{{ route('blog') }}" class="text-black h2 mb-0" style="font-family: system-ui;"> Auroblog </a>
          </div>

          <div class="col-8 text-right">
            <nav class="site-navigation" role="navigation">
              <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block mb-0">
                <li><a href="{{ route('blog') }}"> Inicio </a></li>
              </ul>
            </nav>
          </div>
      </div>
    </header>
    
    @yield('content')
    
    <div class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-12 text-center">
            <p>
              Copyright &copy; <script>document.write(new Date().getFullYear());</script> Todos los derechos reservados
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="{{ asset('blog') }}/js/jquery-3.3.1.min.js"></script>
  <script src="{{ asset('blog') }}/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="{{ asset('blog') }}/js/jquery-ui.js"></script>
  <script src="{{ asset('blog') }}/js/popper.min.js"></script>
  <script src="{{ asset('blog') }}/js/bootstrap.min.js"></script>
  <script src="{{ asset('blog') }}/js/owl.carousel.min.js"></script>
  <script src="{{ asset('blog') }}/js/jquery.stellar.min.js"></script>
  <script src="{{ asset('blog') }}/js/jquery.countdown.min.js"></script>
  <script src="{{ asset('blog') }}/js/jquery.magnific-popup.min.js"></script>
  <script src="{{ asset('blog') }}/js/bootstrap-datepicker.min.js"></script>
  <script src="{{ asset('blog') }}/js/aos.js"></script>
  <script src="{{ asset('blog') }}/js/main.js"></script>

  </body>
</html>