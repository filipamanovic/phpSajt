<?php
//include "modules/konekcija.php";
$page = "";
if(isset($_GET['page'])):
    $page = $_GET['page'];
endif;
include "views/head.php";
include "views/nav.php";



switch ($page){
    case "pocetna":
        include  "views/slider.php";
        include "views/pocetna.php";
        break;
    case "login":
        include "views/slider.php";
        include "views/login.php";
        break;
    case "cenovnik":
        include "views/cenovnik.php";
        if(isset($_GET['vrsta'])):
            $vrsta = $_GET['vrsta'];
            if($vrsta == "hrana"):
                unset($_SESSION['upitPice']);
                unset($_SESSION['upitHrana']);
            include "views/hrana.php";
            elseif ($vrsta == "pice"):
                unset($_SESSION['upitHrana']);
                unset($_SESSION['upitPice']);
            include "views/pice.php";
            else:
                unset($_SESSION['upitPice']);
                unset($_SESSION['upitHrana']);
            include "views/hrana.php";
            endif;
        endif;
        break;
    case "galerija":
        include "views/galerija.php";
        break;
    case "autor":
        include "views/autor.php";
        break;
    default:
        include "views/slider.php";
        include "views/pocetna.php";
        break;

}

include "views/footer.php";
?>









