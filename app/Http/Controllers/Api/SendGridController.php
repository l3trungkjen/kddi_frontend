<?php

namespace App\Http\Controllers\Api;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\View;

class SendGridController extends Controller
{
    private $subdomain;
    private $password;
    private $from_address;
    private $from_name;

    public function __construct()
    {
        $this->subdomain = env('KINTONE_SUBDOMAIN');
        $this->password = env('MAIL_PASSWORD');
        $this->from_address = env('MAIL_FROM_ADDRESS');
        $this->from_name = env('MAIL_FROM_NAME');
    }

    public function send(Request $request)
    {
        $email = new \SendGrid\Mail\Mail();
        $email->setFrom($this->from_address, $this->from_name);
        $email->setSubject("Sending with Twilio SendGrid is Fun");
        $email->addTo("kienlt147@gmail.com", "KIENLT");
        $htmlContent = View::make('emails.forgot_password', [
            'title' => 'test',
        ])->render();
        $email->addContent(
            "text/html", $htmlContent
        );
        $sendgrid = new \SendGrid('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');
        try {
            $response = $sendgrid->send($email);
            dd($response);
            // print $response->statusCode() . "\n";
            // print_r($response->headers());
            // print $response->body() . "\n";
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
