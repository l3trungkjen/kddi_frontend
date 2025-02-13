@extends('layouts.app')

@section('breadcrumb')
  <ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="http://www.mobile-ct.co.jp/" target="_blank">ホーム</a></li>
    <li class="breadcrumb-item">KDDIデモ機買取施策&emsp;ログイン</li>
  </ul>
@endsection

@section('content')
  <main>
    <h1 class="heading-level-1">ログイン</h1>
    <div class="goRight"><p class="stepNext arrowRight">お客様情報登録済の方は<a href="/auth/login-user">こちら</a></div>

    <div class="guidebox">
      <p>初めてお申し込みされる方のログインページになります<br>
      <span>（KDDI紹介者様以外のご利用はご遠慮ください）</span></p>
    </div>

    <form method="POST" id="login" action="/submit-login">
      @csrf

      @if ($errors->has('login_error'))
        <div class="error">
            {{ $errors->first('login_error') }}
        </div>
      @endif

      <input type="hidden" name="_token" value="{{ csrf_token() }}" />
      <div class="login-box">
        <p class="login-title">ログインID</p>
        <input type="text" name="id" id="id" class="login-input" placeholder="your@email.com">
        <p class="login-title">パスワード</p>
        <input type="password" name="password" id="password" class="login-input" placeholder="パスワード">
      </div>

      <button type="submit" class="button submit-button">ログイン</button>
    </form>
  </main>
@endsection

@section('script')
  <script>
    $(function() {
      $("#login").validate({
        rules: {
          id: {
            required: true,
            // email: true
          },
          password: {
            required: true,
            // minlength: 5
          }
        },
        messages: {
          password: {
            required: "[パスワード]を入力してください。",
            // minlength: "Your password must be at least 5 characters long"
          },
          id: "[ログインID]を入力してください。"
        },
        submitHandler: function (form) {
          form.submit();
        },
      });
    });
  </script>
@endsection
