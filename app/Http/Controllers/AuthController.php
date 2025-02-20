<?php

namespace App\Http\Controllers;

use App\Repositories\Kintone\KintoneRepository;
use App\Repositories\SendGrid\SendGridRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Carbon\Carbon;
use Exception;

class AuthController extends Controller
{
    private $appId;
    private $default_user;
    private $default_password;

    public function __construct()
    {
        $this->appId = env('KINTONE_APP_ID_MEMBER');
        $this->default_user = env('DEFAULT_USER_LOGIN');
        $this->default_password = env('DEFAULT_USER_PASSWORD');
    }

    // 01_login.html
    public function login(Request $request)
    {
        return view('auth.login', $this->data);
    }

    public function submitLogin(Request $request)
    {
        if ($request->email != $this->default_user && $request->password != $this->default_password) {
            return redirect()->back()
                ->withErrors(['login_error' => 'メールアドレスまたはパスワードが間違っています。']);
        }
        Cookie::queue(Cookie::make('token', $request->email, 10080));
        return redirect()->route('home');
    }

    // 03-2_pw_forget.html
    public function forgetPassword(Request $request)
    {
        return view('auth.forget_password', $this->data);
    }

    public function forgetPasswordSubmit(Request $request)
    {
        $query = "法人メールアドレス1=\"$request->email\" limit 1";
        $kintone = new KintoneRepository($this->appId);
        $data = $kintone->getRecord($query);
        if (isset($data['records']) && count($data['records']) > 0) {
            $sendGird = new SendGridRepository();
            $sendMail = $sendGird->send($request->email, $request->email, "パスワードをお忘れの方", 'forgot_password');
            if ($sendMail == 202 || $sendMail == 200) {
                return redirect()->back()
                    ->withErrors(['message_success' => 'メールは正常に送信されました。']);
            } else {
                return redirect()->back()
                    ->withErrors(['message_error' => 'メールの送信に失敗しました。']);
            }
        } else {
            return redirect()->back()
                ->withErrors(['message_error' => 'メールが存在しません。']);
        }
    }

    // 04_base.html
    public function user(Request $request)
    {
        return view('user.index', $this->data);
    }

    // 03_login_user.html
    public function loginUser(Request $request)
    {
        return view('user.login', $this->data);
    }

    public function loginUserSubmit(Request $request)
    {
        try {
            $email = $request->email;
            $password = $request->password;
            $convert_password = Carbon::createFromFormat('Ymd', $password)->format('Y-m-d');
            $query = "法人メールアドレス1=\"$email\" and 個人生年月日=\"$convert_password\" limit 1";
            $kintone = new KintoneRepository($this->appId);
            $data = $kintone->getRecord($query);
            // $user = $data['records'][0];
            if (isset($data['records']) && count($data['records']) > 0) {
                Cookie::queue(Cookie::make('user_token', $email, 10080));
                return redirect()->route('home');
            } else {
                return redirect()->back()
                    ->withErrors(['login_error' => 'メールアドレスまたはパスワードが間違っています。']);
            }
        } catch (Exception $e) {
            return redirect()->back()
                ->withErrors(['login_error' => 'メールアドレスまたはパスワードが間違っています。']);
        }
    }
}
