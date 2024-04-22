<?php
require_once('Game.php');
require_once('Card.php');

class Player{

    private array $playerCards;
    public function getCard(){
        return $this->playerCards;
    }
    public function setCard($playerCards){
        $this->playerCards = $playerCards;
    }
}
