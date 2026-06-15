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
     #^#
    ##..##            
    MM++--##          
    ##++----######mm
    ##++++....::::@@
   #..++--++mm####  
  ##++++########    
++######  ####@@  
    --------##----mm
    ------##------++
    ------##  --@@mm
    ##----####--++mm
    ##------------mm
##--##----------mm\n";
                break;
            case 'Ladino':
                echo "                                  
        ############                                    
        ################                                
    ##    ################                                
##@@##    ##############                                
    ####::##############                                
        MMmm##############                                
        MM##mm##############                              
        ########--############                            
        ######################                            
        ##########----########                            
        ##########  --########                            
        ##############mm######                            
        ######################                            
        ######################                            
        ######################                            
        ######################                            
        ######################                            
        ######################                            
        ######################                            
        ######################                            
        ######################                            
        ######@@############                              
        ####@@  ##      ##                                
        ######          ##@@\n";
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
            default;
        }
    }

    private static function exibirStatusPersonagem(Personagem $personagem): void
    {
        self::exibirPersonagem($personagem);
        echo "======= Status de {$personagem->getNome()} =======\n";
        echo "Vida: {$personagem->getVida()}/{$personagem->getVidaMax()}\n";
        echo "Energia: {$personagem->getEnergia()}/{$personagem->getEnergiaMax()}\n";
        echo "Força: {$personagem->getForca()}\n";
        echo "Defesa: {$personagem->getDefesa()} (+{$personagem->getDefesaBonus()})\n";

        if ($personagem->getStackVeneno() > 0) {
            echo "Stack de Veneno: {$personagem->getStackVeneno()}\n";
        }

        echo "=================================\n";
    }

    public static function exibirMenu(Personagem $jogador): void
    {
        echo "\n--- Vez do {$jogador->getNome()} ---\n";
        echo "[1. Atacar] [2. Defender] [3. Usar Habilidade]\n";
    }
}
