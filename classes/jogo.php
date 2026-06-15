<?php
class Jogo
{
    private Personagem $jogador1;
    private Personagem $jogador2;
    private int $turno = 1;
    public function __construct(Personagem $jogador1, Personagem $jogador2)
    {
        $this->jogador1 = $jogador1;
        $this->jogador2 = $jogador2;
    }

    public function iniciar(): void
    {
        while ($this->jogador1->getVida() > 0 && $this->jogador2->getVida() > 0) {
            $this->aplicarVeneno();
            $this->exibirStatus();
            if ($this->verificarVitoria()) {
                break;
            };
            $this->executarTurno();
            Visual::separador();
            if ($this->verificarVitoria()) {
                break;
            };
            $this->turno++;
        }
    }


    private function executarTurno(): void
    {
        $jogadorAtivo = ($this->turno % 2 !== 0) ? $this->jogador1 : $this->jogador2;
        $jogadorAlvo = ($jogadorAtivo === $this->jogador1) ? $this->jogador2 : $this->jogador1;
        $jogadorAtivo->limparDefesaBonus();
        $energiaRecuperada = $jogadorAtivo->regenerarEnergia();

        if ($energiaRecuperada > 0) {
            echo "{$jogadorAtivo->getNome()} recuperou \033[32m{$energiaRecuperada}\033[0m de energia.\n";
        }

        $acaoExecutada = false;

        do {
            Visual::exibirMenu($jogadorAtivo);
            $acao = trim(readline("O que {$jogadorAtivo->getNome()} deseja fazer? "));

            if (!in_array($acao, ['1', '2', '3'])) {
                echo "Ação inválida! Tente novamente.\n";
                continue;
            }

            switch ($acao) {
                case '1':
                    echo $jogadorAtivo->atacar($jogadorAlvo), PHP_EOL;
                    $acaoExecutada = true;
                    break;
                case '2':
                    echo $jogadorAtivo->defender(), PHP_EOL;
                    $acaoExecutada = true;
                    break;
                case '3':
                    try {
                        echo $jogadorAtivo->usarHabilidade($jogadorAlvo), PHP_EOL;
                        $acaoExecutada = true;
                    } catch (EnergyException $e) {
                        echo $e->getMessage(), PHP_EOL;
                        echo "Escolha outra ação.\n";
                    }
                    break;
            }
        } while (!$acaoExecutada);
    }
    private function verificarVitoria(): bool
    {
        if ($this->jogador1->getVida() <= 0) {
            Visual::exibirResumoFinal($this->jogador2, $this->jogador1, $this->turno);
            return true;
        }
        if ($this->jogador2->getVida() <= 0) {
            Visual::exibirResumoFinal($this->jogador1, $this->jogador2, $this->turno);
            return true;
        }
        return false;
    }

    private function aplicarVeneno(): void
    {
        foreach ([$this->jogador1, $this->jogador2] as $jogador) {
            if ($jogador->getStackVeneno() > 0) {
                $dano = (int)($jogador->getVidaMax() * 0.1 * $jogador->getStackVeneno());
                $danoCausado = $jogador->receberDano($dano, true);
                echo "{$jogador->getNome()} sofreu \033[34m{$danoCausado}\033[0m de dano por veneno!\n";
            }
        }
    }
    private function exibirStatus(): void
    {
        Visual::exibirStatus($this->jogador1, $this->jogador2);
    }
};
