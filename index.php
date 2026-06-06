<?php

require 'classes/personagem.php';
require 'classes/paladino.php';
require 'classes/ladino.php';
require 'classes/mago.php';
require 'classes/jogo.php';
require 'exceptions/energyExceptions.php';

echo "Jogador 1: escolha seu personagem";
echo "\n[1. Ladino] [2.Mago] [3. Paladino]\n";
$escolha = trim(readline("Digit o numero do seu personagem: "));

switch ($escolha) {
    case '1':
        $jogador1 = new Ladino;
        break;
    case '2':
        $jogador1 = new mago;
        break;
    case '3':
        $jogador1 = new Paladino;
        break;
    default :
        echo "escolha inválida!";
        return;
}
echo "Jogador 2: escolha seu personagem";
echo "\n[1. Ladino] [2.Mago] [3. Paladino]\n";
$escolha = trim(readline("Digit o numero do seu personagem: "));

switch ($escolha) {
    case '1':
        $jogador2 = new Ladino;
        break;
    case '2':
        $jogador2 = new mago;
        break;
    case '3':
        $jogador2 = new Paladino;
        break;
    default :
        echo "escolha inválida!";
        return;
}

$jogo = new Jogo($jogador1, $jogador2);
$jogo->iniciar();