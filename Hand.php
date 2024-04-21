<?php

namespace SubmitQuest;
require_once('Main.php');
require_once('Card.php');
use SubmitQuest\Main;

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

    // public function CardRank(){
    //     $numberName = $this->player1Cards[0][1];
    //     $this->cardRank1 = array_search($numberName, CARD::CARD_TEXT);
    //     $numberName = $this->player2Cards[0][1];
    //     $this->cardRank2 = array_search($numberName, CARD::CARD_TEXT);
    // }

    public function drawCard1(){
        $this->card1 = array_shift($this->player1Cards);
    }
    public function drawCard2(){
        $this->card2 = array_shift($this->player2Cards);
    }

    public static function evaluator($cardRank, $players, $name, &$onHandsCards, $drawnCards){
        $maxRank = max($cardRank);
        foreach($cardRank as $key => $rank){
            if($maxRank === $rank){
                echo $name[$key]."が勝ちました。".PHP_EOL;
                array_push($onHandsCards[$key], $players[$key]);
                foreach ($drawnCards as $drawnCard) {
                    array_push($onHandsCards[$key], $drawnCard);
                    $drawnCards = [];
            }
        }
        if($rank === $rank){
            echo '引き分けです'.PHP_EOL;
            array_push($drawnCards, $players[$key]);
        }
    }
}
    // public static function evaluator($cardRank1, $cardRank2, $player1Cards, $player2Cards, &$onHandCards1, &$onHandCards2, &$drawnCards){

    //     if($cardRank1 > $cardRank2){
    //         echo 'プレイヤー1が勝ちました。'.PHP_EOL;
    //         array_push($onHandCards1, $player2Cards);
    //         foreach ($drawnCards as $drawnCard) {
    //         array_push($onHandCards1, $drawnCard);
    //         $drawnCards = [];
    //         }
    //     }elseif($cardRank1 < $cardRank2){
    //             echo 'プレイヤー2が勝ちました。'.PHP_EOL;
    //             array_push($onHandCards2, $player1Cards);
    //             foreach ($drawnCards as $drawnCard) {
    //             array_push($onHandCards2, $drawnCard);
    //             $drawnCards = [];
    //             }
    //     }elseif($cardRank1 === $cardRank2){
    //             echo '引き分けです'.PHP_EOL;
    //             array_push($drawnCards, $player1Cards, $player2Cards);
    //         }
    //     }

        public static function evaluator2($players, &$onHandCards){

            if(empty($player1)){
                $player1_2Cards = shuffle($onHandCards1);
                array_push($player1, $player1_2Cards);
                $onHandCards1 = [];
            }elseif(empty($player2)){
                $player2_2Cards = shuffle($onHandCards2);
                array_push($player2, $player2_2Cards);
                $onHandCards2 = [];
            }
        }

        public static function evaluator3($onHandCards1, $onHandCards2){
            if(empty($onHandCards1)){
                echo 'プレイヤー1の手札がなくなりました。'.PHP_EOL;
                echo 'プレイヤー2の手札の枚数は52枚です。プレイヤー1の手札の枚数は0枚です。'.PHP_EOL;
                echo 'プレイヤー2が1位、プレイヤー1が2位です。'.PHP_EOL;
            }elseif(empty($onHandCards2)){
                echo 'プレイヤー2の手札がなくなりました。'.PHP_EOL;
                echo 'プレイヤー1の手札の枚数は52枚です。プレイヤー2の手札の枚数は0枚です。'.PHP_EOL;
                echo 'プレイヤー1が1位、プレイヤー2が2位です。'.PHP_EOL;
            }
        }
        //     $player1->setCard1($player1Cards);
        //     $player2->setCard2($player2Cards);
        // }

}
