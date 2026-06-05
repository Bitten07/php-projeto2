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
        $alvo->receberDano($dano);
        return "Mago atacou causando $dano de dano!";
    }
    public function defender()
    {
        $defesa = $this->defesa + rand(0, 5);
        $this->defesaBonus = rand(0, 5);
        return "Mago defendeu aumentando sua defesa para $defesa!";
    }
    public function usarHabilidade(Personagem $alvo)
    {
        if ($this->energia >= 60) {
            $this->energia -= 60;

            $dano = max(self::DANO_MINIMO, ($this->forca * 2) - rand(0, 20));
            $alvo->receberDano($dano);
            return "Mago usou Explosão Arcana causando $dano de dano!";
        } else {
            throw new energyException("Energia insuficiente para usar a habilidade!");
        }
    }
}
