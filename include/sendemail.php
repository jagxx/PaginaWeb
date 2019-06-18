<?php

require_once('phpmailer/class.phpmailer.php');

$mail = new PHPMailer();

if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    if( $_POST['template-contactform-name'] != '' AND $_POST['template-contactform-email'] != '' ) {

        $name = $_POST['template-contactform-name'];
        $email = $_POST['template-contactform-email'];
        $phone = $_POST['template-contactform-phone'];
        $phone2 = $_POST['template-contactform-phone2'];
        $phone3 = $_POST['template-contactform-phone3'];
        $phone4 = $_POST['template-contactform-phone4'];
        $phone5 = $_POST['template-contactform-phone5'];
        $phone6 = $_POST['template-contactform-phone6'];
        $phone7 = $_POST['template-contactform-phone7'];
        $phone8 = $_POST['template-contactform-phone8'];
        $phone9 = $_POST['template-contactform-phone9'];
        $phone10 = $_POST['template-contactform-phone10'];
        $phone11 = $_POST['template-contactform-phone11'];
        $subject = $_POST['template-contactform-name'];
        $message = $_POST['template-contactform-message'];
        $message2 = $_POST['template-contactform-message2'];

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
            $message = isset($message) ? "Respuestas: $message<br><br>" : '';
            $message2 = isset($message2) ? "Mensaje: $message2<br><br>" : '';

            $phone2 = explode("- ", $message);
            $phone3 = "$phone2[0] <br>";
            $phone4 = "$phone2[1] <br>";
            $phone5 = "$phone2[2] <br>";
            $phone6 = "$phone2[3] <br>";
            $phone7 = "$phone2[4] <br>";
            $phone8 = "$phone2[5] <br>";
            $phone9 = "$phone2[6] <br>";
            $phone10 = "$phone2[7] <br>";
            $phone11 = "$phone2[8] <br>";
            $phone12 = "$phone2[9] <br>";
            $phone13 = "$phone2[10] <br>";
            $phone14 = "$phone2[11] <br>";

            $referrer = $_SERVER['HTTP_REFERER'] ? '<br><br><br>This Form was submitted from: ' . $_SERVER['HTTP_REFERER'] : '';

            $body = "$name $email $phone $phone3 $phone4 $phone5 $phone6 $phone7 $phone8 $phone9 $phone10 $phone11 $phone12 $phone13 $phone14 $message2 $service $referrer";

            $mail->MsgHTML( $body );
            $mail->CharSet = "UTF­8";
            $sendEmail = $mail->Send();

            if( $sendEmail == true ):
                echo 'Recibimos <strong>exitosamente</strong> su mensaje, lo contactaremos lo antes posible.';
            else:
                echo 'Ocurrió un error, favor de intentarlo más tarde.<br /><br /><strong>Reason:</strong><br />' . $mail->ErrorInfo . '';
            endif;
        } else {
            echo '<strong>Bot detectado</strong>.!';
        }
    } else {
        echo 'Por favor rellena todas las columnas e intenta de nuevo.';
    }
} else {
    echo 'Ocurrió un error inesperado, por favor intenta más tarde.';
}

?>