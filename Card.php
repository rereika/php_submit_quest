<?php

namespace SubmitQuest;
require_once('Game.php');

class Card{
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
        13 =>'A'];

    private array $cards;
    private array $playerCards;

    public function __construct(){
    foreach(self::SUIT_TEXT as $suit){
        foreach (self::CARD_TEXT as $number){
            $this->cards[] = [$suit, $number]; //['スペード', '2'], ['スペード', '3'], ['スペード', '4'],
        }
    }
}
public function shuffleAndDistributeCards(int $numberOfPlayers){ //もし3人なら
    shuffle($this->cards);

    $totalCards = count($this->cards);
    $cardsPerPlayer = (int)($totalCards / $numberOfPlayers); //17.33333=52枚÷3
    $surplusCards = $totalCards % $numberOfPlayers; //1

    $playerIndex = 0;
    $start = 0;

    for ($i = 0; $i < $numberOfPlayers; $i++) {
        $chunkSize = $cardsPerPlayer + ($i < $surplusCards ? 1 : 0); //17.33333+1
        $this->playerCards[] = array_slice($this->cards, $start, $chunkSize);
        $start += $chunkSize;
}
}

public function getCard(){
    return $this->playerCards;
}
public static function CardRank($playerCards){
    $numberName = $playerCards[1];
    return array_search($numberName, self::CARD_TEXT);
}

}
