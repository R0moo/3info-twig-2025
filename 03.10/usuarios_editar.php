<?php

require('inc/banco.php');
require_once('twig_carregar.php');

$dados = $pdo->query('SELECT * FROM usuarios WHERE id = ' . $_GET['id']);

$user = $dados->fetch(PDO::FETCH_ASSOC);

echo $twig->render('editar_usuario.html', [
    'titulo' => 'Usuarios',
    'user' => $user
]);

