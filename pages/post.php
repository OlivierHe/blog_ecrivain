<?php
/**
 * Created by PhpStorm.
 * User: MiniTarlouf
 * Date: 04/07/2017
 * Time: 13:37
 */

if (isset($_GET['n']) && $_GET['n'] !== '') {
    $n = $_GET['n'];
    // fait une query avec l'id envoyé en param
    $result = $db->query('SELECT * FROM articles where id ='.$n);
}else {
    // fait une query avec le dernier id
    $result =  $db->query('SELECT * FROM articles ORDER BY id DESC LIMIT 1');
}

echo '<div class="row">
        <div class="col s12 m12 l12">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">'.$result[0]->titre.'</span>
              <p>'.$result[0]->contenu.'</p>
            </div>
          </div>
        </div>
      </div>';