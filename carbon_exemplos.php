<?php

require_once('twig_carregar.php');
date_default_timezone_set('America/Sao_Paulo');

use Carbon\Carbon;

//Agora
echo Carbon::now() . ' -- Data de agora <br>';

//Mais um dia
echo Carbon::now()->addDay() . " -- Mais um dia <br>";

//Menos uma semana
echo Carbon::now()->subWeek() . " -- Menos uma semana <br>";

//Adiciona 4 anos
echo 'Próximas olimpíadas: ';
echo Carbon::createFromDate(2024)->addYears(4)->year . "<br>";

echo 'Sua idade é: ' . Carbon::createFromDate(2007, 12, 2)->age . "<br>";

//Final de Semana?

if(Carbon::now()->isWeekend()){
    echo 'FESTA UHUULLLLL';
}else{
    echo 'Torcedores calma';
}
echo '<br>';

//Diferença entre datas
$nascimento = Carbon::createFromDate(2007, 12, 2);
echo 'Diferença de data: ' . Carbon::now()->diff($nascimento);
