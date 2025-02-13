@extends('layouts.app')

@section('breadcrumb')
  <ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="/" target="_blank">ホーム</a></li>
    <li class="breadcrumb-item"><a href="/login">KDDIデモ機買取施策</a></li>
    <li class="breadcrumb-item">TOP</li>
  </ul>
@endsection

@section('content')
  <main>
    <h1 class="heading-level-1">TOP</h1>
    <div class="guidebox">
      <p>まだアカウントをお持ちでない方は<br>新規登録を行ってください</p>
    </div>
    <div class="categories">
      <ul>
        <li><a href="/entry/flow" class="arrowMenu">お客様情報登録の流れ</a></li>
        <li><a href="/purchase/flow" class="arrowMenu">買取申込の流れ</a></li>
      </ul>
    </div>
    <a href="/entry/step-one" class="button submit-button">お客様情報登録はこちら</a>
  </main>
@endsection
