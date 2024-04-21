<?php

namespace SubmitQuest;
require_once('Card.php');
require_once('Player.php');
require_once('Hand.php');
    function preparation(){
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

    list($players, $name) = preparation();
    war($players, $name);

    function war($players, $name){
        $drawnCards = [];
        $onHandsCards = [];

        foreach($players as $key => $player){
            if(empty($players)){
                echo '戦争を終了します。';
        }else{
            echo '戦争！'.PHP_EOL;
        }

            while(!empty($players)){
                echo '戦争！'.PHP_EOL;

                foreach($players as $key => $player){
                    $drawCard = array_shift($player);
                    echo $name[$key]."のカードは".$drawCard[0]."の".$drawCard[1]."です。".PHP_EOL;
                }

                    //$cardRank配列に値を入れていく
                    $cardRank = [];
                    $cardRank[] = Card::CardRank($drawCard);
                    return $cardRank;

                    Hand::evaluator($cardRank, $players, $name, $onHandsCards, $drawnCards);
                    Hand::evaluator2($players, $onHandCards);
        // }
        //     Hand::evaluator3($onHandCards1, $onHandCards2);
        //     // $player1->setCard1($player1Cards);
        //     // $player2->setCard2($player2Cards);
            }


        // while (!empty($player1) && !empty($player2)) {
        //     echo '戦争！'.PHP_EOL;

        //     $player1Cards = array_shift($player1);
        //     $player2Cards = array_shift($player2);

        //     //プレイヤー１ではなく、入力された名前で表示　例：たろうのカードは
        //     echo "プレイヤー1のカードは".$player1Cards[0]."の".$player1Cards[1]."です。".PHP_EOL;
        //     echo "プレイヤー2のカードは".$player2Cards[0]."の".$player2Cards[1]."です。".PHP_EOL;

        //     $cardRank1 = Card::CardRank($player1Cards);
        //     $cardRank2 = Card::CardRank($player2Cards);

        //     Hand::evaluator($cardRank1, $cardRank2, $player1Cards, $player2Cards, $onHandCards1, $onHandCards2, $drawnCards);
        //     Hand::evaluator2($player1, $player2, $onHandCards1, $onHandCards2,);
        // }
        //     Hand::evaluator3($onHandCards1, $onHandCards2);
        //     // $player1->setCard1($player1Cards);
        //     // $player2->setCard2($player2Cards);
        echo '戦争を終了します。';
    }
