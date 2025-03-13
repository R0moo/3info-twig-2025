<?php

//Carrega o carregador do Composer
require_once('vendor/autoload.php');

//Loader é quem carrega os HTML
$loader = new \Twig\Loader\FilesystemLoader('./templates');

//Criar objeto Twig
$twig = new \Twig\Environment($loader);

