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
            [   // solid
                new Color\Yellow,
                new Color\Blue,
                new Color\Red,
                new Color\Pink,
                new Color\Orange,
                new Color\Green,
                new Color\Brown,
            ],
            new Color\Black,
            [   // striped
                new Color\YellowStriped,
                new Color\BlueStriped,
                new Color\RedStriped,
                new Color\PinkStriped,
                new Color\OrangeStriped,
                new Color\GreenStriped,
                new Color\BrownStriped,
            ]
        ];
    }

    public function startGame()
    {
        $playerIterator = new PlayerIterator($this->players);
        $gameLoop = new GameLoopIterator($playerIterator);
        print_r('START OF GAME' . PHP_EOL);
        $gameLoop->breakshot();
        while ($gameLoop->next()) {
            $turn = $gameLoop->current();
            print_r(PHP_EOL . PHP_EOL . 'TURN: ' . ($gameLoop->key() + 1) . PHP_EOL);

            // Define random logic to decide if turn is valid

//            $turn->setIsValid(rand(100,1000) % 2 == 0);

//            if ($this->isBallPotted($this->getBalls())) {
//                $this->getBalls();
//            }

//            $currentPlayer = $turn->getPlayer();
//            if ($currentPlayer->getRank() > 5) {
//                $highestRank = max($currentPlayer->getRank(), $gameLoop->nextPlayer()->getRank());
//                if ($currentPlayer->getRank() == $highestRank) {
//                    print_r($currentPlayer->getName());
//                }
//                $winner =
//                    $turn->setIsValid(true);
//                $this->addScore($winner, 1);

//            }



//            if ($rank > 5) {
//                print_r('The player is rank ' . $rank);
//            }
//            if ($turn->getIsValid()) {
//                $this->addScore($currentPlayer, 1);
//            }
//
            if ($this->getBalls() == Color\Black::COLOR) {
                $turn->setIsFinal(true);
                var_dump('You win!');
            }

            if ($gameLoop->key() >= 5) {
                $turn->setIsFinal(true);
            }
//            if ($this->getScores() >= 8) {
//                $turn->setIsFinal(true);
//            }



//            $win = new Win();
//            return $win->win();
        }
    }



}
