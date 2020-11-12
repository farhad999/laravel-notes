<!DOCTYPE html>
    <head>
        <title>Todo App</title>
        <link rel="stylesheet" href="{{asset('/vendor/bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('/main.css')}}" />
        <link rel="stylesheet" href="{{asset('/vendor/select2/select2.min.css')}}">
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

<!---Script section -->
<script src="{{asset('vendor/jquery-3.6.1.min.js')}}"></script>
<script src="{{'vendor/bootstrap//js/bootstrap.min.js'}}"></script>
<script src="{{asset('vendor/select2/select2.min.js')}}"></script>
    @yield('scripts')
</body>
</html>
