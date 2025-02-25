<?php

namespace App\Http\Controllers;

use App\Repositories\Entries\EntryRepository;
use App\Repositories\Kintone\KintoneRepository;
use App\Repositories\SendGrid\SendGridRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Exception;

class EntryController extends Controller
{
    private $appId;

    public function __construct()
    {
        parent::__construct();
        $this->appId = env('KINTONE_APP_ID_MEMBER');
    }


    // 05_flow-entry.html
    public function flow(Request $request)
    {
        $this->user = $this->user_token;
        return view('entry.flow', $this->data);
    }

    // 06_entry.html
    public function stepOne(Request $request)
    {
        return view('entry.step_one', $this->data);
    }

    public function stepOneSubmit(Request $request)
    {
        $data = [
            // "record" => [
                "法人名" => ["value" => $request->company_name],
                "法人名カナ" => ["value" => $request->company_name_kana],
                "法人郵便番号" => ["value" => $request->post_code],
                "個人住所1" => ["value" => $request->prefectures],
                "個人住所2" => ["value" => $request->municipalities],
                "個人住所3" => ["value" => $request->street],
                "個人住所4" => ["value" => $request->building_name],
                "法人部署名" => ["value" => $request->department],
                "法人電話番号" => ["value" => $request->telephone],
                "法人メールアドレス1" => ["value" => $request->email],
                "法人メールアドレス2" => ["value" => $request->confirm_email],
                "法人インボイス" => ["value" => $request->business],
                "法人インボイス登録番号" => ["value" => $request->registration_number],
                "銀行名" => ["value" => $request->bank_name],
                "銀行支店名" => ["value" => $request->branch_name],
                "銀行口座種別" => ["value" => $request->account_type],
                "銀行口座名カナ" => ["value" => $request->account_name],
                "銀行口座番号" => ["value" => $request->account_number],
                "個人氏名" => ["value" => $request->contact_name],
                "個人フリガナ" => ["value" => $request->contact_name_kana],
                "個人郵便番号" => ["value" => $request->contact_post_code],
                "法人住所1" => ["value" => $request->contact_prefectures],
                "法人住所2" => ["value" => $request->contact_municipalities],
                "法人住所3" => ["value" => $request->contact_street],
                "法人住所4" => ["value" => $request->contact_building_name],
                "個人電話番号" => ["value" => $request->contact_telephone],
                "個人生年月日" => ["value" => $request->contact_birthday],
                "個人職業" => ["value" => $request->contact_occupation],
                "通信欄" => ["value" => $request->contact_question],
            // ]
        ];
        // $entry = EntryRepository::addRecord(1312, $data);
        $kintone = new KintoneRepository(1312);
        $entry = $kintone->addRecord($data);
        dd($entry);
    }

    public function stepOneSubmit2(Request $request)
    {
        try {
            $contact_birthday = Carbon::createFromFormat('Ymd', $request->contact_birthday)->format('Y-m-d');
            session()->flash('step_one_data', $request->all());
            return redirect()->route('entry.stepTwo');
        } catch (Exception $e) {
            return redirect()->back()
                ->withErrors(['step_two_error' => '[生年月日] 形式が正しくありません。']);
        }
    }

    // 06_entry-step2.html
    public function stepTwo(Request $request)
    {
        $data = session('step_one_data');
        $this->entry = $entry = isset($data) ? (object) $data : null;
        if (!$entry) {
            return redirect()->route('entry.stepOne');
        }
        // $formattedDate = Carbon::createFromFormat('Ymd', $entry->contact_birthday)->format('Y-m-d');
        // dd($formattedDate);
        return view('entry.step_two', $this->data);
    }

    public function stepTwoSubmit(Request $request)
    {
        try {
            $contact_birthday = Carbon::createFromFormat('Ymd', $request->contact_birthday)->format('Y-m-d');
            $data = [
                "法人名" => ["value" => $request->company_name],
                "法人名カナ" => ["value" => $request->company_name_kana],
                "法人郵便番号" => ["value" => $request->post_code],
                "個人住所1" => ["value" => $request->prefectures],
                "個人住所2" => ["value" => $request->municipalities],
                "個人住所3" => ["value" => $request->street],
                "個人住所4" => ["value" => $request->building_name],
                "法人部署名" => ["value" => $request->department],
                "法人電話番号" => ["value" => $request->telephone],
                "法人メールアドレス1" => ["value" => $request->email],
                "法人メールアドレス2" => ["value" => $request->confirm_email],
                "法人インボイス" => ["value" => $request->business],
                "法人インボイス登録番号" => ["value" => $request->registration_number],
                "銀行名" => ["value" => $request->bank_name],
                "銀行支店名" => ["value" => $request->branch_name],
                "銀行口座種別" => ["value" => $request->account_type],
                "銀行口座名カナ" => ["value" => $request->account_name],
                "銀行口座番号" => ["value" => $request->account_number],
                "個人氏名" => ["value" => $request->contact_name],
                "個人フリガナ" => ["value" => $request->contact_name_kana],
                "個人郵便番号" => ["value" => $request->contact_post_code],
                "法人住所1" => ["value" => $request->contact_prefectures],
                "法人住所2" => ["value" => $request->contact_municipalities],
                "法人住所3" => ["value" => $request->contact_street],
                "法人住所4" => ["value" => $request->contact_building_name],
                "個人電話番号" => ["value" => $request->contact_telephone],
                "個人生年月日" => ["value" => $contact_birthday],
                "個人職業" => ["value" => $request->contact_occupation],
                "通信欄" => ["value" => $request->contact_question],
            ];
            $kintone = new KintoneRepository($this->appId);
            $entry = $kintone->addRecord($data);
            if (isset($entry['id'])) {
                $sendGird = new SendGridRepository();
                $sendMail = $sendGird->send($request->email, $request->email, "お客様情報登録完了", 'register_customer', $request->contact_name);
                return redirect()->route('entry.stepThree');
            } else {
                session()->flash('step_one_data', $request->all());
                return redirect()->route('entry.stepTwo');
            }
        } catch (Exception $e) {
            return redirect()->back()
                ->withErrors(['step_two_error' => '[生年月日] 形式が正しくありません。']);
        }
    }

