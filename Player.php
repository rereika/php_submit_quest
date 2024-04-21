<?php

namespace SubmitQuest;
require_once('Game.php');
require_once('Card.php');
use SubmitQuest\Game;

class Player{

    private array $playerCards;
    public function getCard(){
        return $this->playerCards;
    }
    public function setCard($playerCards){
        $this->playerCards = $playerCards;
    }
}
