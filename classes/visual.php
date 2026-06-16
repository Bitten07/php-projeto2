<?php

class Visual
{
    public static function exibirStatus(Personagem $jogador1, Personagem $jogador2): void
    {
        echo "\n--- Status dos Jogadores ---\n";
        self::exibirStatusPersonagem($jogador1);

        self::exibirStatusPersonagem($jogador2);
    }

    public static function separador(): void
    {
        echo str_repeat("-", 50) . "\n";
    }

    private static function exibirPersonagem(Personagem $personagem): void
    {
        switch ($personagem->getNome()) {
            case 'Mago':
                echo  "                                        
      ####                              
    ##....####                          
    ##++......##                        
    MM##++------####                    
      ##mmmm--------####                
      ####mm++++--------############mm  
        ##++++++++++----++++++++++++mmmm
        ##++++++++::......::::::::++@@@@
        ##MM++::::..------++MMMMMM@@mm  
        ..##++------++mmmmmm######++    
        ##++++++++++++######            
      ##++++++++##########  ##          
    ##++++++########  ####  ####--      
  ##++++##--########  ########--@@++    
    ####--######################++MMmm  
      ##--------------######------MMmm  
        ##----######------------@@##mm  
      ##------------####------##--..++@@
      ##------------######----##--..++@@
      ##------------##    ------@@##mm  
      ##------------##    ----##++MMmm  
        ##----------######----##++MMmm  
        ##--------##--------##----MMmm  
        ##--------##------##------MMmm  
      ##--##----##----####--------MMmm  
    ##------####------------------::mm@@
      ######    ####################mm\n";
                break;
            case 'Assassino':
                echo "
                                            ##                        
                        MM@@@@@@####    ##@@##                      
                        ##MMMMMMMM##    ##@@MMMM##                    
                    @@MMMMMMMMMM##  ##    MMMM@@--                  
                    ##MMMMMMMMMMMM####..      MMMM--                  
                MMMMMMMMMMMMMMMMMM##@@MM    MMMM##                  
                @@MMMMMM####MMMMMM######--  mmMM##                  
                @@MMMMMM@@++  ##@@MMMM##@@  ##  MMMM##                
            ####MM######    ..##MMMM####        MM##                
            ##MM######        ##@@MM####..  ##  mm@@..              
            ##MM########    @@##########--    ##mmMM..              
            ######@@----    ..--########      ##..MM..              
            ############    @@######..          --MM..              
        @@########################@@##@@        MMMM..              
        ##############MMMMMM@@####MMMM##        MMMM..              
    MM##############MMMMMMMMMMMM####MM##--        ##                
    ################MMMMMMMMMMMM########--        ##                
MM##++  ..######++##MMMMMMMMMM##########--                          
####        ####--##MMMMMMMM@@##########                            
..            ..  ..##@@MM@@######  ####                            
                    ##############  @@                              
                        ########                                      
                        @@######                                    
                            @@--\n";
                break;
            case 'Paladino':
                echo "                            
                ::MMMMMM##::::::              
                    ##@@mmmmmm####              
                ####mm########  ##              
            ++mmmmmmMM        ##              
                ----####  ----##      ++        
            ########mm####    ##  ##          
            ##mmmm####@@mmmm##  ##  ##          
        ##mmmmmm##########mm######  ++@@      
        ##mmmmmmmm##@@..############  mm##      
    ::##mmmmMM####  ..##mmmmmm####  mmmm##    
    ::####mm####    MM  ####mm##  ##mmmm##    
    ::####mm##    ######      ##  ##mmmm##    
    ----    ..--######MM########  ##mm::mm..  
        ############    ########  ##mm      ##
        ####mmmmmm##  ##################@@  ##  
        ######MM############mmmm  mm####@@##    
        ##    ++######@@####++++  ++####mm##    
    ##--  ##  ++##    ########++  ++####mm##    
##  ++######++      ####    ##  mm######      
##    mmmm##          ##          mmmm  ##      
##  ++######      ######    ##  mm##@@MM      
                    ####  ####@@  @@##          
                ####mm####mmmm  mm####        
                ####::####mmmm  mm####        
                ####::################\n";
                break;
            default:
                break;
        }
    }

    public static function barraVida(int $vidaAtual, int $vidaMax): string
    {
        $tamanhoBarra = $vidaMax / 10;
        $porcentagem = $vidaAtual / $vidaMax;
        $partesCheias = (int) round($porcentagem * $tamanhoBarra);
        $partesVazias = $tamanhoBarra - $partesCheias;

        return "[\033[34m" . str_repeat("#", $partesCheias) . str_repeat("-", $partesVazias) . "\033[0m]\n";
    }

    private static function exibirStatusPersonagem(Personagem $personagem): void
    {
        self::exibirPersonagem($personagem);
        echo "======= Status de {$personagem->getNome()} =======\n";
        echo "Vida: \033[34m {$personagem->getVida()} \033[0m / \033[34m {$personagem->getVidaMax()} \033[0m \n";
        echo self::barraVida($personagem->getVida(), $personagem->getVidaMax());
        echo "Energia: \033[32m{$personagem->getEnergia()}\033[0m / \033[32m{$personagem->getEnergiaMax()}\033[0m\n";
        echo "Defesa: \033[33m {$personagem->getDefesa()} \033[0m (\033[33m+{$personagem->getDefesaBonus()}\033[0m)\n";

        if ($personagem->getStackVeneno() > 0) {
            echo "Stack de Veneno: \033[34m{$personagem->getStackVeneno()}\033[0m\n";
        }

        echo "=================================\n";
    }

    public static function exibirMenu(Personagem $jogador): void
    {
        echo "\n--- Vez do {$jogador->getNome()} ---\n";
        echo "[1. Atacar] [2. Defender] [3. Usar Habilidade]\n";
    }

    public static function exibirResumoFinal(Personagem $vencedor, Personagem $derrotado, int $turno): void
    {
        echo "\n--- Fim da Partida ---\n";
        echo "Vencedor: {$vencedor->getNome()}\n";
        echo "Turnos jogados: {$turno}\n";
        echo "{$vencedor->getNome()}: \033[31m {$vencedor->getVida()}\033[0m /\033[34m {$vencedor->getVidaMax()}\033[0m  HP restante\n";
        echo "{$derrotado->getNome()}: \033[31m {$derrotado->getVida()}\033[0m /\033[34m {$derrotado->getVidaMax()}\033[0m  HP restante\n";
    }
}
