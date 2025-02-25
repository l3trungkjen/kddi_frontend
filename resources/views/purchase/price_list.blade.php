@extends('layouts.app')

@section('breadcrumb')
  <ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="http://www.mobile-ct.co.jp/" target="_blank">ホーム</a></li>
    {{-- <li class="breadcrumb-item"><a href="01_login.html">KDDI店頭デモ機買取ご紹介ページ</a></li> --}}
    <li class="breadcrumb-item"><a href="/base">基本ページ</a></li>
    <li class="breadcrumb-item">買取価格</li>
  </ul>
@endsection

@section('breadcrumb2')
  <ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="http://www.mobile-ct.co.jp/" target="_blank">ホーム</a></li>
    {{-- <li class="breadcrumb-item"><a href="01_login.html">KDDIデモ機買取施策</a></li> --}}
    <li class="breadcrumb-item"><a href="/base">基本ページ</a></li>
    <li class="breadcrumb-item">買取価格</li>
  </ul>
@endsection

@section('content')
  <main>
    <h1 class="heading-level-1">買取価格</h1>
    <div class="guidebox">
        <p>{{ $currentDate }}時点の買取価格になります</p>
    </div>
    <p class="noticeB">
        ※{{ $nextMonth }}端末着荷分まで適用されます。<br>
        <span class="attention">※ 記載のない端末についても買取可能です。</span><br>
        ※ 不明点がある場合、<a href="mailto:kddi_demo@mobile-ct.com">こちら</a>までお問い合わせください。<br>
        ※ ランク基準は<a href="" data-toggle="modal" data-target="#modal1">こちら</a>をご参照ください
    </p>
    <div class="maker">
        <h3>カテゴリーから探す</h3>
        <select id="selectBox" onchange="showContent({{ $purchaseId }})">
            <option value="" selected="" disabled>カテゴリーを選択</option>
            <option value="iPhone">Apple（iPhone）</option>
            <option value="iPad">Apple（iPad）</option>
            <option value="Android smartphones/tablets">Android smartphones/tablets</option>
            <option value="4G LTE mobile phone">4G LTE mobile phone</option>
            {{-- <option value="Essential">Essential</option>
            <option value="FCNT">FCNT</option>
            <option value="Google">Google</option>
            <option value="HTC">HTC</option>
            <option value="HUAWEI">HUAWEI</option>
            <option value="Kyocera">Kyocera</option>
            <option value="Leica">Leica</option>
            <option value="LG">LG</option>
            <option value="Motorola">Motorola</option>
            <option value="ONKYO">ONKYO</option>
            <option value="OPPO">OPPO</option>
            <option value="Rakuten Mobile">Rakuten Mobile</option>
            <option value="Samsung">Samsung</option>
            <option value="SHARP">SHARP</option>
            <option value="SONY">SONY</option>
            <option value="Xiaomi">Xiaomi</option>
            <option value="ZTE">ZTE</option> --}}
        </select>
    </div>
    <div class="pricelist">
        <div id="category_list" class="content" style="display:none;">
            <table id="table_categories">
                <thead>
                    <tr>
                        <th rowspan="2" class="prod">製品</th>
                        <th rowspan="2" class="vol">容量</th>
                        <th colspan="4">下取り価格目安<br><span>（ランク基準は<a href="" data-toggle="modal" data-target="#modal1">こちら</a>）</span></th>
                    </tr>
                    <tr>
                        <th class="rank">A</th>
                        <th class="rank">B</th>
                        <th class="rank">C</th>
                        <th class="rank">J</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
                <thead>
                    <tr>
                        <th rowspan="2" class="prod">製品</th>
                        <th rowspan="2" class="vol">容量</th>
                        <th class="rank">A</th>
                        <th class="rank">B</th>
                        <th class="rank">C</th>
                        <th class="rank">J</th>
                    </tr>
                    <tr>
                        <th colspan="4">下取り価格目安<br><span>（ランク基準は<a href="" data-toggle="modal"
                                    data-target="#modal1">こちら</a>）</span></th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <a href="/purchase/step-one" class="button submit-button">買取申込はこちら</a>
  </main>
  <div id="#Modal">
  <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="label1" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <div class="modal-content">
  <div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
  </button>
  </div>
  <div class="modal-body">
  <div class="model">
  <h3>ランク基準</h3>
  <div class="rank">
  <h4>Aランク</h4>
  <p>
  ・機能に異常無し<br>
  ・傷等ほぼ無し
  </p>
  </div>
  <div class="rank">
  <h4>Bランク</h4>
  <p>
  ・機能に異常無し<br>
  ・液晶・タッチパネルの破損・浮き無し（傷はある場合有り）<br>
  ・使用上問題のない程度の軽度の傷、打痕・塗装剥がれ等有り
  </p>
  </div>
  <div class="rank">
  <h4>Cランク</h4>
  <p>
  ・機能に異常無し
  ・液晶・タッチパネルの破損・浮き無し（傷はある場合有り）<br>
  ・動作に問題がない程度の大きな傷・ヒビ・欠け等有り
  </p>
  </div>
  <div class="rank">
  <h4>Jランク</h4>
  <p>
  下記いずれかの異常有り<br>
  ・一部機能に異常有り<br>
  ・液晶・タッチパネルの破損・浮き有り<br>
  ・動作に問題が出るレベルの大きな傷・ヒビ・欠け・変形等有り<br>
  ・電源が入らない、充電不可、電池膨張等の使用不可端末
  </p>
  </div>
  </div>
  </div>
  </div>
  </div>
  </div>
  </div>

@endsection

@section('script')
    <script src="{{ env('APP_ENV') == 'production' ? secure_asset('js/bootstrap-4.0.0.js') : asset('js/bootstrap-4.0.0.js') }}"></script>
    <script src="{{ env('APP_ENV') == 'production' ? secure_asset('js/maker.js') : asset('js/maker.js') }}"></script>
@endsection
