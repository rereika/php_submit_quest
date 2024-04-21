<?php

namespace SubmitQuest;
require_once('Main.php');
require_once('Card.php');
use SubmitQuest\Main;

class Player{

    private array $playerCards;
    // private array $player2Cards;

    public function getCard(){
        return $this->playerCards;
    }
    // public function getCard2(){
    //     return $this->player2Cards;
    // }

    public function setCard($playerCards){
        $this->playerCards = $playerCards;
    }

    // public function setCard2($player2Cards){
    //     $this->player2Cards = $player2Cards;
    // }

}
