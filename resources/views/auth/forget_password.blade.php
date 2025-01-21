@extends('layouts.app')

@section('breadcrumb')
  <ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="http://www.mobile-ct.co.jp/" target="_blank">ホーム</a></li>
    <li class="breadcrumb-item"><a href="01_login.html">KDDIデモ機買取施策</a></li>
    <li class="breadcrumb-item"><a href="03_login_user.html">個別ログイン</a></li>
    <li class="breadcrumb-item">パスワードをお忘れの方</li>
  </ul>
@endsection

@section('content')
  <main>
    <h1 class="heading-level-1">個別ログイン</h1>
    <div class="guidebox">
      <p>パスワードの確認を行います</p>
    </div>
    <form method="POST">
      <input type="hidden" name="token" value="xxxxxxxxxxxxxxxxxx">
      <div class="login-box">
        <p class="login-lead">
        パスワードの確認を行いたいメールアドレスを入力してください。</p>
        <input type="text" name="id" class="login-input" placeholder="your@email.com">
        <p class="notice">※ご入力のメールアドレスにパスワードをお送りします。</p>
      </div>
      <a href="javascript:void(0);" class="button submit-button">送信</a>
    </form>
  </main>
@endsection
