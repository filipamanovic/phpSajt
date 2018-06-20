<?php
/**
 * Created by PhpStorm.
 * User: win7
 * Date: 6/16/2018
 * Time: 11:27 AM
 */
session_start();
if(isset($_POST['login'])):
    $nizGreske = [];
    $korIme = $_POST['korIme'];
    $password = $_POST['password'];

    $regKorIme = "/.{4,30}/";
    $regPass1 = "/[a-z]+/";
    $regPass2 = "/[A-Z]+/";
    $regPass3 = "/[\d]+/";
    if(!preg_match($regKorIme, $korIme)):
        array_push($nizGreske, "Korisnicko ime nije ok.");
    endif;
    if(!preg_match($regPass1,$password)||!preg_match($regPass2,$password)||!preg_match($regPass3,$password)||strlen($password)<6):
        array_push($nizGreske, "Password nije ok.");
    endif;

    if(count($nizGreske) > 0):
        $_SESSION['greske'] = $nizGreske;
        header("Location: ../index.php?page=login");
        else:
        require_once "konekcija.php";
        $upit = "SELECT *,k.id FROM korisnik k INNER JOIN uloga u ON k.uloga_id = u.id WHERE
                  korIme = :korIme AND password = :password AND aktivan = 1";
        $prepare = $konekcija->prepare($upit);
        $prepare->bindParam(":korIme", $korIme);
        $password = md5($password);
        $prepare->bindParam(":password", $password);
        try{
            $prepare->execute();
            $korisnik = $prepare->fetch();
            if($korisnik):
                $_SESSION['korisnik'] = $korisnik;
                header("Location: ../index.php?page=pocetna");
                else:
                $greske = ["Pogresni podaci ili niste aktivirali nalog."];
                $_SESSION['greske'] = $greske;
                header("Location: ../index.php?page=login");
            endif;

        }catch (PDOException $e){
            echo $e->getMessage();
        }
    endif;

endif;



?>