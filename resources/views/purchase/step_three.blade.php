@extends('layouts.app')

@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="http://www.mobile-ct.co.jp/" target="_blank">ホーム</a></li>
          <li class="breadcrumb-item"><a href="/login">KDDI店頭デモ機買取ご紹介ページ </a></li>
        {{-- <li class="breadcrumb-item"><a href="01_login.html">KDDIご紹介者様ページ</a></li> --}}
        @if (isset($user))
            <li class="breadcrumb-item"><a href="/base">個別TOP</a></li>
        @else
            <li class="breadcrumb-item"><a href="/base">TOP</a></li>
        @endif
        <li class="breadcrumb-item">買取お申込み：送信完了</li>
    </ul>
    <div class="logout" bis_skin_checked="1">
        <a href="/auth/logout">ログアウト</a>
    </div>
@endsection

@section('breadcrumb2')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="http://www.mobile-ct.co.jp/" target="_blank">ホーム</a></li>
          <li class="breadcrumb-item"><a href="/login">KDDI店頭デモ機買取ご紹介ページ </a></li>
        {{-- <li class="breadcrumb-item"><a href="01_login.html">KDDIデモ機買取施策</a></li> --}}
        @if (isset($user))
            <li class="breadcrumb-item"><a href="/base">個別TOP</a></li>
        @else
            <li class="breadcrumb-item"><a href="/base">TOP</a></li>
        @endif
        <li class="breadcrumb-item">買取お申込み：送信完了</li>
    </ul>
@endsection

@section('content')
    <main>
        <h1 class="heading-level-1">買取お申込み</h1>

        <div class="step">
            <img src="{{ asset('images/step03.png') }}">
        </div>

        <div class="flow">
            <div class="fin">
                <p>送信完了しました</p>
            </div>
        </div>

    </main>
@endsection
