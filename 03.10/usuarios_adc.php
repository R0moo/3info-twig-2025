<?php

require('inc/banco.php');

$login = $_POST['login'] ?? null;
$senha = $_POST['senha'] ?? null;

if($login && $senha){
    $query = $pdo->prepare('INSERT INTO usuarios (login, senha) VALUES (:login, :senha)');
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    $query->bindValue(':login', $login);
    $query->bindValue(':senha', $senha_hash);

    $query->execute();
}

header('location:usuarios.php');