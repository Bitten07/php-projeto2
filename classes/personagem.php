<?php

abstract class personagem {
    protected int $vida;
    protected int $vidaMax;
    protected int $forca;
    protected int $defesa;
    protected int $energia;
    protected int $energiaMax;
    public const DANO_MINIMO = 0;

    public function __construct(int $vida, int $forca, int $defesa, int $energia) {
        $this->vida       = $vida;
        $this->vidaMax    = $vida;
        $this->forca      = $forca;
        $this->defesa     = $defesa;
        $this->energia    = $energia;
        $this->energiaMax = $energia;
    }

    public function getVidaMax(): int {
        return $this ->vidaMax;
    }
    public function getVida(): int {
        return $this->vida;
    }
    public function getForca(): int {
        return $this->forca;
    }
    public function getDefesa(): int {
        return $this->defesa;
    }
    public function getEnergiaMax(): int {
        return $this->energiaMax;
    }
    public function getEnergia(): int {
        return $this->energia;
    }

    abstract public function atacar();
    abstract public function defender();
    abstract public function usarHabilidade();

}