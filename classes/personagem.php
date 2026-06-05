<?php

abstract class Personagem
{
    protected string $nome;
    protected int $vida;
    protected int $vidaMax;
    protected int $forca;
    protected int $defesa;
    protected int $defesaBonus;
    protected int $energia;
    protected int $energiaMax;
    public const DANO_MINIMO = 0;

    protected int $stackVeneno;

    public function __construct(string $nome, int $vida, int $forca, int $defesa, int $energia)
    {
        $this->nome       = $nome;
        $this->vida       = $vida;
        $this->vidaMax    = $vida;
        $this->forca      = $forca;
        $this->defesa     = $defesa;
        $this->defesaBonus=  0;
        $this->energia    = $energia;
        $this->energiaMax = $energia;
        $this->stackVeneno= 0;
    }

    public function getNome(): string
    {
        return $this->nome;
    }
    public function getVidaMax(): int
    {
        return $this->vidaMax;
    }
    public function getVida(): int
    {
        return $this->vida;
    }
    public function getForca(): int
    {
        return $this->forca;
    }
    public function getDefesa(): int
    {
        return $this->defesa;
    }
    public function getEnergiaMax(): int
    {
        return $this->energiaMax;
    }
    public function getEnergia(): int
    {
        return $this->energia;
    }
    public function getDefesaBonus(): int {
        return $this->defesaBonus;
    }
    public function getStackVeneno(): int {
        return $this->stackVeneno;
    }

    public function receberDano(int $dano): void {
        $danoFinal = max(self::DANO_MINIMO, $dano - $this->defesa - $this->defesaBonus);
        $this->defesaBonus = 0;
        $this->vida -= $danoFinal;
    }
    public function adicionarVeneno(): void {
        $this->stackVeneno++;
    }

    abstract public function atacar(Personagem $alvo);
    abstract public function defender();
    abstract public function usarHabilidade(Personagem $alvo);
}
