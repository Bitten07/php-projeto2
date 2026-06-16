# Arena de Combate RPG

Projeto desenvolvido em PHP para simular uma arena de combate por turnos entre dois jogadores humanos, utilizando conceitos de Programacao Orientada a Objetos.

## Como executar

Para iniciar o jogo, execute:

```bash
php index.php
```

Depois disso, cada jogador escolhe um personagem digitando o numero correspondente no terminal.

## Personagens

### Assassino

Atributos iniciais:

- Vida: 120
- Forca: 20
- Defesa: 20
- Energia: 80

Habilidade especial:

- Lamina Envenenada
- Custa 30 de energia
- Aplica veneno no alvo
- O veneno causa dano no inicio dos turnos seguintes

### Mago

Atributos iniciais:

- Vida: 80
- Forca: 45
- Defesa: 10
- Energia: 100

Habilidade especial:

- Explosao Arcana
- Custa 60 de energia
- Causa dano elevado no adversario

### Paladino

Atributos iniciais:

- Vida: 200
- Forca: 25
- Defesa: 30
- Energia: 60

Habilidade especial:

- Bencao Sagrada
- Custa 40 de energia
- Recupera vida do proprio Paladino
- A quantidade curada depende da vida atual do personagem

## Sistema de combate

### Ataque

O ataque causa dano ao adversario considerando a forca do atacante e a defesa do alvo. O dano mostrado no terminal representa o dano real causado depois da reducao defensiva.

### Defesa

Ao defender, o personagem recebe um bonus temporario de defesa. Esse bonus e usado para reduzir o proximo dano recebido.

### Energia

As habilidades especiais consomem energia. A cada turno, o personagem da vez recupera parte da energia, respeitando o limite maximo.

Se o jogador tentar usar uma habilidade sem energia suficiente, o jogo mostra uma mensagem de erro e permite escolher outra acao no mesmo turno.

### Veneno

O Assassino pode aplicar veneno no alvo. O veneno acumula cargas e causa dano no inicio dos turnos seguintes.
