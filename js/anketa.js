$(document).ready(function () {
    $("#sadrzajAnkete").html(anketaIspis(1));

    $(".anketa").click(function () {
        var anketa = $(this).data('id');
        $("#reset").hide();
        $("#glasanje").show();
        anketaIspis(anketa);

    });

    function anketaIspis(anketa) {
        $.ajax({
            method: "post",
            url: BASE_URL +  "/modules/anketa.php",
            dataType: "json",
            data: {
                anketa : anketa,
                send : true
            },
            success: function (data) {
                //console.log(data);
                var ispis = "";
                ispis += "<div class=\"form-group\" style=\"padding-top: 20px\">";
                ispis += "<label class=\"forma\" for=\"username\">";
                for(x in data){
                    ispis += data[x].pitanje;
                    break;
                }
                ispis += "</label>";
                ispis += "</div>";
                ispis += "<div class=\"form-group\" style=\"padding-left: 40px;\">";
                for(x in data){
                    ispis += "<label class=\"radio\">";
                    ispis += "<input type=\"radio\" name='anketa' value='"+data[x].id+"'>"+data[x].odgovor;
                    ispis += "</label>";
                }
                ispis += "</div>";
                $("#sadrzajAnkete").html(ispis);
            },
            error: function (xhr, status, error) {
                console.log(xhr.status);
            }
        });
    }

    $("#glasanje").click(function () {
        var odgovor = "";
        var radio = document.getElementsByName('anketa');
        for(x in radio){
            if(radio[x].checked){
                odgovor = radio[x].value;
                break;
            }
        }
        var korID = $("#korId").val();

        if(!odgovor){
            alert("Niste dali odgovor");
        }
        if(odgovor){
            //alert("Ekstra");
            data2 = {
                korID : korID,
                odgovor : odgovor,
                sended : true
            };
            $.ajax({
               method: "post",
               url: BASE_URL + "/modules/korisnikOdgovor.php",
               dataType: "json",
               data: data2,
               success: function (podaci) {
                   var ispis = "";
                   ispis += "<table class='table-striped'>";
                   for(x in podaci){
                       ispis+=  "<tr>";
                        ispis += "<td>"+podaci[x].odg+"</td>";
                        ispis += "<td>"+podaci[x].broj+"</td>";
                       ispis += "</tr>";
                   }
                   ispis += "</table>";
                   $("#sadrzajAnkete").html(ispis);
                   $("#glasanje").hide();
                   $("#reset").show();

               },
               error: function (xhr,status,error) {
                   console.log(xhr.status);

               }

            });

        }
    });
    $("#reset").hide();
    $("#reset").click(function () {
       anketaIspis(1);
       $("#glasanje").show();
       $("#reset").hide();
    });

});

