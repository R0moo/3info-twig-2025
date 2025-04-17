<?php

require('inc/banco.php');
require_once('twig_carregar.php');

$titulo = $_POST['titulo'] ?? null;
$tempo = $_POST['tempo'] ?? null;
$id = $_POST['id'] ?? null;

if($titulo && $tempo){
    $query = $pdo->prepare('UPDATE compromissos SET titulo = :titulo, tempo = :tempo WHERE id =' . $id);

    $query->bindValue(':titulo', $titulo);
    $query->bindValue(':tempo', $tempo);

    $query->execute();
}

header('location:compromissos.php');