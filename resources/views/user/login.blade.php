@extends('layouts.app')

@section('breadcrumb')
  <ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="/" target="_blank">ホーム</a></li>
    <li class="breadcrumb-item"><a href="/login">KDDIデモ機買取施策</a></li>
    <li class="breadcrumb-item">個別ログイン</li>
  </ul>
@endsection

@section('content')
  <main>
    <h1 class="heading-level-1">個別ログイン</h1>
    <form method="POST" id="login_user" action="/auth/login-user-submit">
      @csrf

      @if ($errors->has('login_error'))
        <div class="error">
            {{ $errors->first('login_error') }}
        </div>
      @endif

      <div class="login-box mt60">
        <p class="login-title">専用ID（メールアドレス）</p>
        <input type="text" name="email" id="email" class="login-input" placeholder="your@email.com">
        <p class="login-title">専用パスワード</p>
        <input type="password" name="password" id="password" class="login-input" placeholder="パスワード">
      </div>
      <button class="button submit-button">ログイン</button>
      <p class="forget"><a href="/auth/forget-password">パスワードをお忘れの方</a></p>
    </form>
  </main>
@endsection

@section('script')
  <script>
    $(function() {
      $("#login_user").validate({
        rules: {
          email: {
            required: true,
            email: true,
          },
          password: {
            required: true,
          },
        },
        messages: {
          email: {
            required: "[メールアドレス]を入力してください。",
            email: "有効なメールアドレスを入力してください。",
          },
          password: {
            required: "[専用パスワード]を入力してください。",
          },
        },
        submitHandler: function (form) {
          form.submit();
        },
      });
    });
  </script>
@endsection
