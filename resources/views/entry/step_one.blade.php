@extends('layouts.app')

@section('breadcrumb')
  <ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="/" target="_blank">ホーム</a></li>
    {{-- <li class="breadcrumb-item"><a href="/login">KDDIご紹介者様ページ</a></li> --}}
    <li class="breadcrumb-item"><a href="/base">TOP</a></li>
    <li class="breadcrumb-item">お客様情報登録</li>
  </ul>
  <div class="logout" bis_skin_checked="1">
    <a href="/auth/logout">ログアウト</a>
  </div>
@endsection

@section('breadcrumb2')
  <ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="/" target="_blank">ホーム</a></li>
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
    <form method="POST" id="entry_step_one" action="/entry/step-one-submit2">
      @csrf
      <div class="formarea">
        <div class="formcat">
          <div class="h-adr">
            <h2 class="tl">法人情報</h2>
            <dl>
              <dt><label>法人名<span class="required">必須</span></label></dt>
              <dd><input name="company_name" required="required" id="company_name" type="text" class="entry-input"></dd>
            </dl>
            <dl>
              <dt><label>法人名 カナ<span class="required">必須</span></label></dt>
              <dd><input name="company_name_kana" required="required" id="company_name_kana" type="text" class="entry-input"></dd>
            </dl>
            <dl>
              <dt><label>郵便番号<span class="required">必須</span></label></dt>
              <dd>
                <span class="p-country-name" style="display:none;">Japan</span>
                <input type="text" class="p-postal-code entry-input" name="post_code" id="post_code" size="8" maxlength="8">
              </dd>
            </dl>
            <dl>
              <dt><label>都道府県<span class="required">必須</span> <span class="notice">※郵便番号から自動入力</span></label></dt>
              <dd><input type="text" class="p-region entry-input" name="prefectures" id="prefectures"></dd>
            </dl>
            <dl>
              <dt><label>市区町村<span class="required">必須</span> <span class="notice">※郵便番号から自動入力</span></label></dt>
              <dd><input type="text" class="p-locality entry-input" name="municipalities" id="municipalities"></dd>
            </dl>
            <dl>
              <dt><label>番地以降<span class="required">必須</span></label></dt>
              <dd><input type="text" class="p-street-address entry-input" name="street" id="street"></dd>
            </dl>
            <dl>
              <dt><label>建物名・フロア等</label></dt>
              <dd><input type="text" class="entry-input" name="building_name" id="building_name"></dd>
            </dl>
            <dl>
              <dt><label>担当部署<span class="required">必須</span></label></dt>
              <dd><input required="required" type="text" class="entry-input" name="department" id="department"></dd>
            </dl>
            <dl>
              <dt><label>電話番号<span class="required">必須</span></label></dt>
              <dd><input required="required" type="text" class="entry-input" name="telephone" id="telephone" size="13" maxlength="13"></dd>
            </dl>
            <dl>
              <dt><label>メールアドレス<span class="required">必須</span></label></dt>
              <dd><input required="required" type="text" class="entry-input" name="email" id="email"></dd>
            </dl>
            <dl>
              <dt><label>メールアドレス（確認用）<span class="required">必須</span></label></dt>
              <dd><input required="required" type="text" class="entry-input" name="confirm_email" id="confirm_email"></dd>
            </dl>
          </div>
        </div>
        <div class="formcat">
          <h2 class="tl">インボイス</h2>
          <dl>
            <dt><label>事業者<span class="required">必須</span></label></dt>
            <dd class="radio">
              <div class="yoko">
                <input role="radio" type="radio" name="business" value="適格請求書発行事業者"><span>適格請求書発行事業者</span>
              </div>
              <div class="yoko">
                <input role="radio" type="radio" name="business" value="免税事業者"><span>免税事業者</span>
              </div>
            </dd>
          </dl>
          <dl id="registration_number_container">
            <dt><label>登録番号<span class="required">必須</span></label></dt>
            <dd><input required="required" type="text" class="entry-input" name="registration_number" id="registration_number"></dd>
          </dl>
        </div>
        <div class="formcat">
            <h2 class="tl">銀行口座</h2>
            <dl>
              <dt><label>お振込先銀行名<span class="required">必須</span></label></dt>
              <dd><input required="required" type="text" class="entry-input" name="bank_name" id="bank_name"></dd>
            </dl>
            <dl>
              <dt><label>支店名<span class="required">必須</span></label></dt>
              <dd><input required="required" type="text" class="entry-input" name="branch_name" id="branch_name"></dd>
            </dl>
            <dl>
              <dt><label>口座種別<span class="required">必須</span></label></dt>
              <dd class="radio">
                <div class="yoko"><input role="radio" type="radio" name="account_type" value="普通"><span>普通</span></div>
                <div class="yoko"><input role="radio" type="radio" name="account_type" value="当座"><span>当座</span></div>
                <div class="yoko"><input role="radio" type="radio" name="account_type" value="貯蓄"><span>貯蓄</span></div>
                <div class="yoko"><input role="radio" type="radio" name="account_type" value="その他"><span>その他</span></div>
              </dd>
            </dl>
            <dl>
              <dt><label>口座名<span class="required">必須</span></label></dt>
              <dd><input required="required" type="text" class="entry-input" name="account_name" id="account_name"></dd>
            </dl>
            <dl>
              <dt><label>口座番号<span class="required">必須</span></label></dt>
              <dd><input required="required" type="text" class="entry-input" name="account_number" id="account_number"></dd>
            </dl>
        </div>
        <div class="formcat">
          <div class="h-adr">
            <h2 class="tl">担当者情報</h2>
            <p>※ ご自宅の住所のご入力をお願いいたします。<br>（古物営業法上、ご担当者様のご自宅の連絡先が必要となります）</p>
            <dl>
              <dt><label>お名前<span class="required">必須</span></label></dt>
              <dd><input required="required" type="text" class="entry-input" name="contact_name" id="contact_name"></dd>
            </dl>
            <dl>
              <dt><label>お名前 カナ<span class="required">必須</span></label></dt>
              <dd><input required="required" type="text" class="entry-input" name="contact_name_kana" id="contact_name_kana"></dd>
            </dl>
            <dl>
              <dt><label>郵便番号<span class="required">必須</span></label></dt>
              <dd>
                <span class="p-country-name" style="display:none;">Japan</span>
                <input type="text" class="p-postal-code entry-input" size="8" maxlength="8" name="contact_post_code" id="contact_post_code">
              </dd>
            </dl>
            <dl>
              <dt><label>都道府県<span class="required">必須</span> <span class="notice">※郵便番号から自動入力</span></label></dt>
              <dd><input type="text" class="p-region entry-input" name="contact_prefectures" id="contact_prefectures"></dd>
            </dl>
            <dl>
              <dt>
                <label>市区町村<span class="required">必須</span>
                <span class="notice">※郵便番号から自動入力</span></label>
              </dt>
              <dd>
                <input type="text" class="p-locality entry-input" name="contact_municipalities" id="contact_municipalities">
              </dd>
            </dl>
            <dl>
              <dt><label>番地以降<span class="required">必須</span></label></dt>
              <dd><input type="text" class="p-street-address entry-input" name="contact_street" id="contact_street"></dd>
            </dl>
            <dl>
              <dt><label>建物名・フロア等</label></dt>
              <dd><input type="text" class="entry-input" name="contact_building_name" id="contact_building_name"></dd>
            </dl>
            <dl>
              <dt><label>電話番号<span class="required">必須</span></label></dt>
              <dd><input required="required" type="text" class="entry-input" name="contact_telephone" id="contact_telephone"></dd>
            </dl>
            <dl>
              <dt><label>生年月日<span class="required">必須</span> <span class="notice">入力例：19900808</span></label></dt>
              <dd><input required="required" type="text" class="entry-input" name="contact_birthday" id="contact_birthday"></dd>
            </dl>
            <dl>
              <dt><label>職業<span class="required">必須</span></label></dt>
              <dd>
                {{-- <input required="required" type="text" class="entry-input" name="contact_occupation" id="contact_occupation"> --}}
                <select name="contact_occupation" id="contact_occupation" required="required" class="entry-input">
                  <option value="会社員">会社員</option>
                  <option value="公務員">公務員</option>
                  <option value="自営業">自営業</option>
                  <option value="契約・派遣">契約・派遣</option>
                  <option value="学生">学生</option>
                  <option value="アルバイト">アルバイト</option>
                  <option value="その他">その他</option>
                </select>
              </dd>
            </dl>
            <dl>
              <dt class="thin"><label>ご要望やご不明点がございましたらご記入ください</label></dt>
              <dd>
                  <textarea class="entry-input" name="contact_question" id="contact_question"></textarea>
              </dd>
            </dl>
            <div class="kiyaku">
              <input id="acd-check1" class="acd-check" type="checkbox">
              <label class="acd-label" for="acd-check1">中古端末買取利用規約</label>
              <div class="acd-content">
                <OBJECT DATA="{{ env('APP_ENV') == 'production' ? secure_asset('pdf/terms.html') : asset('pdf/terms.html') }}" TYPE="text/plain" WIDTH="100%" HEIGHT="100%"></OBJECT>
              </div>
            </div>
            <div class="icon_other">
            <a href="{{ env('APP_ENV') == 'production' ? secure_asset('pdf/中古端末買取り利用規約.pdf') : asset('pdf/中古端末買取り利用規約.pdf') }}" target="_blank">中古端末買取利用規約（PDF）</a>
            </div>
            <p class="check_kiyaku">
              <input type="checkbox" name="agree_terms" id="agree_terms" value="1">
              <label><span>規約に同意する</span></label>
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
  <script src="https://yubinbango.github.io/yubinbango/yubinbango.js" charset="UTF-8"></script>
  <script>
    $(function() {
      $("#entry_step_one").validate({
        rules: {
          company_name: {
            required: true,
          },
          company_name_kana: {
            required: true,
          },
          post_code: {
            required: true,
            // digits: true,
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
            // digits: true,
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
          business: {
            required: true,
          },
          registration_number: {
            required: true,
          },
          //////////
          bank_name: {
            required: true,
          },
          branch_name: {
            required: true,
          },
          account_type: {
            required: true,
          },
          account_name: {
            required: true,
          },
          account_number: {
            required: true,
            digits: true,
          },
          ///////////
          contact_name: {
            required: true,
          },
          contact_name_kana: {
            required: true,
          },
          contact_post_code: {
            required: true,
            // digits: true,
          },
          contact_prefectures: {
            required: true,
          },
          contact_municipalities: {
            required: true,
          },
          contact_street: {
            required: true,
          },
          contact_telephone: {
            required: true,
            // digits: true,
          },
          contact_birthday: {
            required: true,
          },
          contact_occupation: {
            required: true,
          },
          agree_terms: {
            required: true,
          },
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
            // digits: "[郵便番号]数字を入力してください。",
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
            // digits: "[電話番号]数字を入力してください。",
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
            // digits: "[郵便番号]数字を入力してください。",
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
            // digits: "[電話番号]数字を入力してください。",
          },
          contact_birthday: {
            required: "[生年月日]を入力してください。",
          },
          contact_occupation: {
            required: "[職業]を入力してください。",
          },
          agree_terms: {
            required: "[規約に同意する]を入力してください。",
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

      $('input[type=radio][name=business]').change(function() {
        if (this.value == '適格請求書発行事業者') {
            $('#registration_number_container').show()
        } else if (this.value == '免税事業者') {
            $('#registration_number_container').hide()
        }
      });

      $('#post_code, #contact_post_code').on('input', function () {
        let value = $(this).val().replace(/\D/g, '');
        if (value.length > 3) {
            value = value.slice(0, 3) + '-' + value.slice(3, 7);
        }
        $(this).val(value);
      });

      $('#telephone, #contact_telephone').on('input', function () {
        let value = $(this).val().replace(/\D/g, '');
        if (value.length > 3 && value.length <= 7) {
          value = value.slice(0, 3) + '-' + value.slice(3);
        } else if (value.length > 7) {
          value = value.slice(0, 3) + '-' + value.slice(3, 7) + '-' + value.slice(7, 11);
        }
        $(this).val(value);
      });

      $('#company_name_kana').on('input', function () {
        let value = $(this).val();
        let isKatakana = /^[\u30A0-\u30FF]+$/.test(value);

        if (!isKatakana && value.length > 0) {
          if (!$('#company_name_kana').next('.error').length) {
            $('#company_name_kana').after('<label class="error">[全角カタカナ］を入力してください。</label>');
          }
        } else {
          $('#company_name_kana').next('.error').remove('');
        }
      });

      $('#contact_name_kana').on('input', function () {
        let value = $(this).val();
        let isKatakana = /^[\u30A0-\u30FF]+$/.test(value);

        if (!isKatakana && value.length > 0) {
          if (!$('#contact_name_kana').next('.error').length) {
            $('#contact_name_kana').after('<label class="error">[全角カタカナ］を入力してください。</label>');
          }
        } else {
          $('#contact_name_kana').next('.error').remove('');
        }
      });

      // function isZenkakuKana(s) {
      //   return !!s.match(/^[ァ-ヶー　]*$/);  // 「　」は全角スペースです.
      // }
    });
  </script>
@endsection
