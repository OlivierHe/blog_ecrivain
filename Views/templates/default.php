<?php
/**
 * Created by PhpStorm.
 * User: olivier
 * Date: 2017-06-27
 * Time: 21:48
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <title>Starter Template - Materialize</title>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/css/materialize.min.css">

    <style type="text/css">
        .card, .card-panel {
            background-color: unset;
            transition: box-shadow .25s;
            border-radius: 10px;
        }
        .comments{
            animation-duration: 0.5s;
            animation-timing-function: ease-in;
        }
    </style>


</head>
<body>
<nav class="light-blue lighten-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">JF</a>
        <ul class="right hide-on-med-and-down">
            <li><a href="#">Navbar Link</a></li>
        </ul>

        <ul id="nav-mobile" class="side-nav">
            <li><a href="#">Navbar Link</a></li>
        </ul>
        <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
</nav>
<div class="section no-pad-bot" id="index-banner">
    <div class="container">
<!--  short hand pour echo-->
       <?= $content ?>
        <div class="comments">
        </div>
    </div>
</div>




<footer class="page-footer orange">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">Company Bio</h5>
                <p class="grey-text text-lighten-4">We are a team of college students working on this project like it's our full time job. Any amount would help support and continue development on this project and is greatly appreciated.</p>


            </div>
            <div class="col l3 s12">
                <h5 class="white-text">Settings</h5>
                <ul>
                    <li><a class="white-text" href="#!">Link 1</a></li>
                    <li><a class="white-text" href="#!">Link 2</a></li>
                    <li><a class="white-text" href="#!">Link 3</a></li>
                    <li><a class="white-text" href="#!">Link 4</a></li>
                </ul>
            </div>
            <div class="col l3 s12">
                <h5 class="white-text">Connect</h5>
                <ul>
                    <li><a class="white-text" href="#!">Link 1</a></li>
                    <li><a class="white-text" href="#!">Link 2</a></li>
                    <li><a class="white-text" href="#!">Link 3</a></li>
                    <li><a class="white-text" href="#!">Link 4</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            Made by <a class="orange-text text-lighten-3" href="http://materializecss.com">Materialize</a>
        </div>
    </div>
</footer>

<!--  Scripts-->
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/js/materialize.min.js"></script>
<script>
    $(document).ready(function(){
        $uri = $(location).attr('pathname');
        $re = /([a-z_]+)(?:\/)([0-9]+)$/mg;
        $idPost = $re.exec($uri)[2];
        $insCom = '<div id="insert_comments">'
            +'<div class="card-panel">'
            +'<div class="input-field">'
            +'<input id="sous_com" type="hidden" value="0">'
            +'</div>'
            +'<div class="row">'
            +'<div class="input-field col s6">'
            +'<input id="pseudo" type="text" class="validate">'
            +'<label for="pseudo">Pseudonyme</label>'
            +'</div>'
            +'<div class="input-field col s6">'
            +'<input id="email" type="email" class="validate">'
            +'<label for="email" data-error="valeur erronée">Courriel</label>'
            +'</div>'
            +'</div>'
            +'<div class="row">'
            +'<div class="input-field col s12">'
            +'<textarea id="comment" class="materialize-textarea validate" ></textarea>'
            +'<label for="comment">Commentaire</label>'
            +'</div>'
            +'<br>'
            +'<a class="waves-effect waves-light blue btn" id="send_com"><i class="material-icons left">message</i>Ajouter un commentaire</a>'
        +'</div>'
        +'</div>'
            +'</div>';

        console.log($idPost);

        function append(elem){
            $id = $(elem).attr("data-id");
            if (!$("#insert_comments").length) {
                $($insCom).appendTo($('#'+$id));
                $("#sous_com").val($id);
            }
        }

        function view_com() {
            $.get("http://localhost/blog_ecrivain/view_comment/" + $idPost,
                function (data) {
                    $( ".comments" ).html( data ).hide().fadeIn("slow");
                });
        }

        function insert_com() {
            console.log("dans insert com");
            if (typeof $("#comment.validate.valid").val() === "undefined") {
                Materialize.toast('Vous devez remplir un message !', 3000, 'rounded red');
                return;
            }
            if (typeof $("#pseudo.validate.valid").val() === "undefined") {
                Materialize.toast('Vous devez remplir le pseudonyme !', 3000, 'rounded red');
                return;
            }
            if (typeof $("#email.validate.valid").val() === "undefined") {
                Materialize.toast('L\'adresse email n\'est pas valide !', 3000, 'rounded red');
                return;
            }

            $.post("http://localhost/blog_ecrivain/insert_comment/" + $idPost,
                {
                    sous_com: $("#sous_com").val(),
                    pseudo: $("#pseudo").val(),
                    email: $("#email").val(),
                    comment: $("#comment").val(),
                    ip_addr: $("#ip_addr").val()
                },
                function (data, status) {
                    Materialize.toast(data, 3000, 'rounded green');
                    view_com();
                    $("#insert_comments").remove();
                });
        }
        view_com();

        $(".container").on("click", "#repondre", function (){
            $("#insert_comments").remove();
           append($(this));
        });

        $(".container").on("click", "#send_com", function (){
            insert_com();
        });


    });
</script>
</body>
</html>