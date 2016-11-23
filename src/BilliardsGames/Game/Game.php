<?php
/**
 * Created by PhpStorm.
 * User: Diana Bakalska
 * Date: 11/7/2016
 * Time: 12:01 PM
 */

namespace BilliardsGames\Game;

use BilliardsGames\Player\PlayerInterface;
use BilliardsGames\Shot\LegalShotTrait;

class Game implements
    GameInitInterface,
    GameFlowInterface
{
    use LegalShotTrait;

    protected $init;
    protected $players = [];
    protected $game;
    protected $balls = [];
    protected $breakShot = false;
    protected $ballCollection = [];
    protected $points;
    protected $scores = [];
    protected $objectBalls;


    public function addPlayer(PlayerInterface $player)
        {
        $this->players[] = $player;
        $playerIndex = $this->getPlayerIndex($player);
        $this->scores[$playerIndex] = 0;
    }

    public function rack()
    {
        if ($this->cueBall && $this->ballCollection) {
            return $this;
        }
    }

    public function init()
    {
        if (count($this->players) < 2) {
            throw new \Exception('Not enough players to start the game.');
        }
        $this->rack();
        $this->init = true;
    }

    public function breakShot()
    {
        if ($this->rack() && $this->isLegalShot()) {
            return true;
        }
        return false;
    }

    public function start()
    {
        if (!$this->init) {
            throw new \Exception('Game not initialized.');
        }

        // composition
        $gameLoop = new GameLoopIterator;
        while ($gameLoop->valid()) {
            $turnNumber = $gameLoop->key();
            $turn = $gameLoop->current();

            $ballOn = $this->getBallOn();

//            $shotResult = $turn->getBallOn($ballOn);
//            $break = 0;

            if ($this->breakShot) {
                if ($this->isBallPotted($ballOn)) {
                    $this->getBallOn();
                }
                // change player`s turn
                $this->changePlayersTurn();
            }

            if (empty($this->ballCollection)) {
                return new Win();
            }
            if ($this->ballOn != $this->ballPotted) {
//                $turnNumber = $gameLoop->next();
                $this->changePlayersTurn();
            }
        }
    }

    public function changePlayersTurn()
    {
        if ($this->isLegalShot()) {
            if (!$this->isBallPotted($this->ballOn)) {
                next($this->players);
            }
        }
    }

    public function addScore(PlayerInterface $player, $points)
    {
        $playerIndex = $this->getPlayerIndex($player);
        if (false !== $playerIndex) {
            $this->scores[$playerIndex] += $points;
        }
        return $this;
    }

    public function getScore(PlayerInterface $player = null)
    {
        $playerIndex = $this->getPlayerIndex($player);
        return $this->scores[$playerIndex];
    }

    public function getScores()
    {
        $scores = [];
        foreach ($this->players as $index => $player) {
            $scores[$player->getName()] = $this->scores[$index];
        }
        return $scores;
    }

    private function getPlayerIndex(PlayerInterface $player)
    {
        return array_search($player, $this->players, true);
    }

}