<?php ?>
<div class="container" style="margin-top: 40px;">
    <div class="row formarow">
        <?php
            if(isset($_SESSION['korisnik'])):
                $korisnik = $_SESSION['korisnik'];
                var_dump($korisnik);
                else:
        ?>
        <div class="col-xs-12 col-sm-6 col-sm-offset-3">
            <form method="post" action="modules/login.php">
                <div class="form-group forma">
                    <p style="font-size: 27px; border-bottom: 3px solid #5383d3" >Login</p>
                </div>
                <?php
                    if(isset($_SESSION['greske'])):
                        $greske = $_SESSION['greske'];
                        foreach ($greske as $greska):
                            echo $greska."<br>";
                        endforeach;
                        unset($_SESSION['greske']);
                    endif;
                ?>
                <div class="form-group">
                    <label class="forma" for="username">Korisničko ime</label>
                    <input type="text" placeholder="zikaPavlovic" class="form-control" name="korIme">
                    <label class="formaGreska" id="korImeLab">Korisničko ime u neispravnom formatu.</label>
                </div>
                <div class="form-group">
                    <label class="forma" for="password">Lozinka</label>
                    <input type="password" class="form-control" name="password">
                    <label class="formaGreska" id="passwordLab">Min jedna cifra jedno malo jedno veliko slovo i vise od 5 karaktera.</label>
                </div>
                <label>
                    <button type="submit" class="btn btn-primary" name="login">Send</button>
                </label>
            </form>
        </div>
        <?php endif; ?>
    </div>
</div>