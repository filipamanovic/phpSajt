$(document).ready(function () {
    $(".deleteKor").click(function () {
        var idKor = $(this).data('id');
        //alert(idKor);
        obj = {
            idKor: idKor,
            uspesno: true
        };
        $.ajax({
            method: "post",
            url: "views/korisnici/delete.php",
            data: obj,
            success: function (podaci) {
                $("#odgovor").html(podaci);
            },
            error: function (xhr, status, error) {
                console.log(xhr.status);
            }
        });
    });

    var idKor = window.location.href.substr(window.location.href.lastIndexOf('=')+1);

    $("#blabla").click(function () {
        //alert(idKor);
        var obj = {
            idKor: idKor,
            uspesno2: true
        };
        $.ajax({
            method: "post",
            url: "modules/korisnici/update.php",
            data: obj,
            success: function (podaci) {
                //console.log(podaci);
                $("#updateIme").val(podaci.ime);
                $("#updatePrezime").val(podaci.prezime);
                $("#updateKorIme").val(podaci.korIme);
                $("#updatePass").val(podaci.password);
                $("#updateEmail").val(podaci.email);
                $("input[id='polM']").removeAttr('checked');
                $("input[id='polZ']").removeAttr('checked');
                if(podaci.pol == "musko"){
                    $("input[id='polM']").prop('checked', true);
                    $("input[id='polM']").val(podaci.pol);
                }else{
                    $("input[id='polZ']").prop('checked', true);
                    $("input[id='polZ']").val(podaci.pol);
                };
                $("input[name='aktivan']").removeAttr('checked');
                if(podaci.aktivan == 1){
                    $("input[name='aktivan']").prop('checked', true);
                    $("input[name='aktivan']").val(podaci.aktivan);
                };
                $("#uloga").val(podaci.uloga_id);
                $("#hiddenID").val(podaci.id);
            },
            error: function (xhr, status, error) {
                console.log(xhr.status);
            }
        });
    });





});











