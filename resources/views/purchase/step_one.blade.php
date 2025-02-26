@extends('layouts.app')

@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="http://www.mobile-ct.co.jp/" target="_blank">ホーム</a></li>
        {{-- <li class="breadcrumb-item"><a href="01_login.html">KDDIご紹介者様ページ</a></li> --}}
        @if (isset($user))
            <li class="breadcrumb-item"><a href="/base">個別TOP</a></li>
        @else
            <li class="breadcrumb-item"><a href="/base">TOP</a></li>
        @endif
        <li class="breadcrumb-item">買取お申込み</li>
    </ul>
    <div class="logout" bis_skin_checked="1">
        <a href="/auth/logout">ログアウト</a>
    </div>
@endsection

@section('breadcrumb2')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="http://www.mobile-ct.co.jp/" target="_blank">ホーム</a></li>
        {{-- <li class="breadcrumb-item"><a href="01_login.html">KDDIご紹介者様ページ</a></li> --}}
        @if (isset($user))
            <li class="breadcrumb-item"><a href="/base">個別TOP</a></li>
        @else
            <li class="breadcrumb-item"><a href="/base">TOP</a></li>
        @endif
        <li class="breadcrumb-item">買取お申込み</li>
    </ul>
@endsection

@section('content')
    <main>
        <h1 class="heading-level-1">買取お申込み</h1>

        <div class="step">
            <img src="{{ asset('images/step01.png') }}">
        </div>
        <form method="POST" id="purchase_step_one" action="/purchase/step-one-submit">
            @csrf
            <div class="formarea">
                <div class="formcat">
                    <div class="h-adr">
                        <h2 class="tl">買取キット発送先</h2>
                        <div class="flow_waku1">
                        <h3><div class="chec">  <input type="checkbox" value="1" id="more_address" name="more_address">　<span><label>複数箇所の場合はチェックを入れてください。</label></span></div>
                        </h3>
                        <p>※ 発送先が複数箇所ある場合はこちらにチェックを入れていただき、「買取キット配送先リスト」を<a href="mailto:kddi_demo@mobile-ct.com">kddi_demo@mobile-ct.com</a>へメールでお送りください。</p>
                        <div class="icon_xls">
                        <a href="{{ env('APP_ENV') == 'production' ? secure_asset('pdf/買取キット配送先リスト.xlsx') : asset('pdf/買取キット配送先リスト.xlsx') }}" target="_blank" download>買取キット配送先リスト.xlsx（ダウンロード）</a>
                        </div>
                        </div>

                        <div id="information">
                            @if (isset($member))
                                <dl>
                                    <dt><label>発送先</label></dt>
                                    <dd>
                                        <div class="yoko"><input id="" role="radio" type="radio" name="choose_input_information" value="法人情報と同じ"><span>法人情報と同じ</span></div>
                                        <div class="yoko"><input id="" role="radio" type="radio" name="choose_input_information" value="法人情報と異なる"><span>法人情報と異なる</span></div>
                                    </dd>
                                </dl>
                            @endif

                            <div id="infor_member">
                                <dl>
                                    <dt><label>法人名<span class="required">必須</span></label></dt>
                                    <dd>
                                        <input name="company_name" id="company_name" type="text" class="entry-input" required="required">
                                    </dd>
                                </dl>

                                <dl>
                                    <dt><label>法人名 カナ<span class="required">必須</span></label></dt>
                                    <dd>
                                        <input name="company_name_kana" id="company_name_kana" type="text" class="entry-input" required="required">
                                    </dd>
                                </dl>

                                <dl>
                                    <dt><label>郵便番号<span class="required">必須</span></label></dt>
                                    <dd>
                                        <span class="p-country-name" style="display:none;">Japan</span>
                                        <input type="text" name="post_code" id="post_code" class="p-postal-code entry-input" size="8" maxlength="8">
                                    </dd>
                                </dl>

                                <dl>
                                    <dt><label>都道府県<span class="required">必須</span> <span class="notice">※郵便番号から自動入力</span></label></dt>
                                    <dd><input type="text" class="p-region entry-input" name="prefectures" id="prefectures"></dd>
                                </dl>


                                <dl>
                                    <dt><label>市区町村<span class="required">必須</span> <span class="notice">※郵便番号から自動入力</span></label></dt>
                                    <dd><input type="text" name="municipalities" id="municipalities" class="p-locality entry-input"></dd>
                                </dl>

                                <dl>
                                    <dt><label>番地以降<span class="required">必須</span></label></dt>
                                    <dd><input type="text" name="street_address" id="street_address" class="p-street-address entry-input"></dd>
                                </dl>

                                <dl>
                                    <dt><label>建物名・フロア等</label></dt>
                                    <dd><input name="building_name" id="building_name" type="text" class="entry-input"></dd>
                                </dl>

                                <dl>
                                    <dt><label>担当部署<span class="required">必須</span></label></dt>
                                    <dd><input name="department_name" id="department_name" type="text" class="entry-input">
                                    </dd>
                                </dl>

                                <dl>
                                    <dt><label>電話番号<span class="required">必須</span></label></dt>
                                    <dd><input name="telephone" id="telephone" type="text" class="entry-input">
                                    </dd>
                                </dl>

                                <dl>
                                    <dt><label>お名前<span class="required">必須</span></label></dt>
                                    <dd><input name="contact_name" id="contact_name" type="text" class="entry-input">
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="formcat">
                    <h2 class="tl">買取機種情報</h2>
                    <div class="flow_waku1">
                    <p>※ 台数はおおよそで構いません。<br>※ ４機種以上ある場合は通信欄にその旨ご記入いただき、「発送端末リスト」を<a href="mailto:kddi_demo@mobile-ct.com">kddi_demo@mobile-ct.com</a>へメールでお送りください。</p>
                    <div class="icon_xls">
                    <a href="{{ env('APP_ENV') == 'production' ? secure_asset('pdf/発送端末リスト.xlsx') : asset('pdf/発送端末リスト.xlsx') }}" target="_blank" download>発送端末リスト.xlsx（ダウンロード）</a>
                    </div>
                    </div>
                    <dl>
                        <dt><label>機種名1／台数<span class="required">必須</span></label></dt>
                        <dd>
                            <input name="model_name_1" id="model_name_1" type="text" class="entry-input_m">
                            <span class="Ksp">／</span>
                            <input name="number_units_1" id="number_units_1" type="text" class="entry-input_s">台
                        </dd>
                    </dl>

                    <dl>
                        <dt><label>機種名2／台数</label></dt>
                        <dd>
                            <input name="model_name_2" id="model_name_2" type="text" class="entry-input_m">
                            <span class="Ksp">／</span>
                            <input name="number_units_2" id="number_units_2" type="text" class="entry-input_s">台
                        </dd>
                    </dl>

                    <dl>
                        <dt><label>機種名3／台数</label></dt>
                        <dd>
                            <input name="number_name_3" id="number_name_3" type="text" class="entry-input_m">
                            <span class="Ksp">／</span>
                            <input name="number_units_3" id="number_units_3" type="text" class="entry-input_s">台
                        </dd>
                    </dl>

                    <dl>
                        <dt class="thin"><label>通信欄</label></dt>
                        <dd>
                            <textarea name="message" id="message" class="entry-input"></textarea>
                        </dd>
                    </dl>

                </div>

            </div>
            <button class="button submit-button">入力内容の確認</button>
        </form>
    </main>
