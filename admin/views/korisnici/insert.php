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
                        <i class="fa fa-file"></i> Korisnici
                    </li>
                </ol>
                <?php
                    if(isset($_SESSION['greskaInsert'])):
                        echo $_SESSION['greskaInsert'];
                    endif;
                    unset($_SESSION['greskaInsert']);

                    if(isset($_SESSION['insertUspesan'])):
                        echo $_SESSION['insertUspesan'];
                    endif;
                    unset($_SESSION['greskaInsert']);
                ?>
                <form role="form" method="post" action="modules/korisnici/insert.php">
                    <div class="form-group">
                        <label class="forma" for="username">Ime</label>
                        <input type="text" class="form-control" name="ime">
                    </div>
                    <div class="form-group">
                        <label class="forma" for="username">Prezime</label>
                        <input type="text" class="form-control" name="prezime">
                    </div>
                    <div class="form-group">
                        <label class="forma" for="username">Korisničko ime</label>
                        <input type="text" class="form-control" name="korIme">
                    </div>
                    <div class="form-group">
                        <label class="forma" for="password">Lozinka</label>
                        <input type="password" class="form-control" name="pass">
                    </div>
                    <div class="form-group">
                        <label class="forma" for="email">Email</label>
                        <input type="email" class="form-control" name="email">
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
                    <div class="form-group">
                        <label class="forma" for="email">Aktivan</label><br>
                        <label class="checkbox-inline">
                            <input type="checkbox" name="aktivan" value="da"/>Da
                        </label>
                    </div>
                    <div class="form-group">
                        <label>Uloga</label>
                        <select name="uloga" class="form-control">
                            <?php foreach($uloga as $u): ?>
                                <option value="<?= $u->id ?>"> <?= $u->naziv ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button type="submit" name="submit" class="btn btn-default">Dodaj</button>
                    <a href="korisnici.php" class="btn btn-default">Nazad</a>
                </form>
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->