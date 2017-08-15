<?php
/**
 * Created by PhpStorm.
 * User: olivier
 * Date: 2017-06-27
 * Time: 21:48
 */
// si session enabled but none exist
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
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
            padding-top: 0;
            min-height: 700px;
        }

        .card, .card-panel {
            background : white;
            transition: box-shadow .25s;
            border-radius: 10px;
        }

        .pagination li a {
            color: white;
            display: inline-block;
            font-size: 1.2rem;
            padding: 0 10px;
            line-height: 30px;
        }



        .pagitop {
            box-shadow: 0 6px 10px 0 rgba(0, 0, 0, 0.14), 0 3px 5px -1px rgba(0, 0, 0, 0.3);
            border-radius: 0 0 10px 10px;
            margin-top: 0;
        }

        .pagibot {
            box-shadow: 0 6px 10px 0 rgba(0,0,0,0.14), 0 1px 18px 0 rgba(0,0,0,0.12), 0 3px 5px -1px rgba(0,0,0,0.3);
            border-radius: 10px 10px 0 0;
            margin-top: 1px;
            margin-bottom: 0;
        }

        img.responsive-img, video.responsive-video {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 0 auto;
        }

        .comments{
            animation-duration: 0.5s;
            animation-timing-function: ease-in;
        }
        .btn-floating.btn-large {
            border: 2px solid white;
        }


    </style>
    <!--  Scripts  -->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <?= $scriptstop = isset($scriptTop) ? $scriptTop : ''; ?>

</head>
<body>

<nav class="grey" role="navigation">
    <div class="nav-wrapper container">
        <a id="logo-container" href="http://localhost/blog_ecrivain/home" class="btn-floating btn-large waves-effect waves-light grey darken-1 brand-logo">JF</a>
        <ul class="right hide-on-med-and-down">
            <li><a href="http://localhost/blog_ecrivain/home"><i class="small material-icons left orange-text text-lighten-3">home</i>Accueil</a></li>
            <?php if (isset($_SESSION['pseudonyme'])) { ?>
            <li><a class="dropdown-button" href="#!" data-activates="dropdown1"><i class="small material-icons left orange-text text-lighten-3">supervisor_account</i>Administration&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="material-icons right">arrow_drop_down</i></a></li>
            <ul id="dropdown1" class="dropdown-content">
                <li><a href="http://localhost/blog_ecrivain/ajouter_article"><i class="small material-icons left orange-text text-lighten-3">note_add</i>Ajouter un article</a></li>
                <li class="divider"></li>
                <li><a href="http://localhost/blog_ecrivain/editer_article"><i class="small material-icons left orange-text text-lighten-3">edit</i>Editer un article</a></li>
                <li class="divider"></li>
                <li><a href="http://localhost/blog_ecrivain/moderer_commentaires"><i class="small material-icons left orange-text text-lighten-3">gavel</i>Modérations des com..</a></li>
                <li class="divider"></li>
                <li><a href="http://localhost/blog_ecrivain/televerser_image"><i class="small material-icons left orange-text text-lighten-3">file_upload</i>Téléverser une image</a></li>
                <li class="divider"></li>
                <li><a href="http://localhost/blog_ecrivain/parametres"><i class="small material-icons left orange-text text-lighten-3">settings</i>Paramètres</a></li>
            </ul>
            <?php } ?>
        </ul>


        <ul id="nav-mobile" class="side-nav">
            <li><a href="http://localhost/blog_ecrivain/home"><i class="small material-icons left orange-text text-lighten-3">home</i>Accueil</a></li>
            <li class="divider"></li>
            <?php if (isset($_SESSION['pseudonyme'])) { ?>
            <li><a class="dropdown-button" href="#!" data-activates="dropdown2"><i class="small material-icons left orange-text text-lighten-3">supervisor_account</i>Administration<i class="material-icons right">arrow_drop_down</i></a></li>
            <ul id='dropdown2' class='dropdown-content'>
                <li><a href="http://localhost/blog_ecrivain/ajouter_article"><i class="small material-icons left orange-text text-lighten-3">note_add</i>Ajouter un article</a></li>
                <li class="divider"></li>
                <li><a href="http://localhost/blog_ecrivain/editer_article"><i class="small material-icons left orange-text text-lighten-3">edit</i>Editer un article</a></li>
                <li class="divider"></li>
                <li><a href="http://localhost/blog_ecrivain/moderer_commentaires"><i class="small material-icons left orange-text text-lighten-3">gavel</i>Modérations des com..</a></li>
                <li class="divider"></li>
                <li><a href="http://localhost/blog_ecrivain/televerser_image"><i class="small material-icons left orange-text text-lighten-3">file_upload</i>Téléverser une image</a></li>
                <li class="divider"></li>
                <li><a href="http://localhost/blog_ecrivain/parametres"><i class="small material-icons left orange-text text-lighten-3">settings</i>Paramètres</a></li>
            </ul>
            <?php } ?>
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




<footer class="page-footer grey darken-1">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">A propos de l'écrivain</h5>
                <p class="grey-text text-lighten-4">Un professeur nommé Laurent Mellet a écrit un premier livre au sujet de mes romansqui
                    s'appelle "Les Politiques de l'Intime",et même si j'étais un peu préoccupé à l'idée de le lire et de ce qu'il pouvait
                    dire,c'est un moment très important pour moi de découvrir que quelqu'un a trouvé dans mes romanssuffisamment
                    de matière pour rédiger une étude.Cela ajoute d'une certaine manière quelque chose à leur contenu.Mes propres souvenirs
                    de mes années à l'université, ce que je retiens de plus important de mes études,qui ont eu lieu a Cambridge dans les années
                    80,étaient l'indépendance intellectuelle, l'indépendance d'esprit, apprendre à penser par soi-même,
                    ne pas croire tout ce qui nous est dit, que ce soit par les médias,
                    le gouvernement ou les professeurs d'université.</p>


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
                        '#',
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
                echo '<a class="white-text" id="logout" href="'.$conView[0].'">
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


<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/js/materialize.min.js"></script>
<script src="http://localhost/blog_ecrivain/js/defaut.js"></script>
<?= $scripts = isset($script) ? $script : ''; ?>
</body>
</html>