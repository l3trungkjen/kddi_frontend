@extends('layouts.app')

@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="http://www.mobile-ct.co.jp/" target="_blank">ホーム</a></li>
        <li class="breadcrumb-item"><a href="01_login.html">KDDIデモ機買取施策</a></li>
        <li class="breadcrumb-item"><a href="04_base.html">個別TOP</a></li>
        <li class="breadcrumb-item">買取お申込み</li>
    </ul>
@endsection

@section('breadcrumb2')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="http://www.mobile-ct.co.jp/" target="_blank">ホーム</a></li>
        <li class="breadcrumb-item"><a href="01_login.html">KDDIデモ機買取施策</a></li>
        <li class="breadcrumb-item"><a href="04_base.html">個別TOP</a></li>
        <li class="breadcrumb-item">買取お申込み</li>
    </ul>
@endsection

@section('content')
    <main>
        <h1 class="heading-level-1">買取お申込み</h1>

        <div class="">
            <img src="{{ asset('images/step01.png') }}">
        </div>

        <div class="formarea">
            <div class="formcat">
                <div class="h-adr">
                    <h2 class="tl">買取キット発送先</h2>
                    <p><input type="checkbox" value="" id=""
                            name="">　<label>複数箇所の場合はチェックを入れてください</label></p>

                    <dl>
                        <dt><label>発送先</label></dt>
                        <dd>
                            <div class="yoko"><input id="" role="radio" type="radio" name="発送先"
                                    value=""><span>法人情報と同じ</span></div>
                            <div class="yoko"><input id="" role="radio" type="radio" name="発送先"
                                    value=""><span>法人情報と異なる</span></div>
                        </dd>
                    </dl>

                    <dl>
                        <dt><label>法人名<span class="required">必須</span></label></dt>
                        <dd><input name="" required="required" id="" type="text" class="entry-input">
                        </dd>
                    </dl>

                    <dl>
                        <dt><label>法人名 カナ<span class="required">必須</span></label></dt>
                        <dd><input name="" required="required" id="" type="text" class="entry-input">
                        </dd>
                    </dl>

                    <dl>
                        <dt><label>郵便番号<span class="required">必須</span></label></dt>
                        <dd><span class="p-country-name" style="display:none;">Japan</span>
                            <input type="text" class="p-postal-code entry-input" size="8" maxlength="8">
                        </dd>
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
                        <dd><input name="" required="required" id="" type="text" class="entry-input">
                        </dd>
                    </dl>

                    <dl>
                        <dt><label>電話番号<span class="required">必須</span></label></dt>
                        <dd><input name="" required="required" id="" type="text" class="entry-input">
                        </dd>
                    </dl>

                    <dl>
                        <dt><label>お名前<span class="required">必須</span></label></dt>
                        <dd><input name="" required="required" id="" type="text" class="entry-input">
                        </dd>
                    </dl>

                </div>
            </div>

            <div class="formcat">
                <h2 class="tl">買取機種情報</h2>
                <p>※ 台数はおおよそで構いません<br>４機種以上ある場合は通信欄にご記入ください</p>
                <dl>
                    <dt><label>機種名1／台数<span class="required">必須</span></label></dt>
                    <dd><input name="" required="required" id="" type="text"
                            class="entry-input_m"><span class="Ksp">／</span><input name="" required="required"
                            id="" type="text" class="entry-input_s">台</dd>
                </dl>

                <dl>
                    <dt><label>機種名2／台数</label></dt>
                    <dd><input name="" required="required" id="" type="text"
                            class="entry-input_m"><span class="Ksp">／</span><input name="" required="required"
                            id="" type="text" class="entry-input_s">台</dd>
                </dl>

                <dl>
                    <dt><label>機種名3／台数</label></dt>
                    <dd><input name="" required="required" id="" type="text"
                            class="entry-input_m"><span class="Ksp">／</span><input name="" required="required"
                            id="" type="text" class="entry-input_s">台</dd>
                </dl>

                <dl>
                    <dt class="thin"><label>通信欄</label></dt>
                    <dd>
                        <textarea class="entry-input"></textarea>
                    </dd>
                </dl>

            </div>

        </div>
        <a href="/purchase/step-two" class="button submit-button">入力内容の確認</a>
    </main>
@endsection
