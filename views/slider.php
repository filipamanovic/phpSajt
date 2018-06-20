<?php
    require_once "modules/konekcija.php";
    $upitSlider = "SELECT * FROM slika WHERE svrha = 'slider'";
    $rezultatSlider = $konekcija->query($upitSlider)->fetchAll();
?>
<div class="container slider">
    <div class="carousel slide" id="slider" data-ride="carousel">
        <div class="carousel-inner">
            <ol class="carousel-indicators">
                <?php
                    for($i=0; $i<count($rezultatSlider); $i++):
                        echo "<li data-target='#slider' data-slide-to='$i'></li>";
                    endfor;
                ?>
            </ol>
            <?php
                foreach ($rezultatSlider as $item):
                    if($item->id == 1):
                        echo "<div class='item active'>";
                        echo "<img src='$item->src' alt='$item->alt'>";
                        echo "</div>";
                        else:
                            echo "<div class='item'>";
                            echo "<img src='$item->src' alt='$item->alt'>";
                            echo "</div>";
                    endif;
                endforeach;
            ?>
        </div>
        <a class="right carousel-control" href="#slider" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
        <a class="left carousel-control" href="#slider" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
    </div>
</div>

