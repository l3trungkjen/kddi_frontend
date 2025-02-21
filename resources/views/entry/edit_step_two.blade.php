@extends('layouts.app')

@section('breadcrumb')
  <ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="http://www.mobile-ct.co.jp/" target="_blank">ホーム</a></li>
    {{-- <li class="breadcrumb-item"><a href="/login">KDDIデモ機買取施策</a></li> --}}
    <li class="breadcrumb-item"><a href="/base">TOP</a></li>
    <li class="breadcrumb-item">お客様情報登録</li>
  </ul>
@endsection

@section('breadcrumb2')
  <ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="http://www.mobile-ct.co.jp/" target="_blank">ホーム</a></li>
    {{-- <li class="breadcrumb-item"><a href="/login">KDDIご紹介者様ページ</a></li> --}}
    <li class="breadcrumb-item"><a href="/base">TOP</a></li>
    <li class="breadcrumb-item">お客様情報登録</li>
  </ul>
@endsection

@section('content')
  <main>
    <h1 class="heading-level-1">お客様情報登録</h1>
    <div class="step">
        <img src="{{ asset('images/step01.png') }}">
    </div>
    <form method="POST" id="entry_step_one" action="/entry/edit-step-two-submit">
      @csrf
      <input type="hidden" name="id" value="{{ $member['$id']['value'] }}" />
      <div class="formarea">
        <div class="formcat">
          <div class="h-adr">
            <h2 class="tl">法人情報</h2>
            <dl>
              <dt><label>法人名</label></dt>
              <dd><input name="company_name" required="required" id="company_name" type="text" class="entry-input" disabled value="{{ $member['法人名']['value'] }}"></dd>
            </dl>
            <dl>
              <dt><label>法人名 カナ</label></dt>
              <dd><input name="company_name_kana" required="required" id="company_name_kana" type="text" class="entry-input" disabled value="{{ $member['法人名カナ']['value'] }}"></dd>
            </dl>
            <dl>
              <dt><label>郵便番号</label><span class="required">変更可</span> </dt>
              <dd>
                <span class="p-country-name" style="display:none;">Japan</span>
                <input type="text" class="p-postal-code entry-input" name="post_code" id="post_code" size="8" maxlength="8" value="{{ $entry->post_code }}">
              </dd>
            </dl>
            <dl>
              <dt><label>都道府県 <span class="required">変更可</span><span class="notice">※郵便番号から自動入力</span></label></dt>
              <dd><input type="text" class="p-region entry-input" name="prefectures" id="prefectures" value="{{ $entry->prefectures }}" readonly></dd>
            </dl>
            <dl>
              <dt><label>市区町村 <span class="required">変更可</span><span class="notice">※郵便番号から自動入力</span></label></dt>
              <dd><input type="text" class="p-locality p-street-address entry-input" name="municipalities" id="municipalities" value="{{ $entry->municipalities }}" readonly></dd>
            </dl>
            <dl>
              <dt><label>番地以降<span class="required">変更可</span></label></dt>
              <dd><input type="text" class="p-extended-address entry-input" name="street" id="street" value="{{ $entry->street }}" readonly></dd>
            </dl>
            <dl>
              <dt><label>建物名・フロア等<span class="required">変更可</span></label></dt>
              <dd><input type="text" class="entry-input" name="building_name" id="building_name" value="{{ $entry->building_name }}" readonly></dd>
            </dl>
            <dl>
              <dt><label>担当部署<span class="required">変更可</span></label></dt>
              <dd><input required="required" type="text" class="entry-input" name="department" id="department" value="{{ $entry->department }}" readonly></dd>
            </dl>
            <dl>
              <dt><label>電話番号<span class="required">変更可</span></label></dt>
              <dd><input required="required" type="text" class="entry-input" name="telephone" id="telephone" value="{{ $entry->telephone }}" readonly></dd>
            </dl>
            <dl>
              <dt><label>メールアドレス<span class="required">変更可</span></label></dt>
              <dd><input required="required" type="text" class="entry-input" name="email" id="email" value="{{ $entry->email }}" readonly></dd>
            </dl>
            <dl>
              <dt><label>メールアドレス（確認用）</label></dt>
              <dd><input required="required" type="text" class="entry-input" name="confirm_email" id="confirm_email" value="{{ $entry->confirm_email }}" readonly></dd>
            </dl>
          </div>
        </div>
        <div class="formcat">
          <div class="h-adr">
            <h2 class="tl">担当者情報</h2>
            {{-- <p>※ ご自宅の住所のご入力をお願いいたします。<br>（古物営業法上、ご担当者様のご自宅の連絡先が必要となります）</p> --}}
            <dl>
              <dt><label>お名前</label></dt>
              <dd><input required="required" type="text" class="entry-input" name="contact_name" id="contact_name" disabled value="{{ $member['個人氏名']['value'] }}"></dd>
            </dl>
            <dl>
              <dt><label>お名前 カナ</label></dt>
              <dd><input required="required" type="text" class="entry-input" name="contact_name_kana" id="contact_name_kana" disabled value="{{ $member['個人フリガナ']['value'] }}"></dd>
            </dl>
            <dl>
              <dt><label>郵便番号</label></dt>
              <dd>
                <span class="p-country-name" style="display:none;">Japan</span>
                <input type="text" class="p-postal-code entry-input" size="8" maxlength="8" name="contact_post_code" id="contact_post_code" disabled value="{{ $member['個人郵便番号']['value'] }}">
              </dd>
            </dl>
            <dl>
              <dt><label>都道府県 <span class="notice">※郵便番号から自動入力</span></label></dt>
              <dd><input type="text" class="p-region entry-input" name="contact_prefectures" id="contact_prefectures" disabled value="{{ $member['法人住所1']['value'] }}"></dd>
            </dl>
            <dl>
              <dt>
                <label>市区町村
                <span class="notice">※郵便番号から自動入力</span></label>
              </dt>
              <dd>
                <input type="text" class="p-locality p-street-address entry-input" name="contact_municipalities" id="contact_municipalities" disabled value="{{ $member['法人住所2']['value'] }}">
              </dd>
            </dl>
            <dl>
              <dt><label>番地以降</label></dt>
              <dd><input type="text" class="p-extended-address entry-input" name="contact_street" id="contact_street" disabled value="{{ $member['法人住所3']['value'] }}"></dd>
            </dl>
            <dl>
              <dt><label>建物名・フロア等</label></dt>
              <dd><input type="text" class="entry-input" name="contact_building_name" id="contact_building_name" disabled value="{{ $member['法人住所4']['value'] }}"></dd>
            </dl>
            <dl>
              <dt><label>電話番号<span class="required">変更可</span></label></dt>
              <dd><input required="required" type="text" class="entry-input" name="contact_telephone" id="contact_telephone" value="{{ $entry->contact_telephone }}" readonly></dd>
            </dl>
            <dl>
              <dt><label>生年月日 <span class="notice">入力例：19900808</span></label></dt>
              <dd><input required="required" type="text" class="entry-input" name="contact_birthday" id="contact_birthday" disabled value="{{ $member['個人生年月日']['value'] }}"></dd>
            </dl>
            <dl>
              <dt><label>職業</label></dt>
              <dd><input required="required" type="text" class="entry-input" name="contact_occupation" id="contact_occupation" disabled value="{{ $member['個人職業']['value'] }}"></dd>
            </dl>
            {{-- <dl>
              <dt class="thin"><label>ご要望やご不明点がございましたらご記入ください</label></dt>
              <dd>
                  <textarea class="entry-input" name="contact_question" id="contact_question"></textarea>
              </dd>
            </dl> --}}
            {{-- <div class="kiyaku">
              <input id="acd-check1" class="acd-check" type="checkbox">
              <label class="acd-label" for="acd-check1">中古端末買取利用規約</label>
              <div class="acd-content">
                <OBJECT DATA="{{ asset('pdf/terms.html') }}" TYPE="text/plain" WIDTH="100%" HEIGHT="100%"></OBJECT>
              </div>
            </div>
            <div class="icon_other">
            <a href="{{ asset('pdf/中古端末買取り利用規約.pdf') }}" target="_blank">中古端末買取利用規約（PDF）</a>
            </div>
            <p class="check_kiyaku">
              <input type="checkbox" name="agree_terms" id="agree_terms" value="1">
              <label><span>規約に同意する</span></label>
            </p> --}}
            <p>
              上記項目以外の変更が必要となる場合には、下記メールアドレスまでご連絡をお願いいたします。<br><br>
              モバイルケアテクノロジーズ株式会社<br>
              担当：井上・山下<br>
              Email: kddi_demo@mobile-ct.com
            </p>
          </div>
        </div>
      </div>
      {{-- href="/entry/step-two" --}}
      <button class="button submit-button" type="submit">入力内容の確認</button>
    </form>
  </main>
