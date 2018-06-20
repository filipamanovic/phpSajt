<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'php_mailer/src/Exception.php';
require 'php_mailer/src/PHPMailer.php';
require 'php_mailer/src/SMTP.php';
/**
 * Created by PhpStorm.
 * User: win7
 * Date: 6/19/2018
 * Time: 5:27 PM
 */
header("Content-type: application/json");
$code = 404;
$data = null;
if(isset($_POST['porukaAdminu'])):
    $naslov = $_POST['naslov'];
    $poruka = $_POST['poruka'];
    $email = $_POST['email'];
    $greske = [];

    $regNaslov = "/^[A-Z][a-z\d\s\.\,]{1,70}$/";
    $regPoruka = "/^[A-Z][a-z\d\s\.\,]{1,70}$/";
    if(!preg_match($regNaslov, $naslov)):
        array_push($greske, "Naslov nije ok");
    endif;
    if(!preg_match($regPoruka, $poruka)):
        array_push($greske, "Poruka nije ok");
    endif;

    if(count($greske) > 0):
        $code = 502;
        $data = "Poruka ili naslov nisu ok.";
        else:
            $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
            try {
                //Server settings
//                    $mail->SMTPDebug = 3;
                $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );                                          // Enable verbose debug output
                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = 'phpSajt13616ict2018@gmail.com';                 // SMTP username
                $mail->Password = 'administrator123phpSajt1221AB@@';                           // SMTP password
                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587;                                    // TCP port to connect to

                //Recipients
                $mail->setFrom('phpSajt13616ict2018@gmail.com', 'Filip Amanovic');
                $mail->addAddress($email, "Fica");     // Add a recipient
                // $mail->addAddress('ellen@example.com');               // Name is optional
                // $mail->addReplyTo('info@example.com', 'Information');
                // $mail->addCC('cc@example.com');
                // $mail->addBCC('bcc@example.com');

                //Attachments
                // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

                //Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = $naslov;
                $mail->Body    = $poruka;
                // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();

                // echo 'Message has been sent';
                $code = 200;
                $data = "Uspesno poslata poruka.";

            } catch (Exception $e) {
                $code = 500;
            }
    endif;


endif;
http_response_code($code);
echo json_encode($data);

?>