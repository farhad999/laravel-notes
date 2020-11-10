<!DOCTYPE html>
    <head>
        <title>Todo App</title>
        <link rel="stylesheet" href="{{asset('/vendor/bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('/main.css')}}" />
    </head>
<body>
    <!-- Navigation menu -->
    <nav class="navbar bg-light">
  <div class="container">
<ul class="nav nav-pills w-100 justify-content-center">
  <li class="nav-item mx-2">
    <a class="nav-link {{request()->is("/") ? 'active' : ''}}" href="/">Notes</a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{request()->is("/") ? 'active' : ''}}" href="/tags">Tags</a>
  </li>
</ul>
</div>
</nav>

<!-- End naivation -->

    @yield('main')
</body>
</html>
