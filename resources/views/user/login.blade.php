@extends('layouts.app')

@section('breadcrumb')
  <ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="http://www.mobile-ct.co.jp/" target="_blank">ホーム</a></li>
    <li class="breadcrumb-item"><a href="01_login.html">KDDIデモ機買取施策</a></li>
    <li class="breadcrumb-item">個別ログイン</li>
  </ul>
@endsection

@section('content')
  <main>
    <h1 class="heading-level-1">個別ログイン</h1>
    <form method="POST">
      <input type="hidden" name="token" value="xxxxxxxxxxxxxxxxxx">
      <div class="login-box mt60">
        <p class="login-title">専用ID（メールアドレス）</p>
        <input type="text" name="id" class="login-input" placeholder="your@email.com">
        <p class="login-title">専用パスワード</p>
        <input type="password" name="pass" class="login-input" placeholder="パスワード">
      </div>
      <a href="/auth/user" class="button submit-button">ログイン</a>
      <p class="forget"><a href="/auth/forget-password">パスワードをお忘れの方</a></p>
    </form>
  </main>
@endsection