    // 06_entry-step3.html
    public function stepThree(Request $request)
    {
        return view('entry.step_three', $this->data);
    }

    public function editStepOne(Request $request)
    {
        $this->user = $email = $this->user_token;
        if ($email) {
            $query = "法人メールアドレス1=\"$email\" limit 1";
            $kintone = new KintoneRepository($this->appId);
            $data = $kintone->getRecord($query);
            if (isset($data['records']) && count($data['records']) > 0) {
                $this->member = $data['records'][0];
                // dd($this->member);
            } else {
                return redirect()->route('entry.stepOne');
            }
        } else {
            return redirect()->route('entry.stepOne');
        }
        return view('entry.edit_step_one', $this->data);
    }

    public function editStepOneSubmit(Request $request)
    {
        try {
            session()->flash('step_one_data', $request->all());
            return redirect()->route('entry.editStepTwo');
        } catch (Exception $e) {
            return redirect()->back()
                ->withErrors(['step_two_error' => '形式が正しくありません。']);
        }
    }

    public function editStepTwo(Request $request)
    {
        $email = $this->user_token;
        if ($email) {
            $query = "法人メールアドレス1=\"$email\" limit 1";
            $kintone = new KintoneRepository($this->appId);
            $data = $kintone->getRecord($query);
            if (isset($data['records']) && count($data['records']) > 0) {
                $this->member = $data['records'][0];
                $data = session('step_one_data');
                $this->entry = $entry = isset($data) ? (object) $data : null;
                if (!$entry) {
                    return redirect()->route('entry.editStepOne');
                }
            } else {
                return redirect()->route('entry.stepOne');
            }
        } else {
            return redirect()->route('entry.stepOne');
        }
        return view('entry.edit_step_two', $this->data);
    }

    public function editStepTwoSubmit(Request $request)
    {
        try {
            // $contact_birthday = Carbon::createFromFormat('Ymd', $request->contact_birthday)->format('Y-m-d');
            $id = $request->id;
            $data = [
                // "法人名" => ["value" => $request->company_name],
                // "法人名カナ" => ["value" => $request->company_name_kana],
                "法人郵便番号" => ["value" => $request->post_code],
                "個人住所1" => ["value" => $request->prefectures],
                "個人住所2" => ["value" => $request->municipalities],
                "個人住所3" => ["value" => $request->street],
                "個人住所4" => ["value" => $request->building_name],
                "法人部署名" => ["value" => $request->department],
                "法人電話番号" => ["value" => $request->telephone],
                "法人メールアドレス1" => ["value" => $request->email],
                "法人メールアドレス2" => ["value" => $request->confirm_email],
                // "法人インボイス" => ["value" => $request->business],
                // "法人インボイス登録番号" => ["value" => $request->registration_number],
                // "銀行名" => ["value" => $request->bank_name],
                // "銀行支店名" => ["value" => $request->branch_name],
                // "銀行口座種別" => ["value" => $request->account_type],
                // "銀行口座名カナ" => ["value" => $request->account_name],
                // "銀行口座番号" => ["value" => $request->account_number],
                // "個人氏名" => ["value" => $request->contact_name],
                // "個人フリガナ" => ["value" => $request->contact_name_kana],
                // "個人郵便番号" => ["value" => $request->contact_post_code],
                // "法人住所1" => ["value" => $request->contact_prefectures],
                // "法人住所2" => ["value" => $request->contact_municipalities],
                // "法人住所3" => ["value" => $request->contact_street],
                // "法人住所4" => ["value" => $request->contact_building_name],
                "個人電話番号" => ["value" => $request->contact_telephone],
                // "個人生年月日" => ["value" => $contact_birthday],
                // "個人職業" => ["value" => $request->contact_occupation],
                // "通信欄" => ["value" => $request->contact_question],
            ];
            $kintone = new KintoneRepository($this->appId);
            $entry = $kintone->updateRecord($id, $data);

            if (isset($entry['revision'])) {
                return redirect()->route('entry.editStepThree');
            } else {
                session()->flash('step_one_data', $request->all());
                return redirect()->route('entry.editStepTwo');
            }
        } catch (Exception $e) {
            return redirect()->back()
                ->withErrors(['step_two_error' => '形式が正しくありません。']);
        }
    }

    public function editStepThree(Request $request)
    {
        return view('entry.edit_step_three', $this->data);
    }
}
