<?php

namespace App\Repositories\SendGrid;

use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\View;

class SendGridRepository
{
    private $password;
    private $from_address;
    private $from_name;

    public function __construct()
    {
        $this->password = env('MAIL_PASSWORD');
        $this->from_address = env('MAIL_FROM_ADDRESS');
        $this->from_name = env('MAIL_FROM_NAME');
    }

    public function send($to_address, $to_name, $title, $type, $name = '')
    {
        try {
            $email = new \SendGrid\Mail\Mail();
            dd('1111');
            $email->setFrom($this->from_address, $this->from_name);
            $email->setSubject($title);
            $email->addTo($to_address, $to_name);

            if ($type == 'forgot_password') {
                $htmlContent = View::make('emails.forgot_password', [
                    'title' => $title,
                ])->render();
            } else if ($type == 'register_customer') {
                $htmlContent = View::make('emails.register_customer', [
                    'title' => $title,
                    'name' => $name,
                ])->render();
            } else if ($type == 'register_purchase_success') {
                $htmlContent = View::make('emails.register_purchase_success', [
                    'title' => $title,
                    'name' => $name,
                ])->render();
            } else {
                return false;
            }

            $email->addContent("text/html", $htmlContent);
            $sendgrid = new \SendGrid($this->password);
            dd($sendgrid);
            $response = $sendgrid->send($email);
            // return $response->statusCode();
            return true;
            // print $response->statusCode() . "\n";
            // print_r($response->headers());
            // print $response->body() . "\n";
        } catch (Exception $e) {
            // return $e->getMessage();
            return false;
        } catch (\Throwable $th) {
            return false;
        }
    }
}
