<?php
/**
 * Created by PhpStorm.
 * User: olivier
 * Date: 2017-06-27
 * Time: 21:48
 */
session_start();
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
        body {
            background-image: url("http://localhost/blog_ecrivain/img/nome_alaska.jpg");
            background-attachment: fixed;
        }

        .section {
            min-height: 700px;
        }
        /*.parallax-container {
          height: 300px;
        }*/

        .card, .card-panel {
            background : white;
            transition: box-shadow .25s;
            border-radius: 10px;
        }

        .comments{
            animation-duration: 0.5s;
            animation-timing-function: ease-in;
        }
        .btn-floating.btn-large {
            border: 2px solid white;
        }


    </style>


</head>
<body>
<nav class="grey" role="navigation">
    <div class="nav-wrapper container">
        <a id="logo-container" href="http://localhost/blog_ecrivain/home" class="btn-floating btn-large waves-effect waves-light grey darken-1 brand-logo">JF</a>
        <ul class="right hide-on-med-and-down">
            <li><a href="http://localhost/blog_ecrivain/home"><i class="small material-icons left orange-text text-lighten-3">home</i>Accueil</a></li>
        </ul>

        <ul id="nav-mobile" class="side-nav">
            <li><a href="http://localhost/blog_ecrivain/home"><i class="small material-icons left">home</i>Accueil</a></li>
        </ul>
        <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
</nav>
<!--<div class="parallax-container">
        <div class="parallax"><img src="http://localhost/blog_ecrivain/img/nome_alaska.jpg"></div>
</div>-->
<div class="section no-pad-bot" id="index-banner">
    <div class="container">
        <!--  short hand pour echo-->
        <?= $content ?>

        <div class="comments">
        </div>


    </div>
</div>




<footer class="page-footer grey darken-1">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">A propos de l'écrivain</h5>
                <p class="grey-text text-lighten-4">We are a team of college students working on this project like it's our full time job. Any amount would help support and continue development on this project and is greatly appreciated.</p>


            </div>
            <div class="col l3 s12">
                <h5 class="white-text">Articles</h5>
                <ul>
                    <li><a class="white-text" href="#!">Link 1</a></li>
                </ul>
            </div>
            <div class="col l3 s12">
                <?php
                $conView;

                if (isset($_SESSION['pseudonyme'])) {
                    $conView = [
                        'http://localhost/blog_ecrivain/login_out',
                        'exit_to_app',
                        'Deconnexion'
                    ];
                } else {
                    $conView = [
                        'http://localhost/blog_ecrivain/login_view',
                        'lock',
                        'Connexion'
                    ];
                }
                echo '<a class="white-text" href="'.$conView[0].'">
                        <h5><i class="small material-icons left orange-text text-lighten-3">'.$conView[1].'</i>'.$conView[2].'</h5>
                      </a>';
                ?>

            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            Made with <a class="orange-text text-lighten-3" href="http://materializecss.com">Materialize</a> By <span class="orange-text text-lighten-3">Olivier Herzog</span>
        </div>
    </div>
</footer>

<!--  Scripts  -->
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/js/materialize.min.js"></script>
<script type="text/javascript">
    $(function() {
        $(".button-collapse").sideNav({
            closeOnClick: true
        });
    });
</script>
<?= $scripts = isset($script) ? $script : ''; ?>
</body>
</html>