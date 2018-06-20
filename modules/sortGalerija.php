<?php
/**
 * Created by PhpStorm.
 * User: win7
 * Date: 6/17/2018
 * Time: 8:05 PM
 */
$code = 404;
$data = null;
header("Content-type: application/json");
if(isset($_POST['poslato'])):
    $izabrano = $_POST['izabrano'];
    $prvih16 = $_POST['prvih16'];
    require_once "konekcija.php";
    $upit = "";
    if($izabrano == "1"):
        if($prvih16 == "ne"):
            $upit = "SELECT * FROM slika WHERE svrha = 'galerija'";
        else:
            $upit = "SELECT * FROM slika WHERE  svrha = 'galerija' LIMIT 0,16";
        endif;
        else:
        if($prvih16 == "ne"):
            $upit = "SELECT * FROM slika WHERE svrha = 'galerija' AND podSvrha = '$izabrano'";
            else:
            $upit = "SELECT * FROM slika WHERE svrha = 'galerija' AND podSvrha = '$izabrano' LIMIT 0,16";
        endif;
    endif;
    try {
        $rezultatUpita = $konekcija->query($upit)->fetchAll();
        if ($rezultatUpita):
            $data = $rezultatUpita;
            $code = 200;
        else:
            $code = 500;
        endif;
    }catch (PDOException $e){
        $code = 501;
        $data = "Greska u upitima";
    }
endif;
http_response_code($code);
echo json_encode($data);
?>


