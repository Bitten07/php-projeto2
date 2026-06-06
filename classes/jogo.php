<?php

class Jogo {
    private Personagem $jogador1;
    private Personagem $jogador2;
    private int $turno = 1;
    public function __construct(Personagem $jogador1, Personagem $jogador2) {
        $this->jogador1 = $jogador1;
        $this->jogador2 = $jogador2;
    }

    public function iniciar(): void {
        while ($this->jogador1->getVida() > 0 && $this->jogador2->getVida() > 0) {
            $this->exibirStatus();
            $this->aplicarVeneno();
            if ($this->verificarVitoria()) {
                break;
            };
            $this->executarTurno();
            if ($this->verificarVitoria()){ 
                break;
            };
                $this->turno++;
        }
    }

    private function exibirMenu(Personagem $jogador): void {
        echo "\n--- Vez do {$jogador->getNome()} ---\n";
        echo "[1. Atacar] [2. Defender] [3. Usar Habilidade]\n";
    }

    private function executarTurno(): void {
        $jogadorAtivo = ($this->turno % 2 !== 0) ? $this->jogador1 : $this->jogador2;
        $jogadorAlvo = ($jogadorAtivo === $this->jogador1) ? $this->jogador2 : $this->jogador1;

        do {
            $this->exibirMenu($jogadorAtivo);
            $acao = trim(readline("O que {$jogadorAtivo->getNome()} deseja fazer? "));
            
            if (!in_array($acao, ['1', '2', '3'])) {
                echo "Ação inválida! Tente novamente.\n";
            }
        } while (!in_array($acao, ['1', '2', '3']));

        switch ($acao) {
            case '1':
                echo $jogadorAtivo->atacar($jogadorAlvo), PHP_EOL;
                break;
            case '2':
                echo $jogadorAtivo->defender(), PHP_EOL;
                break;
            case '3':
                try {
                    echo $jogadorAtivo->usarHabilidade($jogadorAlvo), PHP_EOL;
                } catch (energyException $e) {
                    echo $e->getMessage(), PHP_EOL;
                }
                break;
            default:
                echo "Ação inválida! Tente novamente.", PHP_EOL;
                $this->executarTurno();
                break;
        }

    }
    private function verificarVitoria(): bool{
        if ($this->jogador1->getVida() <= 0) {
            echo "{$this->jogador2->getNome()} venceu!", PHP_EOL;
            return true;
        }
        if ($this->jogador2->getVida() <= 0) {
            echo "{$this->jogador1->getNome()} venceu!", PHP_EOL;
            return true;
        }
        return false;
    } 

    private function aplicarVeneno(): void {
        foreach ([$this->jogador1, $this->jogador2] as $jogador) {
            if ($jogador->getStackVeneno() > 0) {
                $dano = (int)($jogador->getVidaMax() * 0.02 * $jogador->getStackVeneno());
                $jogador->receberDano($dano);
                echo "{$jogador->getNome()} sofreu $dano de dano por veneno!\n";
            }
        }
    }
    private function exibirStatus(): void {
        echo "\n--- Status dos Jogadores ---\n";
        echo "{$this->jogador1->getNome()}: Vida: {$this->jogador1->getVida()}/{$this->jogador1->getVidaMax()} | Energia: {$this->jogador1->getEnergia()}/{$this->jogador1->getEnergiaMax()}\n";
        echo "{$this->jogador2->getNome()}: Vida: {$this->jogador2->getVida()}/{$this->jogador2->getVidaMax()} | Energia: {$this->jogador2->getEnergia()}/{$this->jogador2->getEnergiaMax()}\n";
    }

};