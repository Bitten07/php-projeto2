<?php

class Ladino extends Personagem
{

    public function __construct()
    {
        parent::__construct(
            nome: "Ladino",
            vida: 120,
            forca: 20,
            defesa: 20,
            energia: 80
        );
    }

    public function atacar(Personagem $alvo)
    {
        $dano = max(self::DANO_MINIMO, $this->forca - rand(0, 10));
        $danoCausado = $alvo->receberDano($dano);
        return "Ladino atacou causando \033[31m$danoCausado\033[0m de dano!";
    }
    public function defender()
    {
        $this->defesaBonus = rand(0, 5);
        $defesa = $this->defesa + $this->defesaBonus;
        return "Ladino defendeu aumentando sua defesa para \033[33m$defesa\033[0m!";
    }
    public function usarHabilidade(Personagem $alvo)
    {
        if ($this->energia >= 30) {
            $this->energia -= 30;

            $alvo->adicionarVeneno();

            return "Ladino usou Lâmina Envenenada, aplicando \033[34m1 stack\033[0m de veneno no alvo!";
        } else {
            throw new EnergyException("Energia insuficiente para usar a habilidade!");
        }
    }
}
