@extends('layouts.app')

@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="/" target="_blank">ホーム</a></li>
        <li class="breadcrumb-item"><a href="/login">KDDIデモ機買取施策</a></li>
        <li class="breadcrumb-item"><a href="/auth/user">個別TOP</a></li>
        <li class="breadcrumb-item">買取お申込み：送信完了</li>
    </ul>
@endsection

@section('breadcrumb2')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="/" target="_blank">ホーム</a></li>
        <li class="breadcrumb-item"><a href="/login">KDDIデモ機買取施策</a></li>
        <li class="breadcrumb-item"><a href="/auth/user">個別TOP</a></li>
        <li class="breadcrumb-item">買取お申込み：送信完了</li>
    </ul>
@endsection

@section('content')
    <main>
        <h1 class="heading-level-1">買取お申込み</h1>

        <div class="">
            <img src="{{ secure_asset('images/step03.png') }}">
        </div>

        <div class="flow">
            <div class="fin">
                <p>送信完了しました</p>
            </div>
        </div>

    </main>
@endsection
