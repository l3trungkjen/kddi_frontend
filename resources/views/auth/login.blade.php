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
    <div class="goRight"><p class="stepNext arrowRight">お客様情報登録済の方は<a href="03_login_user.html">こちら</a></div>

    <div class="guidebox">
      <p>初めてお申し込みされる方のログインページになります<br>
      <span>（KDDI紹介者様以外のご利用はご遠慮ください）</span></p>
    </div>

    <form method="POST">
      <input type="hidden" name="token" value="xxxxxxxxxxxxxxxxxx">
      <div class="login-box">
        <p class="login-title">ログインID</p>
        <input type="text" name="id" class="login-input" placeholder="your@email.com">
        <p class="login-title">パスワード</p>
        <input type="password" name="pass" class="login-input" placeholder="パスワード">
      </div>

      <a href="/" class="button submit-button">ログイン</a>
    </form>
  </main>
@endsection