@endsection

@section('script')
  <script>
    $(function() {
      $("#entry_step_one").validate({
        rules: {
          // company_name: {
          //   required: true,
          // },
          // company_name_kana: {
          //   required: true,
          // },
          post_code: {
            required: true,
            digits: true,
          },
          prefectures: {
            required: true,
          },
          municipalities: {
            required: true,
          },
          street: {
            required: true,
          },
          department: {
            required: true,
          },
          telephone: {
            required: true,
            digits: true,
          },
          email: {
            required: true,
            email: true,
          },
          confirm_email: {
            required: true,
            email: true,
            equalTo: '#email',
          },
          /////////
          // business: {
          //   required: true,
          // },
          // registration_number: {
          //   required: true,
          // },
          //////////
          // bank_name: {
          //   required: true,
          // },
          // branch_name: {
          //   required: true,
          // },
          // account_type: {
          //   required: true,
          // },
          // account_name: {
          //   required: true,
          // },
          // account_number: {
          //   required: true,
          //   digits: true,
          // },
          ///////////
          // contact_name: {
          //   required: true,
          // },
          // contact_name_kana: {
          //   required: true,
          // },
          // contact_post_code: {
          //   required: true,
          //   digits: true,
          // },
          // contact_prefectures: {
          //   required: true,
          // },
          // contact_municipalities: {
          //   required: true,
          // },
          // contact_street: {
          //   required: true,
          // },
          contact_telephone: {
            required: true,
            digits: true,
          },
          // contact_birthday: {
          //   required: true,
          // },
          // contact_occupation: {
          //   required: true,
          // },
          // agree_terms: {
          //   required: true,
          // },
        },
        messages: {
          company_name: {
            required: "[法人名]を入力してください。",
          },
          company_name_kana: {
            required: "[法人名 カナ]を入力してください。",
          },
          post_code: {
            required: "[郵便番号]を入力してください。",
            digits: "[郵便番号]数字を入力してください。",
          },
          prefectures: {
            required: "[都道府県]を入力してください。",
          },
          municipalities: {
            required: "[市区町村]を入力してください。",
          },
          street: {
            required: "[番地以降]を入力してください。",
          },
          department: {
            required: "[担当部署]を入力してください。",
          },
          telephone: {
            required: "[電話番号]を入力してください。",
            digits: "[電話番号]数字を入力してください。",
          },
          email: {
            required: "[メールアドレス]を入力してください。",
            email: "有効なメールアドレスを入力してください。",
          },
          confirm_email: {
            required: "[メールアドレス（確認用）]を入力してください。",
            email: "有効なメールアドレスを入力してください。",
            equalTo: "確認メールが一致しません",
          },
          /////////
          business: {
            required: "[事業者]を入力してください。",
          },
          registration_number: {
            required: "[登録番号]を入力してください。",
          },
          //////////
          bank_name: {
            required: "[お振込先銀行名]を入力してください。",
          },
          branch_name: {
            required: "[支店名]を入力してください。",
          },
          account_type: {
            required: "[口座種別]を入力してください。",
          },
          account_name: {
            required: "[口座名]を入力してください。",
          },
          account_number: {
            required: "[口座番号]を入力してください。",
            digits: "[口座番号]数字を入力してください。",
          },
          ///////////
          contact_name: {
            required: "[お名前]を入力してください。",
          },
          contact_name_kana: {
            required: "[お名前 カナ]を入力してください。",
          },
          contact_post_code: {
            required: "[郵便番号]を入力してください。",
            digits: "[郵便番号]数字を入力してください。",
          },
          contact_prefectures: {
            required: "[都道府県]を入力してください。",
          },
          contact_municipalities: {
            required: "[市区町村]を入力してください。",
          },
          contact_street: {
            required: "[番地以降]を入力してください。",
          },
          contact_telephone: {
            required: "[電話番号]を入力してください。",
            digits: "[電話番号]数字を入力してください。",
          },
          contact_birthday: {
            required: "[生年月日]を入力してください。",
          },
          contact_occupation: {
            required: "[職業]を入力してください。",
          },
        },
        errorPlacement: function(error, element)
        {
          if (element.is(":radio"))
          {
            error.appendTo(element.parents('.radio'));
          }
          else
          {
            error.insertAfter(element);
          }
        },
        submitHandler: function (form) {
          form.submit();
        },
      });
    });
  </script>
@endsection
