<?php

    echo '<ul>';
    foreach ($db->query('SELECT * FROM articles') as $post)  {
        echo '<li><a href="index.php?p=post&n='.$post->id.'">'. $post->titre .'</a></li>';
    }
    echo '</ul>';




