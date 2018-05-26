<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
          crossorigin="anonymous">
    <link type="text/css" rel="stylesheet" href="https://bootswatch.com/3/spacelab/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="css/style.css">
    <link type="text/css" rel="stylesheet" href="css/footer.css">

    <title>Choice cafe</title>
</head>
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
<!--                <a class="navbar-brand" href="index.php">-->
<!--                    <img align="brend" src="slike/logo2.jpg" width="30" height="30"/>-->
<!--                </a>-->
                <a class="navbar-brand" href="index.php" style="color: aqua; font-size: 20px">
                    Choice caffe
                </a>
            </div>
            <div class="collapse navbar-collapse" id="navCollapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="index.php">Početna</a></li>
                    <li><a href="#">Događaji</a></li>
                    <li><a href="#">Cenovnik</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Galerija <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Dogadjaj 1</a></li>
                            <li><a href="#">Dogadjaj 2</a></li>
                            <li><a href="#">Dogadjaj 3</a></li>
                        </ul>
                    </li>
                    <li><a href="#">O autoru</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right" style="display: -webkit-box">
                    <li>
                        <a class="btn btn-social btn-twitter" href="https://www.twitter.com" target="_blank">
                            <span class="fa fa-twitter"></span>
                        </a>
                    </li>
                    <li>
                        <a class="btn btn-social btn-facebook" href="https://www.facebook.com" target="_blank">
                            <span class="fa fa-facebook"></span>
                        </a>
                    </li>
                    <li>
                        <a class="btn btn-social btn-instagram" href="https://www.instagram.com" target="_blank">
                            <span class="fa fa-instagram"></span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="container slider">
        <div class="carousel slide" id="slider" data-ride="carousel">
            <div class="carousel-inner">
                <ol class="carousel-indicators">
                    <li data-target="#slider" data-slide-to="0"></li>
                    <li data-target="#slider" data-slide-to="1"></li>
                    <li data-target="#slider" data-slide-to="2"></li>
                </ol>
                <div class="item active">
                    <img src="slike/slider/sliderslika1.jpg" alt="">
                    <div class="carousel-caption right">
                        <a href="https://www.google.com" target="_blank">GOOGLE</a>
                    </div>
                </div>
                <div class="item">
                    <img src="slike/slider/sliderslika2.jpg" alt="">
                    <div class="carousel-caption right">
                        <a href="https://www.google.com" target="_blank">GOOGLE</a>
                    </div>
                </div>
                <div class="item">
                    <img src="slike/slider/sliderslika3.jpg" alt="">
                    <div class="carousel-caption right">
                        <button class="btn btn-warning">Nesto</button>
                    </div>
                </div>
            </div>
            <a class="right carousel-control" href="#slider" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
            <a class="left carousel-control" href="#slider" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
        </div>
    </div>


    <footer class="footer-distributed">

        <div class="footer-left">

            <h3>Company<span><img src="slike/logo.jpg" width="70" height="70" </span></h3>

            <p class="footer-links">
                <a href="#">Početna</a>
                ·
                <a href="#">Događaji</a>
                ·
                <a href="#">Cenovnik</a>
                ·
                <a href="#">Galerija</a>
                ·
                <a href="#">O autoru</a>
                .
                <a href="#">Dokumentacija</a>
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
                <p><a href="mailto:support@company.com">choicecaffe12@gmail.com</a></p>
            </div>

        </div>

        <div class="footer-right">

            <p class="footer-company-about">
                <span>Radno vreme:</span>
<!--                Lorem ipsum dolor sit amet, consectateur adispicing elit. Fusce euismod convallis velit, eu auctor lacus vehicula sit amet.-->
                Radnim danima 9:00 - 23:00 <br>
                Subota 9:00 - 23:00 <br>
                Nedelja 9:00 - 23:00
            </p>

            <div class="footer-icons">

                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-linkedin"></i></a>
                <a href="#"><i class="fa fa-github"></i></a>

            </div>

        </div>

    </footer>












<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>


</body>
</html>


