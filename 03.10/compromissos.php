<?php
session_start();
require_once('twig_carregar.php');
require('inc/banco.php');

if(isset($_SESSION['usuario'])){
$dados = $pdo->query('SELECT * FROM compromissos ORDER BY titulo ASC');
$comp = $dados->fetchAll(PDO::FETCH_ASSOC);

echo $twig->render('compromissos.html', [
    'titulo' => 'Compromissos',
    'compromissos' => $comp,
    'logado' => true
]);
}else{
    header('Location: login.php');
}
//  aparecer informação indicando se é final de semana
