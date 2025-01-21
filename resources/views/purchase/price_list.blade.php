@extends('layouts.app')

@section('breadcrumb')
  <ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="http://www.mobile-ct.co.jp/" target="_blank">ホーム</a></li>
    <li class="breadcrumb-item"><a href="01_login.html">KDDIデモ機買取施策</a></li>
    <li class="breadcrumb-item"><a href="04_base.html">個別TOP</a></li>
    <li class="breadcrumb-item">買取価格</li>
  </ul>
@endsection

@section('breadcrumb2')
  <ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="http://www.mobile-ct.co.jp/" target="_blank">ホーム</a></li>
    <li class="breadcrumb-item"><a href="01_login.html">KDDIデモ機買取施策</a></li>
    <li class="breadcrumb-item"><a href="04_base.html">個別TOP</a></li>
    <li class="breadcrumb-item">買取価格</li>
  </ul>
@endsection

@section('content')
  <main>
    <h1 class="heading-level-1">買取価格</h1>
    <div class="guidebox">
        <p>2024/9/17時点の買取価格になります</p>
    </div>
    <p class="noticeB">
        ※ 2024/10/16端末着荷分まで適用されます。<br>
        <span class="attention">※ 記載のない端末についても買取可能です。</span><br>
        ※ 不明点がある場合、<a href="mailto:kddi_demo@mobile-ct.com">こちら</a>までお問い合わせください。<br>
        ※ ランク基準は<a href="" data-toggle="modal" data-target="#modal1">こちら</a>を参照ください
    </p>
    <div class="maker">
        <h3>メーカーから探す</h3>
        <select id="selectBox" onchange="showContent()">
            <option value="" selected="" disabled>メーカーを選択</option>
            <option value="Apple（iPad）">Apple（iPad）</option>
            <option value="Apple（iPhone）">Apple（iPhone）</option>
            <option value="Apple（Watch）">Apple（Watch）</option>
            <option value="Essential">Essential</option>
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
            <option value="ZTE">ZTE</option>
        </select>
    </div>
    <div class="pricelist">
      <div id="Apple（iPad）" class="content" style="display:none;">
        <table>
            <thead>
                <tr>
                    <th rowspan="2" class="prod">製品</th>
                    <th rowspan="2" class="vol">容量</th>
                    <th colspan="4">下取り価格目安<br><span>（ランク基準は<a href="" data-toggle="modal"
                                data-target="#modal1">こちら</a>）</span></th>
                </tr>
                <tr>
                    <th class="rank">A</th>
                    <th class="rank">B</th>
                    <th class="rank">C</th>
                    <th class="rank">J</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>iPad Air（第3世代）10.5インチ</td>
                    <td>256GB</td>
                    <td class="price">32,800 円</td>
                    <td class="price">13,900 円</td>
                    <td class="price">13,900 円</td>
                    <td class="price">900 円</td>
                </tr>
                <tr>
                    <td>iPad Air（第3世代）10.5インチ</td>
                    <td>128GB</td>
                    <td class="price">28,900 円</td>
                    <td class="price">12,000 円</td>
                    <td class="price">12,000 円</td>
                    <td class="price">900 円</td>
                </tr>
                <tr>
                    <td>iPad Air（第3世代）10.5インチ</td>
                    <td>64GB</td>
                    <td class="price">25,500 円</td>
                    <td class="price">10,200 円</td>
                    <td class="price">10,200 円</td>
                    <td class="price">900 円</td>
                </tr>
                <tr>
                    <td>iPhone 12 mini</td>
                    <td>256GB</td>
                    <td class="price">32,800 円</td>
                    <td class="price">13,900 円</td>
                    <td class="price">13,900 円</td>
                    <td class="price">900 円</td>
                </tr>
                <tr>
                    <td>iPhone 12 mini</td>
                    <td>128GB</td>
                    <td class="price">28,900 円</td>
                    <td class="price">12,000 円</td>
                    <td class="price">12,000 円</td>
                    <td class="price">900 円</td>
                </tr>
                <tr>
                    <td>iPhone 12 mini</td>
                    <td>64GB</td>
                    <td class="price">25,500 円</td>
                    <td class="price">10,200 円</td>
                    <td class="price">10,200 円</td>
                    <td class="price">900 円</td>
                </tr>
                <tr>
                    <td>iPhone 12 Pro Max</td>
                    <td>256GB</td>
                    <td class="price">32,800 円</td>
                    <td class="price">13,900 円</td>
                    <td class="price">13,900 円</td>
                    <td class="price">900 円</td>
                </tr>
                <tr>
                    <td>iPhone 12 Pro Max</td>
                    <td>128GB</td>
                    <td class="price">28,900 円</td>
                    <td class="price">12,000 円</td>
                    <td class="price">12,000 円</td>
                    <td class="price">900 円</td>
                </tr>
                <tr>
                    <td>iPhone 12 Pro Max</td>
                    <td>64GB</td>
                    <td class="price">25,500 円</td>
                    <td class="price">10,200 円</td>
                    <td class="price">10,200 円</td>
                    <td class="price">900 円</td>
                </tr>
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

      <div id="Apple（iPhone）" class="content" style="display:none;">
        <table>
          <thead>
            <tr>
                <th rowspan="2" class="prod">製品</th>
                <th rowspan="2" class="vol">容量</th>
                <th colspan="4">下取り価格目安<br><span>（ランク基準は<a href="" data-toggle="modal"
                            data-target="#modal1">こちら</a>）</span></th>
            </tr>
            <tr>
                <th class="rank">A</th>
                <th class="rank">B</th>
                <th class="rank">C</th>
                <th class="rank">J</th>
            </tr>
          </thead>
          <tbody>
            <tr>
                <td>iPhone 12</td>
                <td>256GB</td>
                <td class="price">32,800 円</td>
                <td class="price">13,900 円</td>
                <td class="price">13,900 円</td>
                <td class="price">900 円</td>
            </tr>
            <tr>
                <td>iPhone 12</td>
                <td>128GB</td>
                <td class="price">28,900 円</td>
                <td class="price">12,000 円</td>
                <td class="price">12,000 円</td>
                <td class="price">900 円</td>
            </tr>
            <tr>
                <td>iPhone 12</td>
                <td>64GB</td>
                <td class="price">25,500 円</td>
                <td class="price">10,200 円</td>
                <td class="price">10,200 円</td>
                <td class="price">900 円</td>
            </tr>
            <tr>
                <td>iPhone 12 mini</td>
                <td>256GB</td>
                <td class="price">32,800 円</td>
                <td class="price">13,900 円</td>
                <td class="price">13,900 円</td>
                <td class="price">900 円</td>
            </tr>
            <tr>
                <td>iPhone 12 mini</td>
                <td>128GB</td>
                <td class="price">28,900 円</td>
                <td class="price">12,000 円</td>
                <td class="price">12,000 円</td>
                <td class="price">900 円</td>
            </tr>
            <tr>
                <td>iPhone 12 mini</td>
                <td>64GB</td>
                <td class="price">25,500 円</td>
                <td class="price">10,200 円</td>
                <td class="price">10,200 円</td>
                <td class="price">900 円</td>
            </tr>
            <tr>
                <td>iPhone 12 Pro Max</td>
                <td>256GB</td>
                <td class="price">32,800 円</td>
                <td class="price">13,900 円</td>
                <td class="price">13,900 円</td>
                <td class="price">900 円</td>
            </tr>
            <tr>
                <td>iPhone 12 Pro Max</td>
                <td>128GB</td>
                <td class="price">28,900 円</td>
                <td class="price">12,000 円</td>
                <td class="price">12,000 円</td>
                <td class="price">900 円</td>
            </tr>
            <tr>
                <td>iPhone 12 Pro Max</td>
                <td>64GB</td>
                <td class="price">25,500 円</td>
                <td class="price">10,200 円</td>
                <td class="price">10,200 円</td>
                <td class="price">900 円</td>
            </tr>
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
@endsection
