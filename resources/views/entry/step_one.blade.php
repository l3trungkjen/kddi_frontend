@extends('layouts.app')

@section('breadcrumb')
  <ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="http://www.mobile-ct.co.jp/" target="_blank">ホーム</a></li>
    <li class="breadcrumb-item"><a href="01_login.html">KDDIデモ機買取施策</a></li>
    <li class="breadcrumb-item"><a href="02_base.html">TOP</a></li>
    <li class="breadcrumb-item">お客様情報登録</li>
  </ul>
@endsection

@section('breadcrumb2')
  <ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="http://www.mobile-ct.co.jp/" target="_blank">ホーム</a></li>
    <li class="breadcrumb-item"><a href="01_login.html">KDDIデモ機買取施策</a></li>
    <li class="breadcrumb-item"><a href="02_base.html">TOP</a></li>
    <li class="breadcrumb-item">お客様情報登録</li>
  </ul>
@endsection

@section('content')
  <main>
    <h1 class="heading-level-1">お客様情報登録</h1>
    <div class="">
        <img src="{{ asset('images/step01.png') }}">
    </div>
    <form>
      <div class="formarea">
        <div class="formcat">
          <div class="h-adr">
            <h2 class="tl">法人情報</h2>
            <dl>
              <dt><label>法人名<span class="required">必須</span></label></dt>
              <dd><input name="" required="required" id="" type="text" class="entry-input"></dd>
            </dl>
            <dl>
              <dt><label>法人名 カナ<span class="required">必須</span></label></dt>
              <dd><input name="" required="required" id="" type="text" class="entry-input"></dd>
            </dl>
            <dl>
              <dt><label>郵便番号<span class="required">必須</span></label></dt>
              <dd><span class="p-country-name" style="display:none;">Japan</span><input type="text" class="p-postal-code entry-input" size="8" maxlength="8"></dd>
            </dl>
            <dl>
              <dt><label>都道府県<span class="required">必須</span> <span class="notice">※郵便番号から自動入力</span></label></dt>
              <dd><input type="text" class="p-region entry-input"></dd>
            </dl>
            <dl>
              <dt><label>市区町村<span class="required">必須</span> <span class="notice">※郵便番号から自動入力</span></label></dt>
              <dd><input type="text" class="p-locality p-street-address entry-input"></dd>
            </dl>
            <dl>
              <dt><label>番地以降<span class="required">必須</span></label></dt>
              <dd><input type="text" class="p-extended-address entry-input"></dd>
            </dl>
            <dl>
              <dt><label>建物名・フロア等</label></dt>
              <dd><input name="" required="" id="" type="text" class="entry-input"></dd>
            </dl>
            <dl>
              <dt><label>担当部署<span class="required">必須</span></label></dt>
              <dd><input name="" required="required" id="" type="text" class="entry-input"></dd>
            </dl>
            <dl>
              <dt><label>電話番号<span class="required">必須</span></label></dt>
              <dd><input name="" required="required" id="" type="text" class="entry-input"></dd>
            </dl>
            <dl>
              <dt><label>メールアドレス<span class="required">必須</span></label></dt>
              <dd><input name="" required="required" id="" type="text" class="entry-input"></dd>
            </dl>
            <dl>
              <dt><label>メールアドレス（確認用）<span class="required">必須</span></label></dt>
              <dd><input name="" required="required" id="" type="text" class="entry-input"></dd>
            </dl>
          </div>
        </div>
        <div class="formcat">
          <h2 class="tl">インボイス</h2>
          <dl>
            <dt><label>事業者<span class="required">必須</span></label></dt>
            <dd>
              <div class="yoko"><input id="" role="radio" type="radio" name="事業者" value=""><span>適格請求書発行事業者</span></div>
              <div class="yoko"><input id="" role="radio" type="radio" name="事業者" value=""><span>免税事業者</span></div>
            </dd>
          </dl>
          <dl>
            <dt><label>登録番号<span class="required">必須</span></label></dt>
            <dd><input name="" required="required" id="" type="text" class="entry-input"></dd>
          </dl>
        </div>
        <div class="formcat">
            <h2 class="tl">銀行口座</h2>
            <dl>
              <dt><label>お振込先銀行名<span class="required">必須</span></label></dt>
              <dd><input name="" required="required" id="" type="text" class="entry-input"></dd>
            </dl>
            <dl>
              <dt><label>支店名<span class="required">必須</span></label></dt>
              <dd><input name="" required="required" id="" type="text" class="entry-input"></dd>
            </dl>
            <dl>
              <dt><label>口座種別<span class="required">必須</span></label></dt>
              <dd>
                <div class="yoko"><input id="" role="radio" type="radio" name="口座種別" value=""><span>普通</span></div>
                <div class="yoko"><input id="" role="radio" type="radio" name="口座種別" value=""><span>当座</span></div>
                <div class="yoko"><input id="" role="radio" type="radio" name="口座種別" value=""><span>貯蓄</span></div>
                <div class="yoko"><input id="" role="radio" type="radio" name="口座種別" value=""><span>その他</span></div>
              </dd>
            </dl>
            <dl>
              <dt><label>口座名<span class="required">必須</span></label></dt>
              <dd><input name="" required="required" id="" type="text" class="entry-input"></dd>
            </dl>
            <dl>
              <dt><label>口座番号<span class="required">必須</span></label></dt>
              <dd><input name="" required="required" id="" type="text" class="entry-input"></dd>
            </dl>
        </div>
        <div class="formcat">
          <div class="h-adr">
            <h2 class="tl">担当者情報</h2>
            <p>※ ご自宅の住所のご入力をお願いいたします。<br>（古物営業法上、ご担当者様のご自宅の連絡先が必要となります）</p>
            <dl>
              <dt><label>お名前<span class="required">必須</span></label></dt>
              <dd><input name="" required="required" id="" type="text" class="entry-input"></dd>
            </dl>
            <dl>
              <dt><label>お名前 カナ<span class="required">必須</span></label></dt>
              <dd><input name="" required="required" id="" type="text" class="entry-input"></dd>
            </dl>
            <dl>
              <dt><label>郵便番号<span class="required">必須</span></label></dt>
              <dd>
                <span class="p-country-name" style="display:none;">Japan</span>
                <input type="text" class="p-postal-code entry-input" size="8" maxlength="8">
              </dd>
            </dl>
            <dl>
              <dt><label>都道府県<span class="required">必須</span> <span class="notice">※郵便番号から自動入力</span></label></dt>
              <dd><input type="text" class="p-region entry-input"></dd>
            </dl>
            <dl>
              <dt>
                <label>市区町村<span class="required">必須</span>
                <span class="notice">※郵便番号から自動入力</span></label>
              </dt>
              <dd>
                <input type="text" class="p-locality p-street-address entry-input">
              </dd>
            </dl>
            <dl>
              <dt><label>番地以降<span class="required">必須</span></label></dt>
              <dd><input type="text" class="p-extended-address entry-input"></dd>
            </dl>
            <dl>
              <dt><label>建物名・フロア等</label></dt>
              <dd><input name="" required="" id="" type="text" class="entry-input"></dd>
            </dl>
            <dl>
              <dt><label>電話番号<span class="required">必須</span></label></dt>
              <dd><input name="" required="required" id="" type="text" class="entry-input"></dd>
            </dl>
            <dl>
              <dt><label>生年月日<span class="required">必須</span> <span class="notice">入力例：19900808</span></label></dt>
              <dd><input name="" required="required" id="" type="text" class="entry-input"></dd>
            </dl>
            <dl>
              <dt><label>職業<span class="required">必須</span></label></dt>
              <dd><input name="" required="required" id="" type="text" class="entry-input"></dd>
            </dl>
            <dl>
              <dt class="thin"><label>ご要望やご不明点がございましたらご記入ください</label></dt>
              <dd>
                  <textarea class="entry-input"></textarea>
              </dd>
            </dl>
            <div class="kiyaku">
              <input id="acd-check1" class="acd-check" type="checkbox">
              <label class="acd-label" for="acd-check1">中古端末買取利用規約</label>
              <div class="acd-content">
                <OBJECT DATA="terms.html"TYPE="text/plain" WIDTH="100%" HEIGHT="100%"></OBJECT>
              </div>
            </div>
            <p class="check_kiyaku">
              <input type="checkbox" value="" id="" name="">
              <label><span>規約に同意する</span></label>
            </p>
          </div>
        </div>
      </div>
    </form>
    <a href="/entry/step-two" class="button submit-button">入力内容の確認</a>
  </main>
@endsection
