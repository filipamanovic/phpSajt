<?php
/**
 * Created by PhpStorm.
 * User: win7
 * Date: 6/19/2018
 * Time: 12:28 PM
 */

header("Content-type: application.json");
$code = 404;
$data = null;

if(isset($_POST['send'])):
    require_once "konekcija.php";
    $anketa = $_POST['anketa'];
    $_SESSION['anketaID'] = $anketa;
    $upit = "SELECT *,a.id,o.id FROM anketa a INNER JOIN odgovor o ON a.id = o.anketa_id 
              WHERE a.id = '$anketa' AND aktivna = 1";
    try{
        $rezulatat = $konekcija->query($upit)->fetchAll();
        if($rezulatat):
            $code = 200;
            $data = $rezulatat;
            else:
                $code = 503;
                $data = "Upit ne valja";
        endif;

    }catch (PDOException $e){
        $code = 502;
        $data = "Greska u upitu.";
    }

endif;

http_response_code($code);
echo json_encode($data);


?>