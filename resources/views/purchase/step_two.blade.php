@extends('layouts.app')

@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="http://www.mobile-ct.co.jp/" target="_blank">ホーム</a></li>
        {{-- <li class="breadcrumb-item"><a href="01_login.html">KDDIご紹介者様ページ</a></li> --}}
        <li class="breadcrumb-item"><a href="/base">基本ページ</a></li>
        <li class="breadcrumb-item">買取お申込み：入力内容の確認</li>
    </ul>
@endsection

@section('breadcrumb2')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="http://www.mobile-ct.co.jp/" target="_blank">ホーム</a></li>
        {{-- <li class="breadcrumb-item"><a href="01_login.html">KDDIデモ機買取施策</a></li> --}}
        <li class="breadcrumb-item"><a href="/base">基本ページ</a></li>
        <li class="breadcrumb-item">買取お申込み：入力内容の確認</li>
    </ul>
@endsection

@section('content')
<main>
    <h1 class="heading-level-1">買取お申込み</h1>

    <div class="step">
        <img src="{{ asset('images/step02.png') }}">
    </div>
    <form method="POST" id="purchase_step_two" action="/purchase/step-two-submit">
        @csrf
        <div class="formarea">
            <div class="formcat">
                <div class="h-adr">
                    <h2 class="tl">買取キット発送先</h2>
                    <div class="flow_waku1">
                    <h3><div class="chec">   <input type="checkbox" value="1" id="more_address" name="more_address" {{ isset($purchase->more_address) && $purchase->more_address ? 'checked' : '' }} readonly onclick="return false;" onkeydown="return false;">　　<span><label>複数箇所の場合はチェックを入れてください。</label></span></div>
                    </h3>
                    <p>※ 発送先が複数箇所ある場合は通信欄にこちらにチェックを入れていただき、「買取キット配送先リスト」を<a href="mailto:kddi_demo@mobile-ct.com">kddi_demo@mobile-ct.com</a>へメールでお送りください。</p>
                    <div class="icon_xls">
                    <a href="{{ asset('pdf/買取キット配送先リスト.xlsx') }}" target="_blank" download>買取キット配送先リスト.xlsx（ダウンロード）</a>
                    </div>
                    </div>

                    {{-- @php
                        dd($purchase->more_address);
                    @endphp --}}
                    @if (!isset($purchase->more_address))
                        <div id="information">
                            <dl>
                                <dt><label>発送先</label></dt>
                                <dd>
                                    <div class="yoko">
                                        <input id="" role="radio" type="radio" name="choose_input_information" value="法人情報と同じ" {{ isset($purchase->choose_input_information) && $purchase->choose_input_information == "法人情報と同じ" ? 'checked' : '' }} readonly onclick="return false;" onkeydown="return false;">
                                        <span>法人情報と同じ</span>
                                    </div>
                                    <div class="yoko">
                                        <input id="" role="radio" type="radio" name="choose_input_information" value="法人情報と異なる" {{ isset($purchase->choose_input_information) && $purchase->choose_input_information == "法人情報と異なる" ? 'checked' : '' }} readonly onclick="return false;" onkeydown="return false;">
                                        <span>法人情報と異なる</span>
                                    </div>
                                </dd>
                            </dl>

                            @if (!isset($purchase->choose_input_information) || (isset($purchase->choose_input_information) && $purchase->choose_input_information == "法人情報と異なる"))
                                <div id="infor_member">
                                    <dl>
                                        <dt><label>法人名<span class="required">必須</span></label></dt>
                                        <dd>
                                            <input name="company_name" id="company_name" type="text" class="entry-input" required="required" value="{{ $purchase->company_name }}" readonly>
                                        </dd>
                                    </dl>

                                    <dl>
                                        <dt><label>法人名 カナ<span class="required">必須</span></label></dt>
                                        <dd>
                                            <input name="company_name_kana" id="company_name_kana" type="text" class="entry-input" required="required" value="{{ $purchase->company_name_kana }}" readonly>
                                        </dd>
                                    </dl>

                                    <dl>
                                        <dt><label>郵便番号<span class="required">必須</span></label></dt>
                                        <dd>
                                            <input type="text" name="post_code" id="post_code" class="p-postal-code entry-input" size="8" maxlength="8" value="{{ $purchase->post_code }}" readonly>
                                        </dd>
                                    </dl>

                                    <dl>
                                        <dt><label>都道府県<span class="required">必須</span> <span class="notice">※郵便番号から自動入力</span></label></dt>
                                        <dd><input type="text" class="p-region entry-input" name="prefectures" id="prefectures" value="{{ $purchase->prefectures }}" readonly></dd>
                                    </dl>


                                    <dl>
                                        <dt><label>市区町村<span class="required">必須</span> <span class="notice">※郵便番号から自動入力</span></label></dt>
                                        <dd><input type="text" name="municipalities" id="municipalities" class="p-locality p-street-address entry-input" value="{{ $purchase->municipalities }}" readonly></dd>
                                    </dl>

                                    <dl>
                                        <dt><label>番地以降<span class="required">必須</span></label></dt>
                                        <dd><input type="text" name="street_address" id="street_address" class="p-extended-address entry-input" value="{{ $purchase->street_address }}" readonly></dd>
                                    </dl>

                                    <dl>
                                        <dt><label>建物名・フロア等</label></dt>
                                        <dd><input name="building_name" id="building_name" type="text" class="entry-input" value="{{ $purchase->building_name }}" readonly></dd>
                                    </dl>

                                    <dl>
                                        <dt><label>担当部署<span class="required">必須</span></label></dt>
                                        <dd><input name="department_name" id="department_name" type="text" class="entry-input" value="{{ $purchase->department_name }}" readonly>
                                        </dd>
                                    </dl>

                                    <dl>
                                        <dt><label>電話番号<span class="required">必須</span></label></dt>
                                        <dd><input name="telephone" id="telephone" type="text" class="entry-input" value="{{ $purchase->telephone }}" readonly>
                                        </dd>
                                    </dl>

                                    <dl>
                                        <dt><label>お名前<span class="required">必須</span></label></dt>
                                        <dd><input name="contact_name" id="contact_name" type="text" class="entry-input" value="{{ $purchase->contact_name }}" readonly>
                                        </dd>
                                    </dl>
                                </div>
                            @endif
                        </div>
                    @endif
                </div>
            </div>

            <div class="formcat">
                <h2 class="tl">買取機種情報</h2>
                <div class="flow_waku1">
                <p>※ 台数はおおよそで構いません。<br>※ ４機種以上ある場合は通信欄にその旨ご記入いただき、「発送端末リスト」を<a href="mailto:kddi_demo@mobile-ct.com">kddi_demo@mobile-ct.com</a>へメールでお送りください。</p>
                <div class="icon_xls">
                <a href="{{ asset('pdf/発送端末リスト.xlsx') }}" target="_blank" download>発送端末リスト.xlsx（ダウンロード）</a>
                </div>
                </div>
                <dl>
                    <dt><label>機種名1／台数<span class="required">必須</span></label></dt>
                    <dd>
                        <input name="model_name_1" id="model_name_1" type="text" class="entry-input_m" value="{{ $purchase->model_name_1 }}" readonly>
                        <span class="Ksp">／</span>
                        <input name="number_units_1" id="number_units_1" type="text" class="entry-input_s" value="{{ $purchase->number_units_1 }}" readonly>台
                    </dd>
                </dl>

                <dl>
                    <dt><label>機種名2／台数</label></dt>
                    <dd>
                        <input name="model_name_2" id="model_name_2" type="text" class="entry-input_m" value="{{ $purchase->model_name_2 }}" readonly>
                        <span class="Ksp">／</span>
                        <input name="number_units_2" id="number_units_2" type="text" class="entry-input_s" value="{{ $purchase->number_units_2 }}" readonly>台
                    </dd>
                </dl>

                <dl>
                    <dt><label>機種名3／台数</label></dt>
                    <dd>
                        <input name="number_name_3" id="number_name_3" type="text" class="entry-input_m" value="{{ $purchase->number_name_3 }}" readonly>
                        <span class="Ksp">／</span>
                        <input name="number_units_3" id="number_units_3" type="text" class="entry-input_s" value="{{ $purchase->number_units_3 }}" readonly>台
                    </dd>
                </dl>

                <dl>
                    <dt class="thin"><label>通信欄</label></dt>
                    <dd>
                        <textarea name="message" id="message" class="entry-input">{{ $purchase->message }}</textarea>
                    </dd>
                </dl>

            </div>

        </div>
        <button class="button submit-button">送信</button>
    </form>
</main>
@endsection
