<?php

namespace  frontend\components\sendmail;
use frontend\components\sendmail\PHPMailer;
use Yii;
use yii\web\View;
use console\controllers;


class sendMail{

    function sendEmail($sendEmail,$sub,$body= 'no body'){
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'mail.laravel1@gmail.com';
        $mail->Password = 'son@@1234';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->isHTML(true);
        $mail->CharSet =  "UTF-8";


        $mail->SetFrom('mail.laravel1@gmail.com', 'Minh Huy');
        if(is_array($sendEmail)){
            foreach ($sendEmail as $value);
            $mail->addAddress($value);
        } else{
            $mail->addAddress($sendEmail);
        }

        $mail->Body = $body;
        $mail->Subject = $sub;
        if(!$mail->send()){
           echo  'mail errors'.$mail->ErrorInfo;
        }else{
            echo 'yes';
        }
    }

}