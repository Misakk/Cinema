<?php
include "connect.php";
include "createTable.php";
//check if seating place is empty

//function checkSeats() {
//
//}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
</head>
<body>
    <div class="wrapper">
        <div class="dashboard">
        </div>
        <br><br>
        <div class="reserve"><a class='waves-effect modal-trigger'>Reserve</a></div>

        <!-- Modal Structure -->
        <div class="form" >
            <div id="modal1" class="modal">
                <div class="modal-content">
                    <h4>Reserve your seatplace</h4>
                    <div class="row">
                        <div class="input-field col s6">
                            <input name="firstName" id="first_name2" type="text" class="validate">
                            <label class="active" for="first_name2">First Name</label>
                        </div>
                        <div class="input-field col s6">
                            <input name="lastName" id="last_name2" type="text" class="validate">
                            <label class="active" for="last_name2">Last Name</label>
                        </div>
                        <div class="input-field col s6">
                            <input name="phone" value="+374" id="text" type="text" class="validate">
                            <label class="active" for="number">Phone number</label>
                        </div>
                    </div>
                </div>
                    <div class="modal-footer">
                        <button name="submit" class="btn sub">Submit</button>
                        <a href="#!" class="modal-close waves-effect waves-green btn-flat">X</a>
                    </div>
            </div>
            <input id="hiddenVal" name="hiddenVal" type="text" style="display:none" class="hiddenVal" />
        </div>
    </div>


    <script>
        $(document).ready(function(){
            getBusyPlaces();
            // var arrr = getBusyPlaces();
            var placeId = [];
            for(var i=0; i < 20; i++) {
                $('.dashboard').append("<div id="+ i +" class='seat'></div>")
            }

            $(".seat").click(function () {
                if ($(this).css("background-color") !== 'rgb(255, 0, 0)') {
                    if ($.inArray($(this).attr('id'), placeId) === -1) {
                        $(this).css("background-color", "yellow");
                        placeId.push($(this).attr('id'));
                    } else {
                        $(this).css("background-color", "darkgreen");
                        placeId.splice($.inArray($(this).attr('id'), placeId), 1);
                    }
                }
            });

            $('.modal').modal();

            $(".reserve").click(function () {
                if (placeId.length !== 0) {
                    $('.modal').modal('open');
                    var vals = placeId.toString();
                    $(".hiddenVal").val(vals);
                }
            });
            $(".sub").click(function(){
                $.post(
                    "reserve.php",
                    {
                        firstName: $("#first_name2").val(),
                        lastName: $("#last_name2").val(),
                        phone: $("#text").val(),
                        hiddenVal: $(".hiddenVal").val()
                    },
                    function(){
                        $('.modal').modal('close');
                        placeId = [];
                        getBusyPlaces();
                    }
                );
            });


            function getBusyPlaces() {
                $.get('busyPlaces.php', function (places) {
                    var redPlaces = JSON.parse($.parseJSON(places));
                    $.each(redPlaces, function (i, redPlace) {
                        $('#' + redPlace['place']).css('background-color', 'red');
                    });
                });
            }
        });
    </script>
</body>
</html>