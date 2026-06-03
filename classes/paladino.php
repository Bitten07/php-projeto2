<?php

class Paladino extends Personagem
{

    public function __construct()
    {
        parent::__construct(
            vida: 200,
            forca: 25,
            defesa: 30,
            energia: 60
        );
    }

    public function atacar()
    {
        $dano = max(self::DANO_MINIMO, $this->forca - rand(0, 10));
        return "Paladino atacou causando $dano de dano!";
    }
    public function defender()
    {
        $defesa = $this->defesa + rand(0, 5);
        return "Paladino defendeu aumentando sua defesa para $defesa!";
    }
    public function usarHabilidade()
    {
        if ($this->energia >= 40) {
            $this->energia -= 40;
            if ($this->vida >= (($this->vidaMax * 80) / 100)) {
                $cura = (($this->vidaMax * 10) / 100);
                $this->vida = min($this->vida + $cura, $this->vidaMax);
                return "Paladino usou Bênção Sagrada e curou $cura de vida!";
            } else if ($this->vida >= (($this->vidaMax * 50) / 100) && $this->vida < (($this->vidaMax * 80) / 100)) {
                $cura = (($this->vidaMax * 20) / 100);
                $this->vida = min($this->vida + $cura, $this->vidaMax);
                return "Paladino usou Bênção Sagrada e curou $cura de vida!";
            } else if ($this->vida >= (($this->vidaMax * 30) / 100) && $this->vida < (($this->vidaMax * 50) / 100)) {
                $cura = (($this->vidaMax * 35) / 100);
                $this->vida = min($this->vida + $cura, $this->vidaMax);
                return "Paladino usou Bênção Sagrada e curou $cura de vida!";
            } else if ($this->vida < (($this->vidaMax * 30) / 100)) {
                $cura = (($this->vidaMax * 55) / 100);
                $this->vida = min($this->vida + $cura, $this->vidaMax);
                return "Paladino usou Bênção Sagrada e curou $cura de vida!";
            }
        } else {
            #throw new energyException("Energia insuficiente para usar a habilidade!");
        }
    }
}
