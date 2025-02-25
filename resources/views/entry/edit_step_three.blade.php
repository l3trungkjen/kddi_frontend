@extends('layouts.app')

@section('breadcrumb')
  <ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="http://www.mobile-ct.co.jp/" target="_blank">ホーム</a></li>
    {{-- <li class="breadcrumb-item"><a href="01_login.html">KDDIご紹介者様ページ</a></li> --}}
    <li class="breadcrumb-item"><a href="/base">個別TOP</a></li>
    <li class="breadcrumb-item">お客様情報登録：送信完了</li>
  </ul>
@endsection

@section('breadcrumb2')
  <ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="http://www.mobile-ct.co.jp/" target="_blank">ホーム</a></li>
    {{-- <li class="breadcrumb-item"><a href="01_login.html">KDDIご紹介者様ページ</a></li> --}}
    <li class="breadcrumb-item"><a href="/base">個別TOP</a></li>
    <li class="breadcrumb-item">お客様情報登録：送信完了</li>
  </ul>
@endsection

@section('content')
  <main>
    <h1 class="heading-level-1">お客様情報登録</h1>
    <div class="step">
      <img src="{{ asset('images/step03.png') }}">
    </div>
    <div class="flow">
      <div class="fin">
        <p>送信完了しました</p>
      </div>
    </div>
    <a href="/auth/user" class="button submit-button">個別ログインページへ</a>
  </main>
@endsection
