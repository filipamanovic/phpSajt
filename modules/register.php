<?php
/**
 * Created by PhpStorm.
 * User: win7
 * Date: 6/15/2018
 * Time: 6:37 PM
 */

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'php_mailer/src/Exception.php';
require 'php_mailer/src/PHPMailer.php';
require 'php_mailer/src/SMTP.php';


require_once "konekcija.php";
header("Content-type: application/json");
$code = 404;
$data = null;

if(isset($_POST['poruka'])):
    $nizGreske = [];
    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $korIme = $_POST['korIme'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $izPol = $_POST['izPol'];

    $regIme = "/^[A-ZŽĐŠĆČ][a-zžđšćč]{1,19}$/";
    $regPrezime = "/^[A-ZŽĐŠĆČ][a-zžđšćč]{1,19}(\s[A-ZŽĐŠĆČ][a-zžđšćč]{1,19})*$/";
    $regKorIme = "/.{4,30}/";

    if(!preg_match($regIme, $ime)):
        array_push($nizGreske, "Ime nije ok.");
    endif;
    if(!preg_match($regPrezime, $prezime)):
        array_push($nizGreske, "Prezime nije ok.");
    endif;
    if(!preg_match($regKorIme, $korIme)):
        array_push($nizGreske, "Korisnicko ime nije ok.");
    endif;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)):
        array_push($nizGreske, "Emnail nije ok.");
    endif;

    if(count($nizGreske)):
        $code = 420;
        $data = $nizGreske;
    else:
        $upit = "INSERT INTO korisnik VALUES ('', :ime, :prezime, :korIme, :password, :email, :pol, :vreme, 0, :tokenjko, 2)";
        $prepare = $konekcija->prepare($upit);
        $prepare->bindParam(":ime", $ime);
        $prepare->bindParam(":prezime", $prezime);
        $prepare->bindParam(":korIme", $korIme);
        $password = md5($password);
        $prepare->bindParam(":password",$password);
        $prepare->bindParam(":email", $email);
        $prepare->bindParam(":pol", $izPol);
        $vreme = time();
        $prepare->bindParam(":vreme", $vreme);
        $tokenjko = md5(time().rand().$email);
        $prepare->bindParam(":tokenjko", $tokenjko);

        try{
            $code = ($prepare->execute())? 201 : 500;

            if($code == 201):
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
                    $mail->Subject = 'Registracija';
                    $mail->Body    = 'Verifikacija mejla: <a href="http://localhost:8080/phpSajt/modules/verifikacija_mejlom.php?abc='.$tokenjko.'">LINK VERIFIKACIJE</a>';
                    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                    $mail->send();

                    // echo 'Message has been sent';
                    $code = 200;
                    $data = "Uspesna registracija.";

                } catch (Exception $e) {
                    $code = 500;
                }
            endif;

        }catch (PDOException $e){
            $code = 409;
            $data = $e->getMessage();
        }
    endif;
endif;
http_response_code($code);
echo json_encode($data);

?>