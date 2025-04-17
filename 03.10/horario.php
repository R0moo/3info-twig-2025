<?php
session_start();
require('twig_carregar.php');
date_default_timezone_set('America/Sao_Paulo');

use Carbon\Carbon;

// Montar página no twig chamada Horario; deverá mostrar a data de hoje e a data de amanha.
if(isset($_SESSION['usuario'])){
$atual = Carbon::now();

$amanha = Carbon::now()->addDay();
//Mostra o template
echo $twig->render('horario.html', [
    'atual' => $atual->format('d-m-Y'),
    'amanha' => $amanha->format('d-m-Y'),
    'logado' => true
]);
}else{
    header('Location:login.php');
}