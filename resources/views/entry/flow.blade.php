@extends('layouts.app')

@section('breadcrumb')
  <ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="/" target="_blank">ホーム</a></li>
    {{-- <li class="breadcrumb-item"><a href="/login">KDDIご紹介者様ページ</a></li> --}}
    <li class="breadcrumb-item"><a href="/base">TOP</a></li>
    <li class="breadcrumb-item">お客様情報登録の流れ</li>
  </ul>
@endsection

@section('breadcrumb2')
  <ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="/" target="_blank">ホーム</a></li>
    {{-- <li class="breadcrumb-item"><a href="/login">KDDIご紹介者様ページ</a></li> --}}
    <li class="breadcrumb-item"><a href="/base">TOP</a></li>
    <li class="breadcrumb-item">お客様情報登録の流れ</li>
  </ul>
@endsection

@section('content')
  <main>
    <h1 class="heading-level-1">お客様情報登録の流れ</h1>

    <a href="/entry/step-one" class="button submit-button">初回登録はこちら</a>

    <div class="flow">
      <h2 class="tl">必要情報のご入力、お申込み</h2>
      <div class="flow_detail">
      <div class="flow_ph"><img src="{{ asset('images/flow01.jpg') }}"></div>
      <div class="flow_pt"><p>
        @if (isset($user))
          <a href="/entry/step-one">お申込みフォーム</a>
        @endif
        に必要情報を入力し、お申込みください。必要な情報を送信いただくと、受付完了メールをお送りいたします。
      </p>
      </div>
      </div>
        <div class="flow_arrow">
        <img src="{{ asset('images/arrow_bottom.png') }}">
      </div>
      <h2 class="tl">本人限定受取郵便にて<br>買取申込受付票の受領</h2>
      <div class="flow_detail">
      <div class="flow_ph"><img src="{{ asset('images/flow02.jpg') }}"></div>
      <div class="flow_pt"><p>法人情報欄にご入力いただいた会社住所宛に、「買取申込受付票」を<span class="attention">本人限定受取郵便にてお送りいたします。</span><br>
      本人限定受取郵便が郵便局に届いたことを通知する、案内はがきが届きます。<br>
      案内はがきが届きましたら、担当郵便局にご連絡していただき、<span class="attention">必ずご本様がお受け取りください。</span><br><br>
      ※郵便物に記載された名あて人または差出人が指定した代理人一人に限り、郵便物をお渡しします。<br>
      （詳細は下記リンクにてご確認ください。）<br></p>

      <div class="icon_other">
      <a href="https://www.post.japanpost.jp/service/fuka_service/honnin/" target="_blank">本人限定受取について（日本郵便サイト）</a>
      </div>
      </div>
      </div>
      <div class="flow_arrow">
        <img src="{{ asset('images/arrow_bottom.png') }}">
      </div>
      <h2 class="tl">買取申込受付票のご記入・ご返送</h2>
      <div class="flow_detail">
      <div class="flow_ph"><img src="{{ asset('images/flow08.jpg') }}"></div>
      <div class="flow_pt">
      <p>買取申込受付票に必要事項をご記入いただき、ご担当者様の本人確認書類とともに、下記あて先までメールにてお送りください。</p>
      <div class="flow_waku1">
      <h3>買取申込受付票 返送先</h3>
      <p>モバイルケアテクノロジーズ（株）<br>
      KDDIデモ機買取担当窓口<br>
      <a href="mailto:kddi_demo@mobile-ct.com" class="icon_mail">kddi_demo@mobile-ct.com</a></p>
      </div>
      <div class="flow_waku2">
      <h3>本人確認書類について</h3>
      <p><span class="attention">ご担当者様の名刺または社員証のPDFをご用意ください</span></p>
      </div>
      </div>
      </div>
      <div class="flow_arrow">
        <img src="{{ asset('images/arrow_bottom.png') }}">
      </div>
      <div class="fin">
        <p>お客様登録完了になります</p>
      </div>
    </div>
    @if (isset($user))
      <a href="/entry/step-one" class="button submit-button">初回登録はこちら</a>
    @endif
    <div class="corp">
      <h3>会社情報</h3>
      <table>
        <tbody>
          <tr>
            <th>商号</th>
            <td>
              モバイルケアテクノロジーズ株式会社 <br> 英文表記： Mobile Care Technologies Co., Ltd.
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
            <td>・中古端末の買取・販売・輸出など<br>・モバイル端末に関わるアフターサポート事業</td>
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
