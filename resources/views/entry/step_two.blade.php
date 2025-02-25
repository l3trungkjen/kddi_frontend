@extends('layouts.app')

@section('breadcrumb')
  <ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="http://www.mobile-ct.co.jp/" target="_blank">ホーム</a></li>
    {{-- <li class="breadcrumb-item"><a href="01_login.html">KDDIご紹介者様ページ</a></li> --}}
    <li class="breadcrumb-item"><a href="/base">TOP</a></li>
    <li class="breadcrumb-item">お客様情報登録：入力内容の確認</li>
  </ul>
@endsection

@section('breadcrumb2')
  <ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="http://www.mobile-ct.co.jp/" target="_blank">ホーム</a></li>
    {{-- <li class="breadcrumb-item"><a href="01_login.html">KDDIご紹介者様ページ</a></li> --}}
    <li class="breadcrumb-item"><a href="/base">TOP</a></li>
    <li class="breadcrumb-item">お客様情報登録：入力内容の確認</li>
  </ul>
@endsection

@section('content')
  <main>
    <h1 class="heading-level-1">お客様情報登録</h1>
    <div class="step">
      <img src="{{ asset('images/step02.png') }}">
    </div>
    <form method="POST" id="entry_step_two" action="/entry/step-two-submit">
      @csrf
      <div class="formarea">
        <div class="formcat">
          <div class="h-adr">
            <h2 class="tl">法人情報</h2>
            <dl>
              <dt><label>法人名<span class="required">必須</span></label></dt>
              <dd><input name="company_name" required="required" id="company_name" type="text" class="entry-input" value="{{ $entry->company_name }}" readonly></dd>
            </dl>
            <dl>
              <dt><label>法人名 カナ<span class="required">必須</span></label></dt>
              <dd><input name="company_name_kana" required="required" id="company_name_kana" type="text" class="entry-input" value="{{ $entry->company_name_kana }}" readonly></dd>
            </dl>
            <dl>
              <dt><label>郵便番号<span class="required">必須</span></label></dt>
              <dd>
                <span class="p-country-name" style="display:none;">Japan</span>
                <input type="text" class="p-postal-code entry-input" name="post_code" id="post_code" size="8" maxlength="8" value="{{ $entry->post_code }}" readonly>
              </dd>
            </dl>
            <dl>
              <dt><label>都道府県<span class="required">必須</span> <span class="notice">※郵便番号から自動入力</span></label></dt>
              <dd><input type="text" class="p-region entry-input" name="prefectures" id="prefectures" value="{{ $entry->prefectures }}"></dd>
            </dl>
            <dl>
              <dt><label>市区町村<span class="required">必須</span> <span class="notice">※郵便番号から自動入力</span></label></dt>
              <dd><input type="text" class="p-locality p-street-address entry-input" name="municipalities" id="municipalities" value="{{ $entry->municipalities }}" readonly></dd>
            </dl>
            <dl>
              <dt><label>番地以降<span class="required">必須</span></label></dt>
              <dd><input type="text" class="p-extended-address entry-input" name="street" id="street" value="{{ $entry->street }}" readonly></dd>
            </dl>
            <dl>
              <dt><label>建物名・フロア等</label></dt>
              <dd><input type="text" class="entry-input" name="building_name" id="building_name" value="{{ $entry->building_name }}" readonly></dd>
            </dl>
            <dl>
              <dt><label>担当部署<span class="required">必須</span></label></dt>
              <dd><input required="required" type="text" class="entry-input" name="department" id="department" value="{{ $entry->department }}" readonly></dd>
            </dl>
            <dl>
              <dt><label>電話番号<span class="required">必須</span></label></dt>
              <dd><input required="required" type="text" class="entry-input" name="telephone" id="telephone" value="{{ $entry->telephone }}" readonly></dd>
            </dl>
            <dl>
              <dt><label>メールアドレス<span class="required">必須</span></label></dt>
              <dd><input required="required" type="text" class="entry-input" name="email" id="email" value="{{ $entry->email }}" readonly></dd>
            </dl>
            <dl>
              <dt><label>メールアドレス（確認用）<span class="required">必須</span></label></dt>
              <dd><input required="required" type="text" class="entry-input" name="confirm_email" id="confirm_email" value="{{ $entry->confirm_email }}" readonly></dd>
            </dl>
          </div>
        </div>
        <div class="formcat">
          <h2 class="tl">インボイス</h2>
          <dl>
            <dt><label>事業者<span class="required">必須</span></label></dt>
            <dd class="radio">
              <div class="yoko"><input role="radio" type="radio" name="business" value="適格請求書発行事業者" {{ $entry->business == "適格請求書発行事業者" ? 'checked' : '' }} readonly onclick="return false;" onkeydown="return false;"><span>適格請求書発行事業者</span></div>
              <div class="yoko"><input role="radio" type="radio" name="business" value="免税事業者" {{ $entry->business == "免税事業者" ? 'checked' : '' }} readonly onclick="return false;" onkeydown="return false;"><span>免税事業者</span></div>
            </dd>
          </dl>
          @if ($entry->business == "適格請求書発行事業者")
            <dl>
              <dt><label>登録番号<span class="required">必須</span></label></dt>
              <dd><input required="required" type="text" class="entry-input" name="registration_number" id="registration_number" value="{{ $entry->registration_number }}" readonly></dd>
            </dl>
          @endif
        </div>
        <div class="formcat">
            <h2 class="tl">銀行口座</h2>
            <dl>
              <dt><label>お振込先銀行名<span class="required">必須</span></label></dt>
              <dd><input required="required" type="text" class="entry-input" name="bank_name" id="bank_name" value="{{ $entry->bank_name }}" readonly></dd>
            </dl>
            <dl>
              <dt><label>支店名<span class="required">必須</span></label></dt>
              <dd><input required="required" type="text" class="entry-input" name="branch_name" id="branch_name" value="{{ $entry->branch_name }}" readonly></dd>
            </dl>
            <dl>
              <dt><label>口座種別<span class="required">必須</span></label></dt>
              <dd class="radio">
                <div class="yoko"><input role="radio" type="radio" name="account_type" value="普通" {{ $entry->account_type == "普通" ? 'checked' : '' }} readonly onclick="return false;" onkeydown="return false;"><span>普通</span></div>
                <div class="yoko"><input role="radio" type="radio" name="account_type" value="当座" {{ $entry->account_type == "当座" ? 'checked' : '' }} readonly onclick="return false;" onkeydown="return false;"><span>当座</span></div>
                <div class="yoko"><input role="radio" type="radio" name="account_type" value="貯蓄" {{ $entry->account_type == "貯蓄" ? 'checked' : '' }} readonly onclick="return false;" onkeydown="return false;"><span>貯蓄</span></div>
                <div class="yoko"><input role="radio" type="radio" name="account_type" value="その他" {{ $entry->account_type == "その他" ? 'checked' : '' }} readonly onclick="return false;" onkeydown="return false;"><span>その他</span></div>
              </dd>
            </dl>
            <dl>
              <dt><label>口座名<span class="required">必須</span></label></dt>
              <dd><input required="required" type="text" class="entry-input" name="account_name" id="account_name" value="{{ $entry->account_name }}" readonly></dd>
            </dl>
            <dl>
              <dt><label>口座番号<span class="required">必須</span></label></dt>
              <dd><input required="required" type="text" class="entry-input" name="account_number" id="account_number" value="{{ $entry->account_number }}" readonly></dd>
            </dl>
        </div>
        <div class="formcat">
          <div class="h-adr">
            <h2 class="tl">担当者情報</h2>
            <p>※ ご自宅の住所のご入力をお願いいたします。<br>（古物営業法上、ご担当者様のご自宅の連絡先が必要となります）</p>
            <dl>
              <dt><label>お名前<span class="required">必須</span></label></dt>
              <dd><input required="required" type="text" class="entry-input" name="contact_name" id="contact_name" value="{{ $entry->contact_name }}" readonly></dd>
            </dl>
            <dl>
              <dt><label>お名前 カナ<span class="required">必須</span></label></dt>
              <dd><input required="required" type="text" class="entry-input" name="contact_name_kana" id="contact_name_kana" value="{{ $entry->contact_name_kana }}" readonly></dd>
            </dl>
            <dl>
              <dt><label>郵便番号<span class="required">必須</span></label></dt>
              <dd>
                <span class="p-country-name" style="display:none;">Japan</span>
                <input type="text" class="p-postal-code entry-input" size="8" maxlength="8" name="contact_post_code" id="contact_post_code" value="{{ $entry->contact_post_code }}" readonly>
              </dd>
            </dl>
            <dl>
              <dt><label>都道府県<span class="required">必須</span> <span class="notice">※郵便番号から自動入力</span></label></dt>
              <dd><input type="text" class="p-region entry-input" name="contact_prefectures" id="contact_prefectures" value="{{ $entry->contact_prefectures }}" readonly></dd>
            </dl>
            <dl>
              <dt>
                <label>市区町村<span class="required">必須</span>
                <span class="notice">※郵便番号から自動入力</span></label>
              </dt>
              <dd>
                <input type="text" class="p-locality p-street-address entry-input" name="contact_municipalities" id="contact_municipalities" value="{{ $entry->contact_municipalities }}" readonly>
              </dd>
            </dl>
            <dl>
              <dt><label>番地以降<span class="required">必須</span></label></dt>
              <dd><input type="text" class="p-extended-address entry-input" name="contact_street" id="contact_street" value="{{ $entry->contact_street }}" readonly></dd>
            </dl>
            <dl>
              <dt><label>建物名・フロア等</label></dt>
              <dd><input type="text" class="entry-input" name="contact_building_name" id="contact_building_name" value="{{ $entry->contact_building_name }}" readonly></dd>
            </dl>
            <dl>
              <dt><label>電話番号<span class="required">必須</span></label></dt>
              <dd><input required="required" type="text" class="entry-input" name="contact_telephone" id="contact_telephone" value="{{ $entry->contact_telephone }}" readonly></dd>
            </dl>
            <dl>
              <dt><label>生年月日<span class="required">必須</span> <span class="notice">入力例：19900808</span></label></dt>
              <dd><input required="required" type="text" class="entry-input" name="contact_birthday" id="contact_birthday" value="{{ $entry->contact_birthday }}" readonly></dd>
            </dl>
            <dl>
              <dt><label>職業<span class="required">必須</span></label></dt>
              <dd><input required="required" type="text" class="entry-input" name="contact_occupation" id="contact_occupation" value="{{ $entry->contact_occupation }}" readonly></dd>
            </dl>
            <dl>
              <dt class="thin"><label>ご要望やご不明点がございましたらご記入ください</label></dt>
              <dd>
                  <textarea class="entry-input" name="contact_question" id="contact_question" readonly>{{ $entry->contact_question }}</textarea>
              </dd>
            </dl>
            <div class="kiyaku">
              <input id="acd-check1" class="acd-check" type="checkbox">
              <label class="acd-label" for="acd-check1">中古端末買取利用規約</label>
              <div class="acd-content">
                <OBJECT DATA="{{ asset('pdf/中古端末買取り利用規約.pdf') }}" TYPE="text/plain" WIDTH="100%" HEIGHT="100%"></OBJECT>
              </div>
            </div>

            <div class="icon_other">
            <a href="{{ asset('pdf/中古端末買取り利用規約.pdf') }}" target="_blank">中古端末買取利用規約（PDF）</a>
            </div>

            <p class="check_kiyaku">
              <input type="checkbox" name="agree_terms" id="agree_terms" value="1" {{ $entry->agree_terms ? 'checked' : '' }} readonly onclick="return false;" onkeydown="return false;">
              <label><span>規約に同意する</span></label>
            </p>
          </div>
        </div>
      </div>
      {{-- href="/entry/step-two" --}}
      <button class="button submit-button" type="submit">送信</button>
    </form>
    {{-- <a href="/entry/step-three" class="button submit-button">送信</a> --}}
  </main>
@endsection
