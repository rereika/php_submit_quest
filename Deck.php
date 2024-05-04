<?php
require_once('Game.php');

class Deck
{
    const SUIT_TEXT = [
        'S' => 'スペード',
        'H' => 'ハート',
        'D' => 'ダイヤ',
        'C' => 'クラブ'
    ];
    const CARD_TEXT = [
        1 => '2',
        2 => '3',
        3 => '4',
        4 => '5',
        5 => '6',
        6 => '7',
        7 => '8',
        8 => '9',
        9 => '10',
        10 => 'J',
        11 => 'Q',
        12 => 'K',
        13 => 'A'
    ];

    private array $deck;

    public function __construct()
    {
        foreach (self::SUIT_TEXT as $suit) {
            foreach (self::CARD_TEXT as $number) {
                $this->deck[] = [$suit, $number]; //['スペード', '2'], ['スペード', '3'], ['スペード', '4'],
            }
        }
    }

    public function getDeck()
    {
        return $this->deck;
    }

    public function setDeck($deck)
    {
        $this->deck = $deck;
    }
}
