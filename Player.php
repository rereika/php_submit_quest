<?php
require_once('Game.php');
require_once('Deck.php');

class Player
{
    protected $name;
    protected $hand;


    public function __construct($name)
    {
        $this->name = $name;
    }

    public function shuffleCards(Deck $deck)
    {
        $d = $deck->getDeck();
        shuffle($d);
        $deck->setDeck($d);
    }

    public function dealCards(Deck $deck, $number)
    {
        $d = $deck->getDeck();
        $dealDeck = array_slice($d, 0, $number);
        array_splice($d, 0, $number);
        $deck->setDeck($d);

        return $dealDeck;
    }
    public function setHand($hand)
    {
        $this->hand = $hand;
    }
    public function getHand()
    {
        return $this->hand;
    }
    public function getName()
    {
        return $this->name;
    }

}
