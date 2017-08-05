<?php
/**
 *  * Created by PhpStorm.
 * User: Olivier Herzog
 * Date: 02/08/2017
 * Time: 13:31
 */

$sous_com_id = [];


foreach ($data as $comment){
    echo '<div class="row">';
            if ($comment->sous_com_id) {
                if (in_array($comment->sous_com_id, $sous_com_id)) {
                    echo '<div class="col s10 m10 l10 offset-s2 offset-m2 offset-l2">';
                } else {
                    echo '<div class="col s11 m11 ll1 offset-s1 offset-m1 offset-l1">';
                }
                array_push($sous_com_id,$comment->id);
            } else {
                echo '<div class="col s12 m12 l12">';
            }
                echo '<div class="card">
                      <div class="card-content">
                      <b>' . $comment->pseudo . '</b> - ' . $comment->date . '<br>
                      ' . $comment->content . '
                      </div>
                          <div class="card-action">
                          <a class="waves-effect waves-light blue btn" id="repondre" data-id="' . $comment->id . '"><i class="material-icons left">message</i>Répondre</a>
                          </div>
                       </div>
                     </div>
                    </div>
                    <div id="' . $comment->id . '"></div>
                    ';
}

