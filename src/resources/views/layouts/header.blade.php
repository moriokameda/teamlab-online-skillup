<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Github_instagram</title>
</head>
<body>
  <header class="nav_link">
    <nav>
      <ul>
        <li><a href="/instagram/home">ホーム</a></li>
        <li>
          <!-- 未ログイン時 -->

          <a href="/">ログイン</a> <br>
          <!-- ログイン済時 -->
          <form action="" method="get"></form>
          <a href="/">ログアウト</a>
        </li>
        <li></li>
      </ul>
    </nav>
  </header>
  @yield('content')

  <script src="{{ url('/') }}/dist/js/vendor/jquery.min.js"></script>
  <script src="{{ url('/') }}/dist/js/vendor/video.js"></script>
  <script src="{{ url('/') }}/dist/js/flat-ui.min.js"></script>
  <script src="{{ url('/') }}/assets/js/prettify.js"></script>
  <script src="{{ url('/') }}/assets/js/application.js"></script>
</body>
</html>
