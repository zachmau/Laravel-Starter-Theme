<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="/css/app.css">
  <title>Starter Template</title>
  <!-- Scripts -->
  <script>
      window.Laravel = {!! json_encode([
          'csrfToken' => csrf_token(),
      ]) !!};
  </script>
</head>
<body>
  @include('inc.navbar')

  <main role="main">
    @if(Request::is('/'))
      @include('inc.showcase')
    @endif
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-lg-8">
          @include('inc.messages')
          @yield('content')
        </div>
        <div class="col-md-4 col-lg-4">
          @include('inc.sidebar')
        </div>
      </div>
    </div>
  </main><!-- /.container -->
  <footer class="footer">
    <div class="container">
      <span>&copy; 2018 Company, Inc. All Rights Reserved</span>
    </div>
  </footer>
  <script src="/js/app.js"></script>
</body>
</html>
