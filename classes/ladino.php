<?php

class Ladino extends Personagem
{

    public function __construct()
    {
        parent::__construct(
            vida: 120,
            forca: 20,
            defesa: 20,
            energia: 80
        );
    }

    public function atacar()
    {
        $dano = max(self::DANO_MINIMO, $this->forca - rand(0, 10));
        return "Ladino atacou causando $dano de dano!";
    }
    public function defender()
    {
        $defesa = $this->defesa + rand(0, 5);
        return "Ladino defendeu aumentando sua defesa para $defesa!";
    }
    public function usarHabilidade()
    {
        if ($this->energia >= 30) {
            $this->energia -= 30;

            return "Ladino usou Lâmina Envenenada, aplicando 1 stack de veneno no alvo!";
        } else {
            #throw new energyException("Energia insuficiente para usar a habilidade!");
        }
    }
}
