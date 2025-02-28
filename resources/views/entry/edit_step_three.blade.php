@extends('layouts.app')

@section('breadcrumb')
  <ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="http://www.mobile-ct.co.jp/" target="_blank">ホーム</a></li>
    <li class="breadcrumb-item"><a href="/login">KDDI店頭デモ機買取ご紹介ページ </a></li>
    {{-- <li class="breadcrumb-item"><a href="01_login.html">KDDI店頭デモ機買取ご紹介ページ </a></li> --}}
    <li class="breadcrumb-item"><a href="/base">個別TOP</a></li>
    <li class="breadcrumb-item">お客様情報登録：送信完了</li>
  </ul>
  <div class="logout" bis_skin_checked="1">
    <a href="/auth/logout">ログアウト</a>
  </div>
@endsection

@section('breadcrumb2')
  <ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="http://www.mobile-ct.co.jp/" target="_blank">ホーム</a></li>
    <li class="breadcrumb-item"><a href="/login">KDDI店頭デモ機買取ご紹介ページ </a></li>
    {{-- <li class="breadcrumb-item"><a href="01_login.html">KDDI店頭デモ機買取ご紹介ページ </a></li> --}}
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
