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
    <!-- script -->
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=6wicdj8y1mi3113p0g6beirmspruhjakl7yy45q8g3y2qqg7"></script>
    <script>
        tinymce.init({
            selector: 'div#tinymce',
            language_url: 'js/tiny_mce/langs/fr_FR.js',
            skin_url: "css/jftinymceskin",
            plugins: [
                "advlist autolink autosave link image lists charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                "table contextmenu directionality emoticons template textcolor paste textcolor colorpicker textpattern"
            ],
            toolbar1: "| undo redo | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | styleselect formatselect",
            toolbar2: "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote  | insertdatetime preview | forecolor backcolor",
            toolbar3: "table | hr removeformat | charmap emoticons | print fullscreen | ltr rtl | visualchars visualblocks nonbreaking pagebreak restoredraft",
            menubar: false
        });
    </script>

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
        $("#send_com").click(function(){
            //console.log($(location).attr('search'));
            // $.post("reflect.php",
            //+$(location).attr('search')
           $.post("index.php"+$(location).attr('search'),
                {
                    pseudo: $("#pseudo.validate.valid").val(),
                    email: $("#email.validate.valid").val(),
                    comment: tinyMCE.activeEditor.getContent()
                },
                function(data,status){
                console.log("Data: " + data + "\nStatus: " + status);
            });
        });
    });
</script>
</body>
</html>