<?php

require_once('vendor/autoload.php');
require('inc/banco.php');
date_default_timezone_set('America/Sao_Paulo');

use Carbon\Carbon;

$titulo = $_POST['titulo'] ?? null;
$tempo = $_POST['tempo'] ?? null;


if($titulo && $tempo){
    $query = $pdo->prepare('INSERT INTO compromissos (titulo, tempo) VALUES (:titulo, :tempo)');

    $query->bindValue(':titulo', $titulo);
    $query->bindValue(':tempo', $tempo);

    $query->execute();
}

header('location:compromissos.php');