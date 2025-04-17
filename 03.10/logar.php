<?php

require('inc/banco.php');
require_once('twig_carregar.php');
$login = $_POST['login'];
$senha = $_POST['senha'];


if(isset($login) && isset($senha)){

    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    $query = $pdo->prepare('SELECT * FROM usuarios WHERE login = :login');
    $query->bindValue(':login', $login);
    $query->execute();

    $dadosfetch = $query->fetch(PDO::FETCH_ASSOC);

    var_dump($senha);
    var_dump($senha_hash);
    var_dump($dadosfetch['senha']);
    die();
    if($dadosfetch){
    if(password_verify($senha, $dadosfetch['senha'])){
        session_start();
        $_SESSION['usuario'] = ['login' => $login, 'senha' => $senha_hash];

        header('Location: index.php');
    }else{
        echo $twig->render('login.html', [
            'erro' => 'senha incorreta',
        ]);
    }
    }else{
        echo $twig->render('login.html', [
            'erro' => 'não sei',
        ]);
    }
}else{
    echo $twig->render('login.html', [
        'erro' => 'Inputs em branco',
    ]);
}