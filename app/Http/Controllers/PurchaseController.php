<?php

namespace App\Http\Controllers;

use App\Repositories\Kintone\KintoneRepository;
use App\Repositories\SendGrid\SendGridRepository;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    private $appId;
    private $appMemberId;
    private $appPurchaseId;

    public function __construct()
    {
        parent::__construct();
        $this->appId = env('KINTONE_APP_ID_APP');
        $this->appMemberId = env('KINTONE_APP_ID_MEMBER');
        $this->appPurchaseId = env('KINTONE_APP_ID_PURCHASE');
    }

    // 07_pricelist.html
    public function priceList(Request $request)
    {
        $this->user = $this->user_token;
        $this->purchaseId = $this->appPurchaseId;
        $this->currentDate = Carbon::now()->format('Y年m月d日');
        $this->nextMonth = Carbon::now()->addMonth()->format('Y年m月') . "末日";

        $kintone = new KintoneRepository($this->appPurchaseId);
        $data = $kintone->getRecord("");
        $groupedData = [];
        foreach ($data["records"] as $record) {
            $category = $record["カテゴリ"]["value"];
            $groupedData[$category] = $category;
        }
        $result = [];
        foreach ($groupedData as $key => $value) {
            $result[] = ["key" => $key, "value" => $value];
        }
        // dd($result);
        $this->categories = $result;

        return view('purchase.price_list', $this->data);
    }

    // 08_flow-purchase.html
    public function flow(Request $request)
    {
        $this->user = $this->user_token;
        return view('purchase.flow', $this->data);
    }

    // 09_purchase.html
    public function stepOne(Request $request)
    {
        $this->user = $email = $this->user_token;
        if ($email) {
            $query = "法人メールアドレス1=\"$email\" limit 1";
            $kintone = new KintoneRepository($this->appMemberId);
            $data = $kintone->getRecord($query);
            if (isset($data['records']) && count($data['records']) > 0) {
                $this->member = $data['records'][0];
            }
        } else {
            return redirect()->route('auth.loginUser');
        }

        return view('purchase.step_one', $this->data);
    }

    public function stepOneSubmit(Request $request)
    {
        try {
            // $contact_birthday = Carbon::createFromFormat('Ymd', $request->contact_birthday)->format('Y-m-d');
            session()->flash('step_one_data', $request->all());
            return redirect()->route('purchase.stepTwo');
        } catch (Exception $e) {
            return redirect()->back()
                ->withErrors(['step_two_error' => '形式が正しくありません。']);
        }
    }

    // 09_purchase-step2.html
    public function stepTwo(Request $request)
    {
        $this->user = $this->user_token;
        $data = session('step_one_data');
        $this->purchase = $purchase = isset($data) ? (object) $data : null;
        if (!$purchase) {
            return redirect()->route('purchase.stepOne');
        }
        return view('purchase.step_two', $this->data);
    }

    public function stepTwoSubmit(Request $request)
    {
        try {
            $email = $this->user_token;
            if ($request->more_address || $request->choose_input_information == "法人情報と同じ") {
                if ($email) {
                    $query = "法人メールアドレス1=\"$email\" limit 1";
                    $kintone = new KintoneRepository($this->appMemberId);
                    $data = $kintone->getRecord($query);
                    if (isset($data['records']) && count($data['records']) > 0) {
                        $member = $data['records'][0];
                        $company_name = $member['法人名']['value'];
                        $post_code = $member['法人郵便番号']['value'];
                        $prefectures = $member['法人住所1']['value'];
                        $municipalities = $member['法人住所2']['value'];
                        $street_address = $member['法人住所3']['value'];
                        $building_name = $member['法人住所4']['value'];
                        $department_name = $member['法人部署名']['value'];
                        $telephone = $member['法人電話番号']['value'];
                        $contact_name = $member['個人氏名']['value'];
                    }
                }
            }

            $name = isset($contact_name) ? $contact_name : $request->contact_name;
            $data = [
                "メールアドレス" => ["value" => isset($email) ? $email : ""],
                "買取キット発送先" => ["value" => isset($request->more_address) ? $request->more_address : "0"],
                "法人名" => ["value" => isset($company_name) ? $company_name : $request->company_name],
                "郵便番号" => ["value" => isset($post_code) ? $post_code : $request->post_code],
                "住所1" => ["value" => isset($prefectures) ? $prefectures : $request->prefectures],
                "住所2" => ["value" => isset($municipalities) ? $municipalities : $request->municipalities],
                "住所3" => ["value" => isset($street_address) ? $street_address : $request->street_address],
                "住所4" => ["value" => isset($building_name) ? $building_name : $request->building_name],
                "部署名" => ["value" => isset($department_name) ? $department_name : $request->department_name],
                "電話番号" => ["value" => isset($telephone) ? $telephone : $request->telephone],
                "担当者名" => ["value" => $name],
                "買取情報機種名1" => ["value" => $request->model_name_1],
                "買取情報台数1" => ["value" => $request->number_units_1],
                "買取情報機種名2" => ["value" => $request->model_name_2],
                "買取情報台数2" => ["value" => $request->number_units_2],
                "買取情報機種名3" => ["value" => $request->number_name_3],
                "買取情報台数3" => ["value" => $request->number_units_3],
                "通信欄" => ["value" => $request->message],
                "法人名カナ" => ["value" => $request->company_name_kana],
            ];
            // dd($data);
            $kintone = new KintoneRepository($this->appId);
            $purchase = $kintone->addRecord($data);

            if (isset($purchase['id'])) {
                if ($email) {
                    $sendGird = new SendGridRepository();
                    $sendMail = $sendGird->send($email, $email, "買取申込完了", 'register_purchase_success', $name);
                    if ($sendMail) {
                        return redirect()->route('purchase.stepThree');
                    } else {
                        return response()->view('errors.custom_error', [], 500);
                    }
                }
                return redirect()->route('purchase.stepThree');
            } else {
                session()->flash('step_one_data', $request->all());
                return redirect()->route('purchase.stepTwo');
            }
        } catch (Exception $e) {
            return redirect()->back()
                ->withErrors(['step_two_error' => '形式が正しくありません。']);
        }
    }

    // 09_purchase-step3.html
    public function stepThree(Request $request)
    {
        $this->user = $this->user_token;
        return view('purchase.step_three', $this->data);
    }
}
