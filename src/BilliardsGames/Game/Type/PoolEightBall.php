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
            'black' => Color\Black::COLOR,
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
        foreach ($this->getBalls()['solid'] as $ball) {
            $allBalls->addBall($ball);
        }
        foreach ($this->getBalls()['striped'] as $ball) {
            $allBalls->addBall($ball);
        }

        $deletedBalls = [];
        $key = (rand(0,$allBalls->length()-1));

        if (!in_array($key, $deletedBalls)) {
            $ballOn = $allBalls->getBall($key);
            print_r("YOUR BALL ON IS " . strtoupper($ballOn) . PHP_EOL);
            $deletedBalls[] = $key;
            $allBalls->deleteBall($key);
        }
        print_r($allBalls);
    }

    public function startGame()
    {
        $playerIterator = new PlayerIterator($this->players);
        $gameLoop = new GameLoopIterator($playerIterator);
        print_r('START OF GAME' . PHP_EOL);
        while ($gameLoop->next()) {
            $turn = $gameLoop->current();
            print_r(PHP_EOL . PHP_EOL . 'TURN: ' . ($gameLoop->key() + 1) . PHP_EOL);
            $currentPlayer = $turn->getPlayer();
            $turn->setIsValid(true);
            if ($turn->getIsValid() == true && $gameLoop->key() >= 1) {
                $this->getBallOn();

            // Define random logic to decide if turn is valid
//            $turn->setIsValid(rand(100,1000) % 2 == 0);

            $currentPlayerRank = $currentPlayer->getRank();
            if ($nextPlayer = next($this->players)) {
                $nextPlayerRank = $nextPlayer->getRank();
            }
            if ($currentPlayerRank > 5) {
                $highestRank = max($currentPlayerRank, $nextPlayerRank);

                if ($currentPlayer->getRank() == $highestRank) {

                    while ($gameLoop->key() < 3) {
                        $turn->setIsValid(true);

                        }
                        if ($turn->getIsValid()) {
                            $this->addScore($currentPlayer, 1);
                        }
                    }
                }

            }

            if ($gameLoop->key() >= 5) {
                $turn->setIsFinal(true);
            }

            // When the current player pot his balls, then he has to play the black

            /*if ($this->ballCollection == null) {
                $this->getBalls()['black'];
                $turn->setIsValid(rand(100,1000) % 2 == 0);

                if ($turn->getIsValid()) {
                    $win = new Win();
                    return $win->win();
                    $turn->setIsFinal(true);
                    echo "You win!", PHP_EOL;
                }
            }*/

        }
    }
}
