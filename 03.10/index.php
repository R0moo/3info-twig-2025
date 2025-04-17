<?php
session_start();
//Carrega o carregador do Twig

require_once('twig_carregar.php');

//Mostra o template
if(isset($_SESSION['usuario'])){
    echo $twig->render('index.html', [
    'fruta' => 'Abacaxi',
    'usuario' => $_SESSION['usuario']['login'],
    'logado' => true
]);
}else{
    header('Location: login.php');
}
