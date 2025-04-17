<?php

require('inc/banco.php');
require_once('twig_carregar.php');

$login = $_POST['login'] ?? null;
$senha = $_POST['senha'] ?? null;

if($login && $senha){

    $query = $pdo->prepare('SELECT * FROM usuarios WHERE login = :login');
    $query->bindValue(':login', $login);
    $query->execute();

    $user = $query->fetch(PDO::FETCH_ASSOC);

    if(!empty($user)){
        if(password_verify($senha ,$user['senha'])){
            session_start();
            $_SESSION['usuario'] = ['login' => $login, 'senha' => $senha];
            header('Location: index.php');
        }else{
            echo $twig->render('login.html', [
                'erro' => 'Senha incorreta'
            ]);
        }
    }else{
        echo $twig->render('login.html', [
            'erro' => 'Usuário ou senha incorretos'
        ]);
    }

}else{
    echo $twig->render('login.html', [
        'erro' => 'Preencha todos os campos'
    ]);
}

