<?php

require 'classes/personagem.php';
require 'classes/paladino.php';
require 'classes/assassino.php';
require 'classes/mago.php';
require 'classes/visual.php';
require 'classes/jogo.php';
require 'exceptions/energyExceptions.php';

echo "Jogador 1: escolha seu personagem";
echo "\n[1. Assassino] [2. Mago] [3. Paladino]\n";
$escolha = trim(readline("Digite o numero do seu personagem: "));
Visual::separador();

switch ($escolha) {
    case '1':
        $jogador1 = new Assassino;
        break;
    case '2':
        $jogador1 = new Mago;
        break;
    case '3':
        $jogador1 = new Paladino;
        break;
    default:
        echo "Escolha inválida!";
        return;
}

echo "Jogador 2: escolha seu personagem";
echo "\n[1. Assassino] [2. Mago] [3. Paladino]\n";
$escolha = trim(readline("Digite o numero do seu personagem: "));
Visual::separador();
switch ($escolha) {
    case '1':
        $jogador2 = new Assassino;
        break;
    case '2':
        $jogador2 = new Mago;
        break;
    case '3':
        $jogador2 = new Paladino;
        break;
    default:
        echo "Escolha inválida!";
        return;
}

$jogo = new Jogo($jogador1, $jogador2);
$jogo->iniciar();