@endsection

@section('script')
    <script src="https://yubinbango.github.io/yubinbango/yubinbango.js" charset="UTF-8"></script>
    <script>
        $(function() {
            $.validator.addMethod("checkLength", function(value, element) {
                return value.length === 12 || value.length === 13;
            }, "The string must be exactly 12 or 13 characters long.");

            $.validator.addMethod("containsDash", function(value, element) {
                return value.includes("-");
            }, "String must contain at least one '-' character.");

            $("#purchase_step_one").validate({
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
                    street_address: {
                        required: true,
                    },
                    department_name: {
                        required: true,
                    },
                    telephone: {
                        required: true,
                        checkLength: true,
                        containsDash: true,
                    },
                    contact_name: {
                        required: true,
                    },
                    model_name_1: {
                        required: true,
                    },
                    number_units_1: {
                        required: true,
                        digits: true,
                    },
                    number_units_2: {
                        digits: true,
                    },
                    number_units_3: {
                        digits: true,
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
                    street_address: {
                        required: "[番地以降]を入力してください。",
                    },
                    department_name: {
                        required: "[担当部署]を入力してください。",
                    },
                    telephone: {
                        required: "[電話番号]を入力してください。",
                        // digits: "[電話番号]数字を入力してください。",
                        checkLength: "［電話番号必須］は半角数字、ハイフンを入れ12文字か13文字で入力してください。",
                        containsDash: "［電話番号必須］は半角数字、ハイフンを入れ12文字か13文字で入力してください。",
                    },
                    model_name_1: {
                        required: "[機種名1]を入力してください。",
                    },
                    number_units_1: {
                        required: "[台数]を入力してください。",
                        digits: "[台数]数字を入力してください。",
                    },
                    number_units_2: {
                        digits: "[台数]数字を入力してください。",
                    },
                    number_units_3: {
                        digits: "[台数]数字を入力してください。",
                    },
                    contact_name: {
                        required: "[お名前]を入力してください。",
                    }
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

            $("#more_address").change(function () {
                this.checked ? $('#information').hide() : $('#information').show()
            });

            $('input[type=radio][name=choose_input_information]').change(function() {
                if (this.value == '法人情報と同じ') {
                    $('#infor_member').hide()
                } else if (this.value == '法人情報と異なる') {
                    $('#infor_member').show()
                }
            });

            $('#post_code').on('input', function () {
                let value = $(this).val().replace(/\D/g, '');
                if (value.length > 3) {
                    value = value.slice(0, 3) + '-' + value.slice(3, 7);
                }
                $(this).val(value);
            });

            // $('#telephone').on('input', function () {
            //     let value = $(this).val().replace(/\D/g, '');
            //     if (value.length > 3 && value.length <= 7) {
            //     value = value.slice(0, 3) + '-' + value.slice(3);
            //     } else if (value.length > 7) {
            //     value = value.slice(0, 3) + '-' + value.slice(3, 7) + '-' + value.slice(7, 11);
            //     }
            //     $(this).val(value);
            // });

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
        });
    </script>
@endsection
