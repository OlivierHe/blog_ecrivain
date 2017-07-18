<?php
/**
 * Created by PhpStorm.
 * User: MiniTarlouf
 * Date: 04/07/2017
 * Time: 13:37
 */

echo '<div class="row">
        <div class="col s12 m12 l12">
          <div class="card">
            <div class="card-content">
              <span class="card-title"><h4>'.$data[0]->titre.'</h4></span>
              <blockquote>'.$data[0]->contenu.'</blockquote>
            </div>
          </div>
          </div>
      </div>
      <div class="row">
          <div class="input-field col s6">
              <input id="pseudo" type="text" class="validate">
              <label for="pseudo">Pseudonyme</label>
          </div>
          <div class="input-field col s6">
              <input id="email" type="email" class="validate">
              <label for="email">Courriel</label>
          </div>
      </div>
      <div class="row">
        <div id="tinymce">
        </div>
        <br>
        <a class="waves-effect waves-light blue btn" id="send_com"><i class="material-icons left">message</i>Ajouter un commentaire</a>
      </div>
      ';