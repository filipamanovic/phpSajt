$(document).ready(function () {
    $("#naslovGreska").hide();
    $("#tekstGreska").hide();
   $("#porukaAdminu").click(function () {
        var naslov = $("#naslovPoruke").val();
        var poruka = $("#sadrzajPoruke").val();
        var email = $("#emailKor").val();
        //alert(naslov+" "+poruka+" "+email);
        var regNaslov = /^[A-Z][a-z\d\s\.\,]{1,70}$/;
        var regPoruka = /^[A-Z][a-z\d\s\.\,]{1,70}$/;
        var greske = [];
        if(!regNaslov.test(naslov)){
            $("#naslovGreska").show();
            greske.push("Naslov nije ok.");
        }else{
            $("#naslovGreska").hide();
        }
        if(!regPoruka.test(poruka)){
            $("#tekstGreska").show();
            greske.push("Poruka nije ok.");
        }else {
            $("#tekstGreska").hide();
        }
        if(greske.length == 0){
            var data = {
                naslov: naslov,
                poruka: poruka,
                email: email,
                porukaAdminu: true
            };

            $.ajax({
               method: "post",
               url: BASE_URL + "/modules/porukaAdminu.php",
               dataType: "json",
               data: data,
               success: function (podaci) {
                   $("#porukaAdm").html(podaci);
               },
               error: function (xhr, status, error) {
                   console.log(code = (xhr.status));
                   if(code == 502){
                       $("#porukaAdm").html("Naslov ili tekst nisu ok.");
                   }
               }
            });
        }


   });
});