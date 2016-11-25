<?php
/**
 * Created by PhpStorm.
 * User: Diana Bakalska
 * Date: 11/25/2016
 * Time: 11:07 AM
 */

namespace BilliardsGames\Game;

use BilliardsGames\Player\PlayerIterator;

class Win implements WinStrategyInterface
{
    public function win()
    {
        $playerIterator = new PlayerIterator($this->players);
        $gameLoop = new GameLoopIterator($playerIterator);
        while ($gameLoop->next()) {
            $turn = $gameLoop->current();
            $turn->setIsValid();
            $currentPlayer = $turn->getPlayer();
            if ($turn->getIsValid()) {
                $this->addScore($currentPlayer, 1);
            }

            if ($gameLoop->key() >= 10) {
                $turn->setIsFinal(true);
                print_r('THE WINNER IS ' . $currentPlayer);
            }
        }
    }
}