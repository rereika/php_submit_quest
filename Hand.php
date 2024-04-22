<?php
require_once('Game.php');
require_once('Card.php');

class Hand{
    private array $player1Cards;
    private array $player2Cards;
    private string $card1;
    private string $card2;
    private int $cardRank1;
    private int $cardRank2;

    private array $drawnCards = [];
    private array $onHandCards1 = [];
    private array $onHandCards2 = [];

    public function setCard1($player1Cards){
        $this->player1Cards = $player1Cards;
    }

    public function setCard2($player2Cards){
        $this->player2Cards = $player2Cards;
    }

    public function drawCard1(){
        $this->card1 = array_shift($this->player1Cards);
    }
    public function drawCard2(){
        $this->card2 = array_shift($this->player2Cards);
    }

    public static function evaluator($cardRank, $players, $name, &$onHandCards, $drawnCards){
        $maxRank = max($cardRank);
        foreach($cardRank as $key => $rank){
            if($maxRank === $rank){
                echo $name[$key]."が勝ちました。".PHP_EOL;
                array_push($onHandCards[$key], $players[$key]);
                foreach ($drawnCards as $drawnCard) {
                    array_push($onHandCards[$key], $drawnCard);
                    $drawnCards = [];
            }
        }
        if($rank === $rank){
            echo '引き分けです'.PHP_EOL;
            array_push($drawnCards, $players[$key]);
        }
    }
}

        public static function evaluator2($players, &$onHandCards){
            foreach($players as $key => $player){
                if(empty($player)){
                    $player_2Cards = shuffle($onHandCards[$key]);
                    array_push($player[$key], $player_2Cards);
                    $onHandCards = [];
                }
            }
        }

        public static function evaluator3($players, $onHandCards) {
            foreach ($players as $key => $player) {
                if (empty($onHandCards[$key])) {
                    echo $players[$key]->getName() . "の手札がなくなりました。" . PHP_EOL;
                }
            }

            $remainingPlayers = count($players);
            foreach ($onHandCards as $hand) {
                if (empty($hand)) {
                    $remainingPlayers--;
                }
            }

            if ($remainingPlayers == 1) {
                foreach ($players as $key => $player) {
                    if (!empty($onHandCards[$key])) {
                        echo $player->getName() . "が1位です。" . PHP_EOL;
                    } else {
                        echo $player->getName() . "が2位です。" . PHP_EOL;
                    }
                }
            }
        }

}
