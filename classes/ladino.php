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
        return "Ladino atacou causando $danoCausado de dano!";
    }
    public function defender()
    {
        $this->defesaBonus = rand(0, 5);
        $defesa = $this->defesa + $this->defesaBonus;
        return "Ladino defendeu aumentando sua defesa para $defesa!";
    }
    public function usarHabilidade(Personagem $alvo)
    {
        if ($this->energia >= 30) {
            $this->energia -= 30;

            $alvo->adicionarVeneno();

            return "Ladino usou Lâmina Envenenada, aplicando 1 stack de veneno no alvo!";
        } else {
            throw new EnergyException("Energia insuficiente para usar a habilidade!");
        }
    }
}
