<?php

//Carrega o carregador do Twig

require_once('twig_carregar.php');

//Mostra o template
if(isset($_SESSION['usuario']) && $logado){
    echo $twig->render('index.html', [
    'fruta' => 'Abacaxi',
]);
}else{
    header('Location: login.php');
}
