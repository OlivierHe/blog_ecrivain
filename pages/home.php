
<h1> je suis la home page</h1>
<?php

$pdo = new PDO('mysql:dbname=blog_ecrivain;host=localhost','root','');
$count = $pdo->exec('INSERT INTO articles SET titre="Mon Titre", date="'.date('Y-m-d H:i:s').'"');
var_dump($count);