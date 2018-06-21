<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Korsinici
                    <small>Dodaj novi</small>
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="index.php">Admin</a>
                    </li>
                    <li class="active">
                        <button id="blabla" type="button" class="btn btn-primary">Popuni korisnika</button>
                    </li>
                </ol>
                <?php
                    if(isset($_SESSION['updateGreska'])):
                        echo $_SESSION['updateGreska'];
                    endif;
                    unset($_SESSION['updateGreska']);
                if(isset($_SESSION['sesija'])):
                    echo $_SESSION['sesija'];
                endif;
                unset($_SESSION['sesija']);
                ?>
                <form role="form" method="post" action="modules/korisnici/update2.php">
                    <div class="form-group">
                        <label class="forma" for="username">Ime</label>
                        <input type="text" class="form-control" name="ime" id="updateIme">
                    </div>
                    <div class="form-group">
                        <label class="forma" for="username">Prezime</label>
                        <input type="text" class="form-control" name="prezime" id="updatePrezime">
                    </div>
                    <div class="form-group">
                        <label class="forma" for="username">Korisničko ime</label>
                        <input type="text" class="form-control" name="korIme" id="updateKorIme">
                    </div>
                    <div class="form-group">
                        <label class="forma" for="password">Lozinka</label>
                        <input type="password" class="form-control" name="pass" id="updatePass" >
                    </div>
                    <div class="form-group">
                        <label class="forma" for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="updateEmail">
                    </div>
                    <div class="form-group">
                        <p class="forma" style="font-size: 14px; font-weight: bold">Izaberite pol</p>
                        <label class="radio-inline">
                            <input type="radio" name="pol" id="polM" value="muski"> Muški
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="pol" id="polZ" value="zenski"> Ženski
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="forma" for="email">Aktivan</label><br>
                        <label class="checkbox-inline">
                            <input type="checkbox" name="aktivan" value="da"/>Da
                        </label>
                    </div>
                    <div class="form-group">
                        <label>Uloga</label>
                        <select id="uloga" name="uloga" class="form-control">
                            <?php foreach($uloga as $u): ?>
                                <option value="<?= $u->id ?>"> <?= $u->naziv ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <input type="hidden" value="" name="hiddenID" id="hiddenID">
                    <button type="submit" name="updateKorisnik" class="btn btn-default">Izmeni</button>
                    <a href="korisnici.php" class="btn btn-default">Nazad</a>
                </form>
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrappe