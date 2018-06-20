<?php
/**
 * Created by PhpStorm.
 * User: win7
 * Date: 6/18/2018
 * Time: 11:26 AM
 */
session_start();
unset($_SESSION['upitPice']);
unset($_SESSION['upitCena']);
if(isset($_GET['brStrane'])):
    require_once "konekcija.php";
    $brStrane = $_GET['brStrane'];
    $limit_levo = ($brStrane-1)*8;
    $limit_desno = 8;
    $upit = "SELECT * FROM proizvodi p INNER JOIN slika s on p.slika_id = s.id
             WHERE vrsta = 'pice' LIMIT $limit_levo, $limit_desno";
    $_SESSION['upitCena'] = $upit;
    header("Location: ../index.php?page=cenovnik&&vrsta=pice");
    else:
        header("Location: ../index.php?page=cenovnik&&vrsta=pice");
endif;





?>