<?php

require('inc/banco.php');
require_once('twig_carregar.php');

$dados = $pdo->query('SELECT * FROM compras WHERE id = ' . $_GET['id']);

$comp = $dados->fetch(PDO::FETCH_ASSOC);

echo $twig->render('editar.html', [
    'titulo' => 'Compras',
    'item' => $comp
]);

