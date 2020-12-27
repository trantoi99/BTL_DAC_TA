<?php

namespace App\Mail;

use Exception;
use GuzzleHttp\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

trait SendMail
{
    public function send_mail($mail)
    {
        $temp = file_get_contents(base_path('public\sendmail\sendmail.html'));

        $search = [
            '{{ name }}',
            '{{ phone_number }}',
            '{{ address }}',
            '{{ total }}'
        ];

        $replace = [
            $mail['tenKH'],
            $mail['sodienthoai'],
            $mail['diachi'],
            $mail['tongtien']
        ];

        $result = str_replace($search, $replace, $temp);
        try{
            $body = [
                'Messages' => [
                    [
                    'From' => [
                        'Email' => 'tranhungtoi308@gmail.com',
                        'Name' => 'My Team'
                    ],
                    'To' => [
                        [
                        'Email' => $mail['email'],
                        'Name' => $mail['name']
                        ]
                    ],
                    'Subject' => "Cảm ơn bạn đã đặt hàng!",
                    'HTMLPart' => $result
                    ]
                ]
            ];

            $client = new Client([
                // Base URI is used with relative requests
                'base_uri' => 'https://api.mailjet.com/v3.1/',
            ]);

            $response = $client->request('POST', 'send', [
                'json' => $body,
                'auth' => ['18e6329ab1a135b903b2665af2d024aa', 'a5379683c8069f067d4f512fad4aaf3a']
            ]);

            if($response->getStatusCode() == 200) {
                $body = $response->getBody();
                $response = json_decode($body);
                if ($response->Messages[0]->Status == 'success') {
                    return true;
                }
            }
            else{
                return false;
            }
        }
        catch(Exception $ex){
            return $ex->getMessage();
        }
    }
}
