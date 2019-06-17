<?php

require_once('phpmailer/class.phpmailer.php');

$mail = new PHPMailer();

if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    if( $_POST['template-contactform-name'] != '' AND $_POST['template-contactform-email'] != '' AND $_POST['template-contactform-message'] != '' ) {

        $name = $_POST['template-contactform-name'];
        $email = $_POST['template-contactform-email'];
        $phone = $_POST['template-contactform-phone'];
        $subject = $_POST['template-contactform-name'];
        $message = $_POST['template-contactform-message'];
        $service = $_POST['answer1'];
        $r1 = $_POST['answer1'];
        $r2 = $_POST['answer2'];
        $r3 = $_POST['answer3'];
        $r4 = $_POST['answer4'];
        $r5 = $_POST['answer5'];
        $r6 = $_POST['answer6'];
        $r7 = $_POST['answer7'];
        $r8 = $_POST['answer8'];
        $r9 = $_POST['answer9'];
        $r10 = $_POST['answer10'];

        $subject = isset($subject) ? $subject : 'New Message From Contact Form';

        $botcheck = $_POST['template-contactform-botcheck'];

        $toemail = 'ventas@jaguarx.com.mx'; // Your Email Address
        $toname = 'Ventas'; // Your Name

        if( $botcheck == '' ) {

            $mail->SetFrom( $email , $name );
            $mail->AddReplyTo( $email , $name );
            $mail->AddAddress( $toemail , $toname );
            $mail->Subject = $subject;

            $name = isset($name) ? "Nombre: $name<br><br>" : '';
            $email = isset($email) ? "Email: $email<br><br>" : '';
            $phone = isset($phone) ? "Telefono: $phone<br><br>" : '';
            $message = isset($message) ? "Mensaje: $message<br><br>" : '';
            $service = isset($service) ? "Respuesta1: $service<br><br>" : '';
            $r1 = isset($r1) ? "Tipo de web: $r1<br><br>" : '';
            $r2 = isset($r2) ? "Diseño: $r2<br><br>" : '';
            $r3 = isset($r3) ? "Tamaño: $r3<br><br>" : '';
            $r4 = isset($r4) ? "Pagos: $r4<br><br>" : '';
            $r5 = isset($r5) ? "Integraciones: $r5<br><br>" : '';
            $r6 = isset($r6) ? "Login: $r6<br><br>" : '';
            $r7 = isset($r7) ? "Multidioma: $r7<br><br>" : '';
            $r8 = isset($r8) ? "Buscador: $r8<br><br>" : '';
            $r9 = isset($r9) ? "SEO: $r9<br><br>" : '';
            $r10 = isset($r10) ? "Status: $r10<br><br>" : '';

            $referrer = $_SERVER['HTTP_REFERER'] ? '<br><br><br>This Form was submitted from: ' . $_SERVER['HTTP_REFERER'] : '';

            $body = "$name $email $phone $message $service $r1 $r2 $r3 $r4 $r5 $r6 $r7 $r8 $r9 $r10 $referrer";

            $mail->MsgHTML( $body );
            $sendEmail = $mail->Send();

            if( $sendEmail == true ):
                echo 'We have <strong>successfully</strong> received your Message and will get Back to you as soon as possible.';
            else:
                echo 'Email <strong>could not</strong> be sent due to some Unexpected Error. Please Try Again later.<br /><br /><strong>Reason:</strong><br />' . $mail->ErrorInfo . '';
            endif;
        } else {
            echo 'Bot <strong>Detected</strong>.! Clean yourself Botster.!';
        }
    } else {
        echo 'Please <strong>Fill up</strong> all the Fields and Try Again.';
    }
} else {
    echo 'An <strong>unexpected error</strong> occured. Please Try Again later.';
}

?>