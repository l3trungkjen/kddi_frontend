
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
  <title>KDDIデモ機買取施策&emsp;ログイン - モバイルケアテクノロジーズ株式会社</title>
  <link rel="stylesheet" href="{{ secure_asset('css/normalize.css') }}">
  <link rel="stylesheet" href="{{ secure_asset('css/style.css') }}">
  <link rel="shortcut icon" href="https://www.mobile-ct.co.jp/favicon.png" />
</head>
<body>
  <header>
    <p class="header-logo">
      <img src="{{ secure_asset('images/logo_01.png') }}" width="291" height="50" alt="モバイルケアテクノロジーズ">
    </p>
  </header>

  <section class="roof">
    @yield('breadcrumb')
  </section>

  <section class="mount">
    @yield('content')
  </section>

  <section class="roof">
    @yield('breadcrumb2')
  </section>

  <footer>
    @include('sections.footer')
  </footer>

  <script src="{{ secure_asset('js/jquery-3.7.1.min.js') }}"></script>
  {{-- <script src="{{ secure_asset('js/base.js') }}"></script>
  <script src="{{ secure_asset('js/login.js') }}"></script> --}}
  <script src="{{ secure_asset('js/jquery.validate.min.js') }}"></script>
  @yield('script')
</body>
</html>
