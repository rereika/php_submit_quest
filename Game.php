<?php

namespace SubmitQuest;
require_once('Card.php');
require_once('Player.php');
require_once('Hand.php');

class Game{
    public static function preparation(){
        echo '戦争を開始します。'.PHP_EOL;

        echo 'プレイヤーの人数を入力してください（2〜5）:';
        $number = (int)fgets(STDIN);
        $name = [];

        for($i = 1; $i <= $number; $i++){
            echo 'プレイヤー'.$i.'の名前を入力してください:';
            $name[] = trim(fgets(STDIN));
        }

        $deck = new Card();//オブジェクト配列にする、配列にして繰り返し処理する
        $deck->shuffleAndDistributeCards($number);
        $deck->getCard();

        $player = new Player();
        $player->setCard($deck->getCard());

        echo 'カードが配られました。'.PHP_EOL;
        return [$player->getCard(), $name];
    }
    public static function war($players, $name){
        $drawnCards = [];
        $onHandsCards = [];

            while(!empty($players)){
                echo '戦争！'.PHP_EOL;

                foreach($players as $key => $player){
                    $drawCard = array_shift($player);
                    echo $name[$key]."のカードは".$drawCard[0]."の".$drawCard[1]."です。".PHP_EOL;
                }
                    $cardRank = [];
                    $cardRank[] = Card::CardRank($drawCard);
                    return $cardRank;

                    Hand::evaluator($cardRank, $players, $name, $onHandsCards, $drawnCards);
                    Hand::evaluator2($players, $onHandCards);
                    Hand::evaluator3($players, $onHandCards);

                    if(empty($players)){
                        echo '戦争を終了します。';
                        return;
                    }
                }

        echo '戦争を終了します。';
    }
}
