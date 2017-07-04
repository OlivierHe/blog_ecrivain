<?php


    foreach ($db->query('SELECT id, titre, LEFT (contenu, 300) AS contenu FROM articles') as $post)  {

            echo '<div class="row">
                    <div class="col s12 m12 l12">
                      <div class="card">
                        <div class="card-content">
                          <span class="card-title"><h4>'. $post->titre .'</h4></span>
                            <blockquote>
                            '.$post->contenu.'...
                            </blockquote>
                            <div class="card-action">
                                <a href="index.php?p=post&n='.$post->id.'">Voir le contenu</a>
                            </div>
                         </div>
                        </div>
                     </div>
                    </div>
                    ';

    }





