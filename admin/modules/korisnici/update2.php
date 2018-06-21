<?php
/**
 * Created by PhpStorm.
 * User: win7
 * Date: 6/21/2018
 * Time: 12:27 AM
 */
session_start();
if(isset($_POST['updateKorisnik'])):
    $korId = $_POST['hiddenID'];
    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $korIme = $_POST['korIme'];
    $pass = $_POST['pass'];
    $email = $_POST['email'];
    $pol = $_POST['pol'];
    $aktivan = (isset($_POST['aktivan']))? 1 : 0;
    $uloga = $_POST['uloga'];
    if(empty($ime)||empty($prezime)||empty($korIme)||empty($pass)||empty($email)||empty($pol)):
        $_SESSION['updateGreska'] = "Ima praznih polja.";
        header("Location: ../../korisnici.php?page=azuriraj&korId=$korId");
        else:
            require_once "../../../modules/konekcija.php";
            $upit = "UPDATE korisnik SET ime = :ime, prezime = :prezime, korIme = :korIme, 
                      password = :pass, email = :email, pol = :pol, aktivan = :aktivan, uloga_id = :uloga
                      WHERE id = :korId";
            $prepare = $konekcija->prepare($upit);
            $prepare->bindParam(":ime", $ime);
            $prepare->bindParam(":prezime", $prezime);
            $prepare->bindParam(":korIme", $korIme);
            $prepare->bindParam(":pass", $pass);
            $prepare->bindParam(":email", $email);
            $prepare->bindParam(":pol", $pol);
            $prepare->bindParam(":aktivan", $aktivan);
            $prepare->bindParam(":uloga", $uloga);
            $prepare->bindParam(":korId", $korId);

            try{
                $rezultet = $prepare->execute();
                if($rezultet):
                    $_SESSION['updateUspesno'] = "Uspesno azuriran korisnik";
                    header("Location: ../../korisnici.php");
                    else:
                    $_SESSION['updateGreska'] = "Upit ne sljaka.";
                endif;
            }catch (PDOException $e){
                echo $e->getMessage();
            }
                      

    endif;
endif;

?>