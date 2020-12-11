<html>
<head>
<title>Salary Vayo Trade - @yield('title')</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <!-- Favicon -->
  <link rel="icon" href="/assets/img/brand/vayo.jpg" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="/assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="/assets/css/argon.css?v=1.2.0" type="text/css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}" />

</head>
<body>
@section('sidebar')
<!-- Sidenav -->
<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="/">
          <img src="/assets/img/brand/vayo.jpg" class="navbar-brand-img" alt="...">
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="/manage">
                <i class="ni ni-tv-2 text-orange"></i>
                <span class="nav-link-text">จัดการข้อมูลพื้นฐาน</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/working">
                <i class="ni ni-satisfied text-orange"></i>
                <span class="nav-link-text">ข้อมูลการทำงาน</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/report">
                <i class="ni ni-planet text-orange"></i>
                <span class="nav-link-text">รายงาน</span>
              </a>
            </li>
          </ul>
        </div>
      </nav>
      <div class="main-content" id="panel">
        @yield('content')
      </div>
  </body>
</html>
