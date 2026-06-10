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
    public const REGENERACAO_ENERGIA = 10;

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

    public function receberDano(int $dano, bool $ignorarDefesa = false): int {
        $vidaAntes = $this->vida;
        $reducaoDefesa = $ignorarDefesa ? 0 : intdiv($this->defesa + $this->defesaBonus, 2);
        $danoFinal = max(self::DANO_MINIMO, $dano - $reducaoDefesa);
        $this->vida = max(0, $this->vida - $danoFinal);

        return $vidaAntes - $this->vida;
    }
    public function limparDefesaBonus(): void {
        $this->defesaBonus = 0;
    }
    public function adicionarVeneno(): void {
        $this->stackVeneno++;
    }
    public function regenerarEnergia(): int {
        $energiaAntes = $this->energia;
        $this->energia = min($this->energia + self::REGENERACAO_ENERGIA, $this->energiaMax);

        return $this->energia - $energiaAntes;
    }

    abstract public function atacar(Personagem $alvo);
    abstract public function defender();
    abstract public function usarHabilidade(Personagem $alvo);
}
