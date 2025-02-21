
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
  <title>KDDIデモ機買取施策&emsp;ログイン - モバイルケアテクノロジーズ株式会社</title>
  <link rel="stylesheet" href="{{ env('APP_ENV') == 'production' ? secure_asset('css/normalize.css') : asset('css/normalize.css') }}">
  <link rel="stylesheet" href="{{ env('APP_ENV') == 'production' ? secure_asset('css/style.css') : asset('css/style.css') }}">
  <link rel="stylesheet" href="{{ env('APP_ENV') == 'production' ? secure_asset('css/bootstrap-4.0.0select.css') : asset('css/bootstrap-4.0.0select.css') }}">
  <link rel="shortcut icon" href="https://www.mobile-ct.co.jp/favicon.png" />
</head>
<body>
  <header>
    <p class="header-logo">
      <img src="{{ env('APP_ENV') == 'production' ? secure_asset('images/logo_01.png') : asset('images/logo_01.png') }}" alt="KDDI店頭デモ機買取ご紹介ページ">
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

  <script src="{{ env('APP_ENV') == 'production' ? secure_asset('js/jquery-3.7.1.min.js') : asset('js/jquery-3.7.1.min.js') }}"></script>
  {{-- <script src="{{ asset('js/base.js') }}"></script>
  <script src="{{ asset('js/login.js') }}"></script> --}}
  <script src="{{ env('APP_ENV') == 'production' ? secure_asset('js/jquery.validate.min.js') : asset('js/jquery.validate.min.js') }}"></script>
  @yield('script')
</body>
</html>
