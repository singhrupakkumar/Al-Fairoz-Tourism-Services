<?php

namespace App;

use App\Models\{EmailTemplate, Setting, Profile };
use Carbon\Carbon;
use Spatie\Permission\Models\Permission;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mail;
use Illuminate\Support\Str;
use Session;


class Helpers
{

    public static function getMailTemplate($id, $from, $to, $body, $subject)
    {
        $data = EmailTemplate::where('id', $id)->first()->toArray();
        $sub = isset($subject) ? $subject : $data['name'];
        Mail::send('emails.common', ["data" => $body], function ($message) use ($from, $to, $sub) {
            $message->to($to);
            $message->subject($sub);
            $message->from($from, 'Tour');
        });
    }

    public static function getMailTemplateContent($id, $from, $to, $body, $subject)
    {
        
        $data = EmailTemplate::where('id', $id)->first()->toArray();
        $sub = isset($subject) ? $subject : $data['name'];
        Mail::send('emails.emailContent', ["data" => $body], function ($message) use ($from, $to, $sub) {
            $message->to($to);
            $message->subject($sub);
            $message->from($from, 'Tour');
        });
    }

    public static function setting(){
        $setting = Setting::first();
        return $setting;
    }
    public static function profile(){
        $profile = Profile::first();
        return $profile;
    }
    
    public static function encrypt($string)
    {
        $output = false;
        $encrypt_method = "AES-256-CBC";
        $secret_key = '{#>sD~k2Ej:-eC7{TASvNj1a@`e`H+8=T?U&Kbl2BdB~QO<:&uRVypzqR#Yrb$^n';
        $secret_iv = 'yVu 2i-M%c}n^.Z_9nj$rsBKhUl&O[nU_uWi]ntX$$t4![DH5{m( P;q,`VhucOn';

        // hash
        $key = hash('sha256', $secret_key);

        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash('sha256', $secret_iv), 0, 16);
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
        return $output;
    }

    public static function decrypt($string)
    {
        $output = false;
        $encrypt_method = "AES-256-CBC";
        $secret_key = '{#>sD~k2Ej:-eC7{TASvNj1a@`e`H+8=T?U&Kbl2BdB~QO<:&uRVypzqR#Yrb$^n';
        $secret_iv = 'yVu 2i-M%c}n^.Z_9nj$rsBKhUl&O[nU_uWi]ntX$$t4![DH5{m( P;q,`VhucOn';

        // hash
        $key = hash('sha256', $secret_key);

        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash('sha256', $secret_iv), 0, 16);

        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        return $output;
    }
    
    public static function number_format_short($n)
    {
        if ($n > 0 && $n < 1000) {
            // 1 - 999
            $n_format = floor($n);
            $suffix = '';
        } else if ($n >= 1000 && $n < 1000000) {
            // 1k-999k
            $n_format = floor($n / 1000);
            $suffix = 'K+';
        } else if ($n >= 1000000 && $n < 1000000000) {
            // 1m-999m
            $n_format = floor($n / 1000000);
            $suffix = 'M+';
        } else if ($n >= 1000000000 && $n < 1000000000000) {
            // 1b-999b
            $n_format = floor($n / 1000000000);
            $suffix = 'B+';
        } else if ($n >= 1000000000000) {
            // 1t+
            $n_format = floor($n / 1000000000000);
            $suffix = 'T+';
        }

        return !empty($n_format . $suffix) ? $n_format . $suffix : 0;
    }

    

}