<div class="container" style="margin-top: 40px;">
    <div class="row">
        <div class="col-xs-12 col-sm-8">
            <div class="row">
                <?php
                require_once "modules/konekcija.php";
                $upit2 = "SELECT * FROM promocija p INNER JOIN slika s ON p.slika_id = s.id";
                $rezultatPromo = $konekcija->query($upit2)->fetchAll();
                foreach ($rezultatPromo as $promocija):
                ?>
                <div class="col-xs-12 col-sm-4">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h5></h5>
                        </div>
                        <div class="panel-body">
                            <img class="img-responsive" src="<?= $promocija->src ?>" alt="<?= $promocija->alt ?>" width="100%" height="auto"/>
                        </div>
                        <div class="panel-footer">
                            <p>
                                <?= $promocija->opis ?>
                            </p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <?php
            if(isset($_SESSION['korisnik'])):
        ?>
                <div class="col-xs-12 col-sm-4">
            <form>
                <div class="form-group forma">
                    <p style="font-size: 27px; border-bottom: 3px solid #5383d3" >Anketa</p>
                </div>
                <ul class="nav nav-tabs ulCenovnik">
                <?php
                    require_once "modules/konekcija.php";
                    $upit = "SELECT * FROM anketa";
                    $rezultat = $konekcija->query($upit)->fetchAll();
                    $brojac = 0;
                    foreach ($rezultat as $anketa):
                ?>
                    <?php if($brojac == 0): ?>
                        <li class="active"><a href="javascript:;" class="anketa" data-id="<?= $anketa->id ?>"><?= $anketa->nazivAnkete ?></a></li>
                    <?php else: ?>
                        <li><a href="javascript:;" class="anketa" data-id="<?= $anketa->id ?>"><?= $anketa->nazivAnkete ?></a></li>
                    <?php endif; ?>
                <?php endforeach; ?>
                </ul>

                    <div id="sadrzajAnkete">

                    </div>
                    <input type="hidden" id="korId" value="<?= $_SESSION['korisnik']->id ?>" >
                    <label>
                        <button type="button" class="btn btn-primary" id="glasanje">Glasaj</button>
                        <button type="button" class="btn btn-primary" id="reset">Nazad</button>
                    </label>
            </form>
        </div>
        <?php else: ?>
        <div class="col-xs-12 col-sm-4 col-md-3">
            <form>
                <div class="form-group forma">
                    <p style="font-size: 27px; border-bottom: 3px solid #5383d3" >Registracija</p>
                </div>
                <div class="form-group">
                    <label class="forma" for="username">Ime</label>
                    <input type="text" placeholder="Žika" class="form-control" id="ime">
                    <label class="formaGreska" id="imeLab">Ime u neispravnom formatu.</label>
                </div>
                <div class="form-group">
                    <label class="forma" for="username">Prezime</label>
                    <input type="text" placeholder="Pavlović" class="form-control" id="prezime">
                    <label class="formaGreska" id="prezimeLab">Prezime u neispravnom formatu.</label>
                </div>
                <div class="form-group">
                    <label class="forma" for="username">Korisničko ime</label>
                    <input type="text" placeholder="zikaPavlovic" class="form-control" id="korIme">
                    <label class="formaGreska" id="korImeLab">Korisničko ime u neispravnom formatu.</label>
                </div>
                <div class="form-group">
                    <label class="forma" for="password">Lozinka</label>
                    <input type="password" class="form-control" id="password">
                    <label class="formaGreska" id="passwordLab">Min jedna cifra jedno malo jedno veliko slovo i vise od 5 karaktera.</label>
                </div>
                <div class="form-group">
                    <label class="forma" for="email">Email</label>
                    <input type="email" placeholder="examlpe@gmail.com" class="form-control" id="email">
                    <label class="formaGreska" id="emailLab">Email u neispravnom formatu.</label>
                </div>
                <div class="form-group">
                    <p class="forma" style="font-size: 14px; font-weight: bold">Izaberite pol</p>
                    <label class="radio-inline">
                        <input type="radio" name="pol" value="muski"> Muški
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="pol" value="zenski"> Ženski
                    </label>
                </div>
                <label class="formaGreska" id="polLab">Morate izabrati pol.</label><br>
                <label>
                    <button type="button" class="btn btn-primary" id="register">Send</button>
                </label>
                <div id="odgovorBaze">

                </div>
            </form>
        </div>
        <?php endif; ?>
    </div>
</div>
