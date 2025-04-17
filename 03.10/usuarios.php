<?php

session_start();
require_once('twig_carregar.php');
require('inc/banco.php');

if(isset($_SESSION['usuario'])){
$dados = $pdo->query('SELECT * FROM usuarios');
$user = $dados->fetchAll(PDO::FETCH_ASSOC);

echo $twig->render('usuarios.html', [
    'titulo' => 'Usuários',
    'usuarios' => $user,
    'logado' => true
]);
} else{
    header('Location: login.php');
}