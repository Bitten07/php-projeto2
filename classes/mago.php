<?php

class Mago extends Personagem
{

    public function __construct()
    {
        parent::__construct(
            nome: "Mago",
            vida: 80,
            forca: 45,
            defesa: 10,
            energia: 100
        );
    }

    public function atacar(Personagem $alvo)
    {
        $dano = max(self::DANO_MINIMO, $this->forca - rand(0, 10));
        $danoCausado = $alvo->receberDano($dano);
        return "Mago atacou causando \033[31m$danoCausado\033[0m de dano!";
    }
    public function defender()
    {
        $this->defesaBonus = rand(0, 5);
        $defesa = $this->defesa + $this->defesaBonus;
        return "Mago defendeu aumentando sua defesa para \033[33m$defesa!\033[0m";
    }
    public function usarHabilidade(Personagem $alvo)
    {
        if ($this->energia >= 60) {
            $this->energia -= 60;

            $dano = max(self::DANO_MINIMO, ($this->forca * 2) - rand(0, 20));
            $danoCausado = $alvo->receberDano($dano);
            return "Mago usou Explosão Arcana causando \033[31m$danoCausado\033[0m de dano!";
        } else {
            throw new EnergyException("Energia insuficiente para usar a habilidade!");
        }
    }
}
