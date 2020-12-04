<html>
<head>
<title>DemoLaravel - @yield('title')</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<div class="container my-5">
<div class="row">
<div class="col-md-4">
<ul class="list-group">
<li class="list-group-item"><a href="{{ url('home') }}">หน้าแรก</a></li>
<li class="list-group-item"><a href="{{ url('about') }}">เกี่ยวกับเรา</a></li>
<li class="list-group-item"><a href="{{ url('contact') }}">ติดต่อเรา</a></li>
</ul>
</div>
<div class="col-md-8">                
<div class="card">
<div class="card-body">
@yield('content')
</div>
</div>
</div>
</div>
</div>
</body>
</html>