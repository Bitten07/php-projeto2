<?php

class Paladino extends Personagem
{

    public function __construct()
    {
        parent::__construct(
            nome: "Paladino",
            vida: 200,
            forca: 25,
            defesa: 30,
            energia: 60
        );
    }

    public function atacar(Personagem $alvo)
    {
        $dano = max(self::DANO_MINIMO, $this->forca - rand(0, 10));
        $danoCausado = $alvo->receberDano($dano);
        return "Paladino atacou causando \033[31m$danoCausado\033[0m de dano!";
    }
    public function defender()
    {
        $this->defesaBonus = rand(0, 5);
        $defesa = $this->defesa + $this->defesaBonus;

        return "Paladino defendeu aumentando sua defesa para \033[33m$defesa\033[0m!";
    }
    public function usarHabilidade(Personagem $alvo)
    {
        if ($this->energia >= 40) {
            $this->energia -= 40;
            if ($this->vida >= (($this->vidaMax * 80) / 100)) {
                $cura = (($this->vidaMax * 10) / 100);
                $this->vida = min($this->vida + $cura, $this->vidaMax);
                return "Paladino usou Bênção Sagrada e curou \033[34m$cura\033[0m de vida!";
            } else if ($this->vida >= (($this->vidaMax * 50) / 100) && $this->vida < (($this->vidaMax * 80) / 100)) {
                $cura = (($this->vidaMax * 20) / 100);
                $this->vida = min($this->vida + $cura, $this->vidaMax);
                return "Paladino usou Bênção Sagrada e curou \033[34m$cura\033[0m de vida!";
            } else if ($this->vida >= (($this->vidaMax * 30) / 100) && $this->vida < (($this->vidaMax * 50) / 100)) {
                $cura = (($this->vidaMax * 35) / 100);
                $this->vida = min($this->vida + $cura, $this->vidaMax);
                return "Paladino usou Bênção Sagrada e curou \033[34m$cura\033[0m de vida!";
            } else if ($this->vida < (($this->vidaMax * 30) / 100)) {
                $cura = (($this->vidaMax * 55) / 100);
                $this->vida = min($this->vida + $cura, $this->vidaMax);
                return "Paladino usou Bênção Sagrada e curou \033[34m$cura\033[0m de vida!";
            }
        } else {
            throw new EnergyException("Energia insuficiente para usar a habilidade!");
        }
    }
}
