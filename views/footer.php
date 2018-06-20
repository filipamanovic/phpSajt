<footer class="footer-distributed">
    <div class="container">
    <div class="footer-left">
        <h3>Company<span><img src="slike/logo.jpg" width="70" height="70" </span></h3>
        <p class="footer-links">
            <a href="<?= $_SERVER['PHP_SELF'].'?page=pocetna' ?>">Početna</a>
            ·
            <?php if(isset($_SESSION['korisnik'])): ?>
            <a href="<?= $_SERVER['PHP_SELF'].'?page=autor' ?>">O autoru</a>
            .
            <a href="documentation3123.pdf" target="_blank">Dokumentacija</a>
            <?php endif; ?>
        </p>
        <p class="footer-company-name">Choice caffe &copy; 2018</p>
    </div>
    <div class="footer-center">
        <div>
            <i class="fa fa-map-marker"></i>
            <p><span>Mekenzijeva 67</span> Beograd, Srbija</p>
        </div>
        <div>
            <i class="fa fa-phone"></i>
            <p>+38165 555-333</p>
        </div>
        <div>
            <i class="fa fa-envelope"></i>
            <p><a href="mailto:support@company.com">choicecaffe@gmail.com</a></p>
        </div>
    </div>
    <div class="footer-right">
        <p class="footer-company-about">
            <span>Radno vreme:</span>
            Radnim danima 9:00 - 23:00 <br>
            Subota 9:00 - 23:00 <br>
            Nedelja 9:00 - 23:00
        </p>
        <div class="footer-icons">
            <a href="https://www.facebook.com" target="_blank"><i class="fa fa-facebook"></i></a>
            <a href="https://www.twitter.com" target="_blank"><i class="fa fa-twitter"></i></a>
            <a href="https://www.instagram.com" target="_blank"><i class="fa fa-instagram"></i></a>
            <a href="https://www.github.com" target="_blank"><i class="fa fa-github"></i></a>
        </div>
    </div>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/sortGalerija.js"></script>
<script type="text/javascript" src="js/anketa.js"></script>
<script type="text/javascript" src="js/porukaAdm.js"></script>


</body>
</html>