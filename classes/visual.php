<?php

class Visual
{
    public static function exibirStatus(Personagem $jogador1, Personagem $jogador2): void
    {
        echo "\n--- Status dos Jogadores ---\n";
        self::exibirStatusPersonagem($jogador1);

        self::exibirStatusPersonagem($jogador2);
    }

    private static function exibirStatusPersonagem(Personagem $personagem): void
    {
        echo "=== Status de {$personagem->getNome()} ===\n";
        echo "Vida: {$personagem->getVida()}/{$personagem->getVidaMax()}\n";
        echo "Energia: {$personagem->getEnergia()}/{$personagem->getEnergiaMax()}\n";
        echo "Força: {$personagem->getForca()}\n";
        echo "Defesa: {$personagem->getDefesa()} (+{$personagem->getDefesaBonus()})\n";

        if ($personagem->getStackVeneno() > 0) {
            echo "Stack de Veneno: {$personagem->getStackVeneno()}\n";
        }

        echo "=========================\n";
    }
}
