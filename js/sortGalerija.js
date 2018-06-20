$(document).ready(function () {
    $("#sortSlike").click(function () {
       //alert("Kliknuto");
        var ddlSort = document.getElementById('ddlSortGalerija');
        var selektovano = document.getElementById('ddlSortGalerija').selectedIndex;
        var izabrano = ddlSort.options[selektovano].value;
        //alert(izabrano);
        var prvih16 = "";
        var chb16 = document.getElementById('prvih16');
        if(chb16.checked == true){
            prvih16 = chb16.value;
        }else {
            prvih16 = "ne";
        }
        if(izabrano == 0){
            alert("Izaberite sortiranje..");
        }else{
            var data = {
                izabrano : izabrano,
                prvih16 : prvih16,
                poslato: true
            };
            $.ajax({
                method: "post",
                url: BASE_URL + "/modules/sortGalerija.php",
                dataType: "json",
                data: data,
                success: function (data) {
                    console.log(data);
                    var ispis = "";
                    ispis += "<div class=\"col-xs-12 col-sm-6\" id=\"slider-thumbs\">";
                    ispis += "<ul class=\"hide-bullets\">";
                    var brojac = 0;
                    for(x in data){
                        ispis += "<li class=\"col-sm-3\">";
                            ispis += "<a class=\"thumbnail\" id=\"carousel-selector-"+brojac+"\">";
                                ispis += "<img src='"+data[x].src+"'alt='"+data[x].alt+" 'width='150px' height='150px'/>";
                            ispis += "</a>";
                        ispis += "</li>";
                        brojac ++;
                    }
                    ispis += "</ul>";
                    ispis += "</div>";
                    ispis += "<div class=\"col-sm-6\">";
                        ispis += "<div class=\"col-xs-12\" id=\"slider\">";
                            ispis += "<div class=\"row\">";
                                ispis += "<div class=\"col-sm-12\" id=\"carousel-bounding-box\">";
                                    ispis += "<div class=\"carousel slide\" id=\"myCarousel\">";
                                        ispis += "<div class=\"carousel-inner\">";
                                        var brojac2 = 0;
                                        for(y in data){
                                            if(brojac2 == 0) {
                                                ispis += "<div class=\"active item\" data-slide-number=" + brojac2 + ">";
                                                ispis += "<img src='" + data[y].src + "'alt='" + data[y].alt + "'/>";
                                                ispis += "</div>";
                                            }else{
                                                ispis += "<div class=\"item\" data-slide-number=" + brojac2 + ">";
                                                ispis += "<img src='" + data[y].src + "'alt='" + data[y].alt + "'/>";
                                                ispis += "</div>";
                                            }
                                            brojac2 ++;
                                        }
                                        ispis += "</div>";
                                        ispis += "<a class=\"left carousel-control\" href=\"#myCarousel\" role=\"button\" data-slide=\"prev\">";
                                        ispis += "<span class=\"glyphicon glyphicon-chevron-left\"></span>";
                                        ispis += "</a>";
                                        ispis += "<a class=\"right carousel-control\" href=\"#myCarousel\" role=\"button\" data-slide=\"next\">";
                                        ispis += "<span class=\"glyphicon glyphicon-chevron-right\"></span>";
                                        ispis += "</a>";
                                    ispis += "</div>";
                                ispis += "</div>";
                            ispis += "</div>";
                        ispis += "</div>";
                    ispis += "</div>";
                    $("#sortGalerija").html(ispis);
                },
                error: function (xhr, status, error) {
                    console.log(xhr.status);
                }
            });
        }


    });
});