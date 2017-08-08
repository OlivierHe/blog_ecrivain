<?php

    foreach ($data as $post)  {

            echo '<div class="row">
                    <div class="col s12 m12 l12">
                      <div class="card">
                        <div class="card-content">
                          <span class="card-title"><h4>'. $post->titre .'</h4></span>
                            <blockquote>
                            '.$post->contenu.'...
                            </blockquote>
                            <div class="card-Action">
                                <a href="show_post/'.$post->id.'">Lire l\'article</a>
                            </div>
                         </div>
                        </div>
                     </div>
                    </div>
                    ';

    }





