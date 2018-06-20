const BASE_URL = "http://localhost:8080/phpSajt";
$(document).ready(function () {
    $("#imeLab").hide();
    $("#prezimeLab").hide();
    $("#korImeLab").hide();
    $("#passwordLab").hide();
    $("#emailLab").hide();
    $("#polLab").hide();

    $("#register").click(function () {
        var nizGreske = [];
        var ime = $("#ime").val();
        var prezime = $("#prezime").val();
        var korIme = $("#korIme").val();
        var password = $("#password").val();
        var email = $("#email").val();
        var izPol = "";
        var pol = document.getElementsByName('pol');
        for(x in pol){
            if(pol[x].checked){
                izPol = pol[x].value;
                break;
            }
        }

        var regIme = /^[A-ZŽĐŠĆČ][a-zžđšćč]{1,19}$/;
        var regPrezime = /^[A-ZŽĐŠĆČ][a-zžđšćč]{1,19}(\s[A-ZŽĐŠĆČ][a-zžđšćč]{1,19})*$/;
        var regKorIme = /.{4,30}/;
        var regPass1 = /[a-z]+/;
        var regPass2 = /[A-Z]+/;
        var regPass3 = /[\d]+/;
        var regEmail = /^.{1,30}\@.{2,10}\..{1,5}$/;

        if(!regIme.test(ime)){
            $("#imeLab").show();
            $("#ime").css("border", "1px solid crimson");
            nizGreske.push("Ime neispravno.");
        }else{
            $("#imeLab").hide();
            $("#ime").css("border", "");
        }

        if(!regPrezime.test(prezime)){
            $("#prezimeLab").show();
            $("#prezime").css("border", "1px solid crimson");
            nizGreske.push("Prezime neispravno.");
        }else{
            $("#prezimeLab").hide();
            $("#preime").css("border", "");
        }

        if(!regKorIme.test(korIme)){
            $("#korImeLab").show();
            $("#korIme").css("border", "1px solid crimson");
            nizGreske.push("Korisnicko ime neispravno.");
        }else{
            $("#korImeLab").hide();
            $("#korIme").css("border", "");
        }

        if(regPass1.test(password)&&regPass2.test(password)&&regPass3.test(password)&&password.length>5){
            $("#passwordLab").hide();
            $("#password").css("border", "");
        }else {
            $("#passwordLab").show();
            $("#password").css("border", "1px solid crimson");
            nizGreske.push("Pasvord nije ok.");
        }

        if(!regEmail.test(email)){
            $("#emailLab").show();
            $("#email").css("border", "1px solid crimson");
            nizGreske.push("Email neispravan.");
        }else{
            $("#emailLab").hide();
            $("#email").css("border", "");
        }

        if(izPol == ""){
            $("#polLab").show();
            nizGreske.push("Nije izabran pol.");
        }else{
            $("#polLab").hide();
        }

        if(nizGreske.length == 0){
            function podaciForme(){
                var obj = {
                    ime: ime,
                    prezime: prezime,
                    korIme: korIme,
                    password: password,
                    email: email,
                    izPol: izPol,
                    poruka: true
                }
                return obj;
            }
            function callAjax(obj) {
                $.ajax({
                   method: "post",
                   url: BASE_URL + "/modules/register.php",
                   dataType: "json",
                   data: obj,
                   success: function (data, xhr) {
                       $("#odgovorBaze").html("<h3>Uspesna registracija, aktivirajte nalog na svom emailu.</h3>");
                   },
                   error: function(xhr, status, error){
                       var poruka = "DOslo je do greske.";
                       switch(xhr.status) {
                           case 404 :
                               poruka = "Stranica nije pronadjena.";
                               break;
                           case 409:
                               poruka = "Username ili email vec postoji.";
                               break;
                           case 422:
                               poruka = "Podaci nisu validni.";
                               console.log(xhr.responseText);
                               break;
                           case 500:
                               poruka = "Greska.";
                               break;
                       }
                       $("#odgovorBaze").html(poruka);
                   }
                });
            }
            var obj = podaciForme();
            callAjax(obj);
        }
    });


    $('#myCarousel').carousel({
        interval: 5000
    });

    //Handles the carousel thumbnails
    $('[id^=carousel-selector-]').click(function () {
        var id_selector = $(this).attr("id");
        try {
            var id = /-(\d+)$/.exec(id_selector)[1];
            //console.log(id_selector, id);
            jQuery('#myCarousel').carousel(parseInt(id));
        } catch (e) {
            console.log('Regex failed!', e);
        }
    });
    // When the carousel slides, auto update the text
    $('#myCarousel').on('slid.bs.carousel', function (e) {
        var id = $('.item.active').data('slide-number');
        $('#carousel-text').html($('#slide-content-'+id).html());
    });

    $(".ulCenovnik li").click(function () {
        $(".ulCenovnik li").removeClass("active");
        $(this).addClass("active");
    });

});