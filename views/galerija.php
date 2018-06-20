<div class="container galerijaDiv">
    <div id="main_area">
        <!-- Slider -->
        <div class="row">
            <p style="text-align: center; padding-bottom: 10px;"><span class="galerijaPretraga">Sortirajte slike:</span>
            <select id="ddlSortGalerija" style="margin-left: 15px; margin-right: 15px">
                <option value="0">Izaberite..</option>
                <option value="1">Sve slike</option>
                <?php
                require_once "modules/konekcija.php";
                $upit2 = "SELECT DISTINCT podSvrha FROM slika WHERE svrha = 'galerija'";
                $rezultatUpit2 = $konekcija->query($upit2)->fetchAll();
                foreach ($rezultatUpit2 as $item):
                ?>
                <option value="<?= $item->podSvrha; ?>"><?= $item->podSvrha; ?></option>
                <?php endforeach; ?>
            </select>
                <span style="margin-right: 15px;"><input type="checkbox" value="da" id="prvih16">Prvih 16</span>
                <button class="btn btn-info" id="sortSlike">Prikaži</button>
            </p>
            <div id="sortGalerija">
            <div class="col-xs-12 col-sm-6" id="slider-thumbs">
                <!-- Bottom switcher of slider -->

                <ul class="hide-bullets">
                    <?php
                    $upit = "SELECT * FROM slika WHERE svrha = 'galerija'";
                    $rezultat = $konekcija->query($upit)->fetchAll();
                    $brojac = 0;
                    foreach ($rezultat as $slika):
                    ?>
                    <li class="col-sm-3">
                        <a class="thumbnail" id="carousel-selector-<?= $brojac ?>">
                            <img src="<?= $slika->src ?>" alt="<?= $slika->alt  ?>" width="150px" height="150px">
                        </a>
                    </li>
                    <?php $brojac++; endforeach; ?>
                </ul>
            </div>
            <div class="col-sm-6">
                <div class="col-xs-12" id="slider">
                    <!-- Top part of the slider -->
                    <div class="row">
                        <div class="col-sm-12" id="carousel-bounding-box">
                            <div class="carousel slide" id="myCarousel">
                                <!-- Carousel items -->
                                <div class="carousel-inner">
                                    <?php
                                    $brojac2 = 0;
                                    foreach ($rezultat as $slika):
                                    if($brojac2 == 0):
                                    ?>
                                        <div class="active item" data-slide-number="<?= $brojac ?>">
                                            <img src="<?= $slika->src ?>" alt="<?= $slika->alt ?>">
                                        </div>
                                    <?php else: ?>
                                        <div class="item" data-slide-number="<?= $brojac ?>">
                                            <img src="<?= $slika->src ?>" alt="<?= $slika->alt ?>">
                                        </div>
                                    <?php endif; $brojac2++; endforeach; ?>
                                </div>
                                <!-- Carousel nav -->
                                <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                </a>
                                <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>

