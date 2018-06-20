<div class="container" style="margin-top: 30px">
    <div class="row">
        <?php
        require_once  "modules/konekcija.php";
        $upitHrana = "SELECT * FROM proizvodi WHERE vrsta = 'hrana'";
        $prepare = $konekcija->prepare($upitHrana);
        $prepare->execute();
        $brojRedova = $prepare->rowCount();
        $brStrana = ceil($brojRedova / 8);

        if(isset($_SESSION['upitCena'])):
            $upitCena = $_SESSION['upitCena'];
            $rezultat = $konekcija->query($upitCena)->fetchAll();
            foreach ($rezultat as $item): ?>
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h5><?= $item->naziv ?></h5>
                        </div>
                        <div class="panel-body">
                            <img class="img-responsive" src="<?= $item->src ?>" alt="<?= $item->alt ?>" width="100%" height="auto"/>
                        </div>
                        <div class="panel-footer">
                            <p>Cena <?= $item->cena ?>din</p>
                        </div>
                    </div>
                </div>
            <?php
            endforeach;
        else:
            $upitCene = "SELECT * FROM proizvodi p INNER JOIN slika s ON p.slika_id = s.id
                             WHERE vrsta = 'hrana' LIMIT 0,8";
            $rezultat2 = $konekcija->query($upitCene)->fetchAll();
            foreach ($rezultat2 as $nesto):
                ?>
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h5><?= $nesto->naziv ?></h5>
                        </div>
                        <div class="panel-body">
                            <img class="img-responsive" src="<?= $nesto->src ?>" alt="<?= $nesto->alt ?>" width="100%" height="auto"/>
                        </div>
                        <div class="panel-footer">
                            <p>Cena <?= $nesto->cena ?>din</p>
                        </div>
                    </div>
                </div>
            <?php endforeach; endif; ?>
    </div>
</div>
<div class="container">
    <?php for($i=1; $i<=$brStrana; $i++):   ?>
        <a class="btn btn-info" href="modules/cenovnikStr.php?brStrane=<?=$i?>"><?=$i?></a>
    <?php endfor; ?>
</div>