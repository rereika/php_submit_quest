<?php
require_once('Deck.php');
require_once('Player.php');
class Game
{
    public static function preparation()
    {
        $d = new Deck();

        $players['プレイヤー1'] = new Player('プレイヤー1');
        $players['プレイヤー2'] = new Player('プレイヤー2');

        echo '戦争を開始します。' . PHP_EOL;

        $players['プレイヤー1']->shuffleCards($d);

        $players['プレイヤー1']->setHand($players['プレイヤー1']->dealCards($d, 26));
        $players['プレイヤー2']->setHand($players['プレイヤー1']->dealCards($d, 26));

        echo 'カードが配られました。' . PHP_EOL;
        return $players;
    }

    //プレイヤー1=> [][][]...,プレイヤー2=.[][][]

    public static function war($players)
    {
        $drawCards = []; //引き分けで置かれた場札

        $onHandCards = array();

        while (!empty($players['プレイヤー1']->getHand()) && !empty($players['プレイヤー2']->getHand())) {

            echo '戦争！' . PHP_EOL;

            foreach ($players as $player) {
                $hand = $player->getHand()[0];
                echo $player->getName() . 'のカードは' . $hand[0] . 'の' . $hand[1] . 'です。' . PHP_EOL;
            }
            $ranks = array();
            foreach ($players as $player) {
                $hand = $player->getHand()[0];
                $rank = array_search($hand[1], Deck::CARD_TEXT);
                $ranks[$player->getName()] = $rank;
            }

            if (max($ranks) !== 0) {
                $maxPlayer = array_keys($ranks, max($ranks))[0];
                echo $maxPlayer . 'が勝ちました。' . PHP_EOL;

                foreach ($players as $player) {
                    $onHandCards[$player->getName()] = array();
                }

                array_push($onHandCards[$maxPlayer], $players['プレイヤー1']->getHand()[0], $players['プレイヤー2']->getHand()[0]);
                foreach ($drawCards as $drawCard) {
                    array_push($onHandCards[$maxPlayer], $drawCard);
                }

                $opponentPlayer = ($maxPlayer === 'プレイヤー1') ? 'プレイヤー2' : 'プレイヤー1';
                $arr = $players[$opponentPlayer]->getHand();
                array_shift($arr);
                $players[$opponentPlayer]->setHand($arr);
                $drawCards = [];
            } else {
                echo '引き分けです。' . PHP_EOL;
                array_push($drawCards, $players['プレイヤー1']->getHand()[0], $players['プレイヤー2']->getHand()[0]);

                $arr = $players['プレイヤー1']->getHand();
                array_shift($arr);
                $players['プレイヤー1']->setHand($arr);

                $arr = $players['プレイヤー2']->getHand();
                array_shift($arr);
                $players['プレイヤー2']->setHand($arr);
            }
        }

        if (empty($players['プレイヤー1']->getHand())) {
            if (!empty($onHandCards1)) {
                shuffle($onHandCards1);
                $players['プレイヤー1']->setHand(array_merge($players['プレイヤー1'], $onHandCards1));
                $onHandCards1 = [];
            }
            echo 'プレイヤー1の手札がなくなりました。' . PHP_EOL;
            echo 'プレイヤー2の手札の枚数は52枚です。プレイヤー1の手札の枚数は0枚です。' . PHP_EOL;
            echo 'プレイヤー1が1位、プレイヤー2が2位です。' . PHP_EOL;
        } elseif (empty($players['プレイヤー2']->getHand())) {
            if (!empty($onHandCards2)) {
                shuffle($onHandCards2);
                $players['プレイヤー2']->setHand(array_merge($players['プレイヤー2'], $onHandCards2));
                $onHandCards2 = [];
            }
            echo 'プレイヤー2の手札がなくなりました。' . PHP_EOL;
            echo 'プレイヤー1の手札の枚数は52枚です。プレイヤー2の手札の枚数は0枚です。' . PHP_EOL;
            echo 'プレイヤー2が1位、プレイヤー1が2位です。' . PHP_EOL;
        }
        echo '戦争を終了します。' . PHP_EOL;
    }
}
