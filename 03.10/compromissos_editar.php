<?php

require('inc/banco.php');
require_once('twig_carregar.php');

$dados = $pdo->query('SELECT * FROM compromissos WHERE id = ' . $_GET['id']);

$comp = $dados->fetch(PDO::FETCH_ASSOC);

echo $twig->render('editar.html', [
    'titulo' => 'Compromissos',
    'compromisso' => $comp
]);

