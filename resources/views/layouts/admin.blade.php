<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Admin Auroblog</title>

  <link rel="stylesheet" href="{{ asset('admin') }}/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="{{ asset('admin') }}/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
  @yield('style')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ asset('admin/dashboard') }}" class="brand-link">
      <img src="{{ asset('admin') }}/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Admin Auroblog</span>
    </a>

    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        </div>
        <div class="info">
          <a href="#" class="d-block"> {{ Auth::user()->name }} </a>
        </div>
      </div>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item mt-auto">
            <a href="{{ route('posts.index') }}" onclick="" class="nav-link">
              <i class="nav-icon fas fa-pen-square"></i>
              <p> Posts </p>
            </a>
          </li>
          <li class="nav-item mt-auto">
            <a href="{{ route('blog') }}" class="nav-link" target="_blank">
              <i class="nav-icon fas fa-blog"></i>
              <p> Ir al blog </p>
            </a>
          </li>
          <li class="nav-item mt-auto bg-danger">
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p> Logout </p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>

  <div class="content-wrapper">
      @yield('content')
  </div>

  <aside class="control-sidebar control-sidebar-dark">
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>

  <footer class="main-footer">
    <strong>Copyright &copy; <script>document.write(new Date().getFullYear());</script> <a href="{{ route('blog') }}">Auroblog </a>.</strong> Todos los derechos reservados.
  </footer>
</div>

<form id="logout-form" action="{{ route('logout') }}" method="POST">
    @csrf
</form>

<script src="{{ asset('admin') }}/plugins/jquery/jquery.min.js"></script>
<script src="{{ asset('admin') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('admin') }}/js/adminlte.min.js"></script>
<script src="{{ asset('admin') }}/js/bs-custom-file-input.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
@yield('script')
<script>
    @if(Session::has('success'))
      toastr.success("{{ Session::get('success') }}");
    @endif
    $(document).ready(function() {
      bsCustomFileInput.init();
    });
</script>
</body>
</html>
