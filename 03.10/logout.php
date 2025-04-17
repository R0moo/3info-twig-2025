<?php

require('inc/banco.php');
require_once('twig_carregar.php');

session_start();
session_destroy();

header('Location: index.php');