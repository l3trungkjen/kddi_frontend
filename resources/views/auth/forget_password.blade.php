@extends('layouts.app')

@section('breadcrumb')
  <ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="http://www.mobile-ct.co.jp/" target="_blank">ホーム</a></li>
    <li class="breadcrumb-item"><a href="/login">KDDIデモ機買取施策</a></li>
    <li class="breadcrumb-item"><a href="/auth/login-user">個別ログイン</a></li>
    <li class="breadcrumb-item">パスワードをお忘れの方</li>
  </ul>
@endsection

@section('content')
  <main>
    <h1 class="heading-level-1">個別ログイン</h1>
    <div class="guidebox">
      <p>パスワードの確認を行います</p>
    </div>
    <form method="POST" action="/auth/forget-password-submit">
      @csrf
      <div class="login-box">
        <p class="login-lead">パスワードの確認を行いたいメールアドレスを入力してください。</p>
        @if ($errors->has('message_error'))
          <div class="error">
              {{ $errors->first('message_error') }}
          </div>
        @endif
        @if ($errors->has('message_success'))
          <div class="success">
              {{ $errors->first('message_success') }}
          </div>
        @endif
        <input type="text" name="email" class="login-input" placeholder="your@email.com">
        <p class="notice">※ご入力のメールアドレスにパスワードをお送りします。</p>
      </div>
      {{-- <a href="javascript:void(0);" class="button submit-button">送信</a> --}}
      <button class="button submit-button">送信</button>
    </form>
  </main>
@endsection
