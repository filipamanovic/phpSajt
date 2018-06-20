<?php
/**
 * Created by PhpStorm.
 * User: win7
 * Date: 6/19/2018
 * Time: 2:01 PM
 */
header("Content-type: application/json");
$code = 404;
$data = null;
if(isset($_POST['sended'])):
    require_once "konekcija.php";
    $korID = $_POST['korID'];
    $odgovor = $_POST['odgovor'];
    $upit = "SELECT anketa_id FROM korisnikodgovor ko INNER JOIN odgovor o ON ko.odgovor_id = o.id  
            WHERE korisnik_id = '$korID' AND odgovor_id = '$odgovor'";
    $rezultat = $konekcija->query($upit)->fetch();

    if($rezultat != false):
        $anketa_id = $rezultat->anketa_id;
        $code = 200;
        $upit4 = "SELECT COUNT(korisnik_id) as broj,o.odgovor as odg FROM korisnikodgovor ko INNER JOIN odgovor o ON
                  ko.odgovor_id = o.id WHERE o.anketa_id = $anketa_id  GROUP BY odgovor_id";
        $rezultat4 = $konekcija->query($upit4)->fetchAll();
        $data = $rezultat4;
        else:
        $upit2 = "INSERT INTO korisnikodgovor VALUES ('', '$korID', '$odgovor')";
        $rezultat2 = $konekcija->query($upit2);
        if($rezultat2):
            $upit5 = "SELECT anketa_id FROM korisnikodgovor ko INNER JOIN odgovor o ON ko.odgovor_id = o.id  
            WHERE korisnik_id = '$korID' AND odgovor_id = '$odgovor'";
            $rezultat5 = $konekcija->query($upit5)->fetch();
            $anketa_id = $rezultat5->anketa_id;
            $code = 200;
            $upit6 = "SELECT COUNT(korisnik_id) as broj,o.odgovor as odg FROM korisnikodgovor ko INNER JOIN odgovor o ON
                  ko.odgovor_id = o.id WHERE o.anketa_id = $anketa_id  GROUP BY odgovor_id";
            $rezultat6 = $konekcija->query($upit6)->fetchAll();
            $data = $rezultat6;
            else:
            $code = 506;
            $data = "Greska sa insertiom";
        endif;
    endif;
endif;
http_response_code($code);
echo json_encode($data);


?>