@extends('layouts.app')

@section('breadcrumb')
  <ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="http://www.mobile-ct.co.jp/" target="_blank">ホーム</a></li>
    <li class="breadcrumb-item"><a href="01_login.html">KDDIデモ機買取施策</a></li>
    <li class="breadcrumb-item">個別TOP</li>
  </ul>
@endsection

@section('content')
  <main>
    <h1 class="heading-level-1">個別TOP</h1>
    <div class="categories">
      <ul>
        <li><a href="/purchase/flow" class="arrowMenu">買取申込の流れ</a></li>
        <li><a href="/purchase/price-list" class="arrowMenu">買取価格</a></li>
        <li><a href="/entry/edit" class="arrowMenu">お客様情報変更</a></li>
      </ul>
    </div>
    <a href="/purchase/step-one" class="button submit-button">買取申込はこちら</a>
  </main>
@endsection
