<?php session_start(); ?>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navCollapse" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?= $_SERVER['PHP_SELF'].'?page=pocetna' ?>" style="color: aqua; font-size: 20px">
                Choice caffe
            </a>
        </div>
        <div class="collapse navbar-collapse" id="navCollapse">
            <ul class="nav navbar-nav">
                <li><a href="<?= $_SERVER['PHP_SELF'].'?page=pocetna' ?>">Početna</a></li>
                <?php if(isset($_SESSION['korisnik'])): ?>
                <li><a href="<?= $_SERVER['PHP_SELF'].'?page=cenovnik&&vrsta=hrana' ?>">Cenovnik</a></li>
                <li><a href="<?= $_SERVER['PHP_SELF'].'?page=galerija' ?>">Galerija</a></li>
                <?php else:?>
                <li><a href="<?= $_SERVER['PHP_SELF'].'?page=login' ?>">Login</a></li>
                <?php endif; ?>
                <?php if(isset($_SESSION['korisnik'])): ?>
                <li><a href="modules/logout.php">Logout</a></li>
                <?php endif; ?>
                <?php if(isset($_SESSION['korisnik']) && $_SESSION['korisnik']->naziv == "admin"): ?>
                <li><a href="admin/index.php">Admin panel</a></>
                <?php endif; ?>
            </ul>
            <ul class="nav navbar-nav navbar-right" style="display: -webkit-box;">
                <li class="btn btn-social navKorisnik">
                    <?php
                        if(isset($_SESSION['korisnik'])):
                            echo $_SESSION['korisnik']->ime." ".$_SESSION['korisnik']->prezime;
                    ?>

                        <i class="fa fa-user" style="padding-left: 10px"></i>
                    <?php endif; ?>
                </li>

            </ul>
        </div>
    </div>
</nav>