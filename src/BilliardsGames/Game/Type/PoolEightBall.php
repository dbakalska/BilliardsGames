<?php

/**
 * Created by PhpStorm.
 * User: Diana Bakalska
 * Date: 10/28/2016
 * Time: 3:55 PM
 */

namespace BilliardsGames\Game\Type;

use BilliardsGames\Ball\BallCollectionInterface;
use \BilliardsGames\Game\Game;
use BilliardsGames\Game\Turn\Breakshot;
use \BilliardsGames\Game\Turn\Turn;
use \BilliardsGames\Player\Player;
use BilliardsGames\Player\PlayerIterator;
use BilliardsGames\Game\GameLoopIterator;
use BilliardsGames\Table\PoolTable;
use BilliardsGames\Ball\Color;
use BilliardsGames\Game\Win;
use BilliardsGames\Ball\BallCollection;

class PoolEightBall extends \BilliardsGames\Game\Game implements BallCollectionInterface
{
    protected $table;

    public function __construct()
    {
        $this->table = new PoolTable();
    }

    public function getBalls()
    {
        return [
            'solid' => [
                Color\Yellow::COLOR,
                Color\Blue::COLOR,
                Color\Red::COLOR,
                Color\Pink::COLOR,
                Color\Orange::COLOR,
                Color\Green::COLOR,
                Color\Brown::COLOR,
            ],
            Color\Black::COLOR,
            'striped' => [
                Color\YellowStriped::COLOR,
                Color\BlueStriped::COLOR,
                Color\RedStriped::COLOR,
                Color\PinkStriped::COLOR,
                Color\OrangeStriped::COLOR,
                Color\GreenStriped::COLOR,
                Color\BrownStriped::COLOR,
            ]
        ];
    }

    public function getBallOn()
    {
        $allBalls = new BallCollection();
        for($i = 0; $i <= count($this->getBalls()['solid'])-1;$i++) {
        $allBalls->addBall($this->getBalls()['solid'][$i]);
        };
        for($i = 0; $i <= count($this->getBalls()['striped'])-1;$i++) {
            $allBalls->addBall($this->getBalls()['striped'][$i]);
        };

        $key = (rand(0,$allBalls->length()-1));
        $ballOn = $allBalls->getBall($key);

//        $allBalls->deleteBall($key);

        return strtoupper($ballOn);
    }

   /* public function removePottedBall()
    {
        $solid = $this->getBalls()['solid'];
        $striped = $this->getBalls()['striped'];
        $allBalls = array_merge($solid, $striped);
        $ballOn = $allBalls[array_rand($allBalls)];

        unset($allBalls[array_search($ballOn,$allBalls)]);

        if (in_array($ballOn, $solid)) {
            unset($solid[array_search($ballOn,$solid)]);
        } else {
            unset($striped[array_search($ballOn,$striped)]);
        }
    }*/

    public function startGame()
    {
        $playerIterator = new PlayerIterator($this->players);
        $gameLoop = new GameLoopIterator($playerIterator);
        print_r('START OF GAME' . PHP_EOL);
        while ($gameLoop->next()) {
            $turn = $gameLoop->current();
            print_r(PHP_EOL . PHP_EOL . 'TURN: ' . ($gameLoop->key() + 1) . PHP_EOL);
            $currentPlayer = $turn->getPlayer();

            // Define random logic to decide if turn is valid
            $turn->setIsValid(rand(100,1000) % 2 == 0);

            if ($turn->setIsValid(true)) {
                $this->getBallOn();
            }

            if ($gameLoop->key() >= 1 && $turn->setIsValid(true)) {
                $this->getBallOn();

                print_r("YOUR BALL ON IS " . $this->getBallOn() . PHP_EOL);


//                $cp = current($this->players);
//                $cp->balls = $this->getBalls()['solid'];
//                $np = next($this->players);
//                $np->balls = $this->getBalls()['striped'];
            }


            /*            $highestRank = max($cp->getRank(), $np->getRank());
                        var_dump($highestRank);

                        if ($cp->getRank() == $highestRank) {
                            while ($gameLoop->key() < 3) {
                                $turn->setIsValid(true);

                                if ($turn->getIsValid()) {
                                    $this->addScore($currentPlayer, 1);
                                }
                            }
                        }*/


            $currentPlayerRank = $currentPlayer->getRank();
            if ($nextPlayer = next($this->players)) {
                $nextPlayerRank = $nextPlayer->getRank();
            }
            if ($currentPlayerRank > 5) {
                $highestRank = max($currentPlayerRank, $nextPlayerRank);

                if ($gameLoop->key() >= 3) {
                    $turn->setIsValid(false);
                }
                if ($currentPlayerRank <= $highestRank) {

                }
            }


            if ($gameLoop->key() >= 5) {
                $turn->setIsFinal(true);
            }


//            if ($this->getScores() >= 8) {
//                $turn->setIsFinal(true);
//            }



//            if ($this->getBalls() == Color\Black::COLOR) {
//                $turn->setIsFinal(true);
//                var_dump('You win!');
//            }


//            $win = new Win();
//            return $win->win();
            }
        }
}
