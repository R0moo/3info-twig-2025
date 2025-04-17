<?php

require('inc/banco.php');
require_once('twig_carregar.php');

$login = $_POST['login'] ?? null;
$senha = $_POST['senha'] ?? null;
$senha_atual = $_POST['senhaa'] ?? null;
$senha2 = $_POST['senha2'] ?? null;
$id = $_POST['id'] ?? null;

if($login && $senha && $senha_atual && $senha2){
    if($senha === $senha2){
        $dados = $pdo->prepare('SELECT senha FROM usuarios WHERE login = :login');
        $dados->bindValue(':login', $login);
        $senha_bd = $dados->fetch(PDO::FETCH_ASSOC);

        if(!password_verify($senha_atual, $senha_bd)){
            echo $twig->render('editar_usuario.html', [
                'erro' => 'Senha atual incorreta'
            ]);
        }else{
            if($senha_atual !== $senha){
            $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
            $query = $pdo->prepare('UPDATE usuarios SET login = :login, senha = :senha WHERE id =' . $id);
            $query->bindValue(':login', $login);
            $query->bindValue(':senha', $senha_hash);
            $query->execute();
            header('location:usuarios.php');
            die;
            }else{
                echo $twig->render('editar_usuario.html', [
                    'erro' => 'Senha atual igual da senha nova'
                ]);
            }

        }
    }else{
        echo $twig->render('editar_usuario.html', [
            'erro' => 'Senhas diferentes'
        ]);
    }

} else{
    echo $twig->render('editar_usuario.html', [
        'erro' => 'Preencha os campos'
    ]);
}

