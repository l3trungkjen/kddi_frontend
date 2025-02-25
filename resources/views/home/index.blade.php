@extends('layouts.app')

@section('breadcrumb')
  <ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="http://www.mobile-ct.co.jp/" target="_blank">ホーム</a></li>
    {{-- <li class="breadcrumb-item"><a href="/login">KDDI店頭デモ機買取ご紹介ページ</a></li> --}}
    @if (isset($user))
      <li class="breadcrumb-item">個別TOP</li>
    @else
      <li class="breadcrumb-item">TOP</li>
    @endif
  </ul>
@endsection

@section('content')
  @if (isset($user))
    <main>
      <h1 class="heading-level-1">基本ページ</h1>
      <div class="categories">
        <ul>
          <li><a href="/purchase/flow" class="arrowMenu">買取申込の流れ</a></li>
          <li><a href="/purchase/price-list" class="arrowMenu">買取価格</a></li>
          <li><a href="/entry/edit" class="arrowMenu">お客様情報変更</a></li>
        </ul>
      </div>
      <a href="/purchase/step-one" class="button submit-button">買取申込はこちら</a>
    </main>
  @else
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
  @endif
@endsection
