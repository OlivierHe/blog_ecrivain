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
    $result = $db->prepare('SELECT * FROM articles where id = ?', array($n));
}else {
    // fait une query avec le dernier id
    $result =  $db->query('SELECT * FROM articles ORDER BY id DESC LIMIT 1');
}

echo '<div class="row">
        <div class="col s12 m12 l12">
          <div class="card">
            <div class="card-content">
              <span class="card-title"><h4>'.$result[0]->titre.'</h4></span>
              <blockquote>'.$result[0]->contenu.'</blockquote>
            </div>
          </div>
        </div>
      </div>';