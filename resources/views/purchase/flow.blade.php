@extends('layouts.app')

@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="http://www.mobile-ct.co.jp/" target="_blank">ホーム</a></li>
        <li class="breadcrumb-item"><a href="01_login.html">KDDIデモ機買取施策</a></li>
        <li class="breadcrumb-item"><a href="02_base.html">TOP</a></li>
        <li class="breadcrumb-item">買取申込の流れ</li>
    </ul>
@endsection

@section('breadcrumb2')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="http://www.mobile-ct.co.jp/" target="_blank">ホーム</a></li>
        <li class="breadcrumb-item"><a href="01_login.html">KDDIデモ機買取施策</a></li>
        <li class="breadcrumb-item"><a href="02_base.html">TOP</a></li>
        <li class="breadcrumb-item">買取申込の流れ</li>
    </ul>
@endsection

@section('content')
    <main>
        <h1 class="heading-level-1">買取申込の流れ</h1>

        <a href="/purchase" class="button submit-button">買取申込はこちら</a>


        <div class="flow">

            <h2 class="tl">必要情報のご入力、お申込み</h2>
            <div class="flow_ph">
              <img src="{{ asset('images/flow01.jpg') }}">
            </div>
            <p><a href="/purchase">端末買取専用のお申込みフォーム</a>に必要情報を入力し、お申込みください。必要な情報を送信いただくと、受付完了メールをお送りいたします。</p>

            <div class="flow_arrow"><img src="{{ asset('images/arrow_bottom.png') }}"></div>

            <h2 class="tl">買取キットの受取り</h2>
            <div class="flow_ph"><img src="{{ asset('images/none.png') }}"></div>
            <p>お売りいただく端末を発送するための、買取キット一式をお客様宛てに送付いたします。<br>
                買取キット発送先に複数をご指定いただいた場合は、ご通知いただいた各発送先にお送りいたします。</p>

            <div class="flow_waku1">
                <h3>買取キット 内容</h3>
                <p>鍵付発送箱／送付明細書／着払い伝票
                    <img src="{{ asset('images/flow03.jpg') }}">
                    <br>
                    <img src="{{ asset('images/flow04.jpg') }}">
                    <br>
                    <img src="{{ asset('images/flow05.jpg') }}">
                </p>
            </div>

            <div class="flow_arrow"><img src="{{ asset('images/arrow_bottom.jpg') }}"></div>

            <h2 class="tl">データ初期化</h2>
            <div class="flow_ph"><img src="{{ asset('images/flow06.jpg') }}"></div>
            <p>お売りいただく端末の初期化など、発送準備をお願いいたします。</p>

            <div class="flow_waku3">
                <h3>ご準備いただく内容</h3>
                <dl>
                    <dt>データの削除</dt>
                    <dd>スマートフォンの初期化機能を使用し、オールリセット可能な場合は実施をお願いいたします。
                        <span class="attention">GoogleアカウントやApple IDを登録されている場合は、その解除もお願いいたします</span>
                    </dd>
                    <dt>ICアプリの削除</dt>
                    <dd>
                        おサイフケータイのクレジット機能を持つアプリの初期化をお願いいたします。
                    </dd>
                    <dt>ロック制限の解除</dt>
                    <dd>
                        <span class="attention">暗証番号、指紋認証の解除</span>をお願いいたします。
                    </dd>
                    <dt>SIMカードの取り出し</dt>
                    <dd>
                        SIMカードの取り出しをお願いいたします。
                    </dd>
                    <dt>外部メモリの取り出し</dt>
                    <dd>
                        microSDカードなど、外部メモリの取り出しをお願いいたします。
                    </dd>
                    <dt>アクセサリーの取り外し</dt>
                    <dd>
                        盗難防止装置やストラップ、カバー等取り外してください。
                    </dd>
                    <dt>利用制限の解除</dt>
                    <dd>
                        ネットワーク利用制限中の端末はお売りいただけません。
                    </dd>
                </dl>
            </div>

            <div class="flow_arrow"><img src="{{ asset('images/arrow_bottom.png') }}"></div>

            <h2 class="tl">買取キットへ梱包・発送</h2>
            <div class="flow_ph"><img src="{{ asset('images/none.png') }}"></div>
            <p>買取キットにお売りいただく携帯端末、送付明細票を同梱してください。
                梱包方法、送付明細票のご記入については、<a href="" target="_blank">「発送手順詳細」</a>をご覧ください。<br>
                梱包が完了しましたら、日本郵便に集荷依頼し、発送をお願いいたします。</p>

            <div class="icon_pdf">
                <p><a href="" target="_blank">発送手順詳細（PDF）</a></p>
            </div>

            <div class="flow_waku4">
                <h3>集荷依頼先</h3>
                <div class="icon_tel">
                    <p>ゆうパック集荷専用電話番号（無料）<br>
                        <span class="tel">0800-0800-111</span>
                    </p>
                </div>
            </div>

            <div class="flow_arrow"><img src="{{ asset('images/arrow_bottom.png') }}"></div>

            <h2 class="tl">見積り結果の受領・承諾</h2>
            <div class="flow_ph"><img src="{{ asset('images/none.png') }}"></div>
            <p>お売りいただく全ての端末が到着しましたら、受け取り確認・台数確認のメールをお送りいたします。<br>
                お申込いただいた内容とお送りいただいた端末の確認が取れましたら、弊社で査定し、見積り結果メールをお送りいたします。<br><br>
                ※お申込みいただいた台数と到着台数に相違があるなど、お申込み内容との相違がある場合には別途ご連絡いたします。<br><br>
                お見積りをご確認いただき、ご承諾いただけましたら、メールにてご承諾のご連絡をお願いいたします。</p>

            <div class="flow_arrow"><img src="{{ asset('images/arrow_bottom.png') }}"></div>

            <h2 class="tl">データ消去作業完了証明書の受取</h2>
            <div class="flow_ph"><img src="{{ asset('images/none.png') }}"></div>
            <p>データ消去が完了次第、データ消去作業完了証明書をメールにてお送りいたします。</p>

            <div class="flow_arrow"><img src="{{ asset('images/arrow_bottom.png') }}"></div>


            <h2 class="tl">破砕処理作業完了証明書の受取<br>（リサイクル端末のみ）</h2>
            <div class="flow_ph"><img src="{{ asset('images/none.png') }}"></div>
            <p>リサイクルを行う端末は破砕し、破砕処理作業完了証明書をメールにてお送りします。<br><br>
                ※破砕処理作業完了証明書をお送りするまで、数ヶ月ほどお時間をいただきます。ご了承をお願いいたします。</p>

            <div class="flow_arrow"><img src="{{ asset('images/arrow_bottom.png') }}"></div>

            <div class="fin">
                <p>お売りいただきました端末は<br>国内外で再活用（リユース）や、<br>
                    資源化（リサイクル）させて頂きます。</p>
            </div>
        </div>

        <a href="/purchase" class="button submit-button">買取申込はこちら</a>


        <div class="corp">
            <h3>会社情報</h3>
            <table>
                <tbody>
                    <tr>
                        <th>商号</th>
                        <td>
                            モバイルケアテクノロジーズ株式会社
                            <br> 英文表記： Mobile Care Technologies Co., Ltd.
                        </td>
                    </tr>
                    <tr>
                        <th>所在地</th>
                        <td>
                            神奈川県横浜市都筑区池辺町4388<br>（港北住倉ビルディング）
                        </td>
                    </tr>
                    <tr>
                        <th>資本金</th>
                        <td>
                            300,050,000円
                        </td>
                    </tr>
                    <tr>
                        <th>設立日</th>
                        <td>2015年3月2日</td>
                    </tr>
                    <tr>
                        <th>事業内容</th>
                        <td>・中古端末の買取・販売・輸出など<br>
                            ・モバイル端末に関わるアフターサポート事業</td>
                    </tr>
                    <tr>
                        <th>従業員数</th>
                        <td>62名（2024年４月1日現在）</td>
                    </tr>
                </tbody>
            </table>
        </div>

    </main>
@endsection
