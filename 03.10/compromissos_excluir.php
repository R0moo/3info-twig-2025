<?php

require('inc/banco.php');
require_once('twig_carregar.php');

$id = $_GET['id'] ?? null;

if($id){
    $query = $pdo->prepare('DELETE FROM compromissos WHERE id = :id');

    $query->bindValue(':id', $id);

    $query->execute();
}

header('location:compromissos.php');

