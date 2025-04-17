<?php

require('inc/banco.php');
require_once('twig_carregar.php');

$item = $_POST['item'] ?? null;
$id = $_POST['id'] ?? null;

if($item){
    $query = $pdo->prepare('UPDATE compras SET item = :item WHERE id =' . $id);

    $query->bindValue(':item', $item);

    $query->execute();
}

header('location:compras.php');
