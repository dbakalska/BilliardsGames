<?php
/**
 * Created by PhpStorm.
 * User: Diana Bakalska
 * Date: 11/7/2016
 * Time: 12:01 PM
 */

namespace BilliardsGames\Game;

use BilliardsGames\Ball\Color\AbstractBallColor;
use BilliardsGames\Player\Player;
use BilliardsGames\Player\PlayerInterface;
use BilliardsGames\Shot\LegalShotTrait;
use BilliardsGames\Shot\NextShotTrait;

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


    public function init()
    {
        if (count($this->players) < 2) {
            throw new \Exception('Not enough players to start the game.');
        }

        $this->rack = true;
        $this->init = true;
    }

    public function addPlayer(PlayerInterface $player)
        {
        $this->players[] = $player;
        $playerIndex = $this->getPlayerIndex($player);
        $this->scores[$playerIndex] = 0;
    }

    public function breakShot()
    {
        if ($this->ballCollection && $this->cueBall) {
            if ($this->isLegalShot()) {
                $this->breakShot = true;
            }
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
/*        $gameLoop = new GameLoopIterator;
        while ($gameLoop->valid()) {
            $turnNumber = $gameLoop->key();
            $turn = $gameLoop->current();

            $ballOn = $this->getBallOn();

            $shotResult = $turn->nextShot($ballOn);
            $break = 0;

            if ($this->breakShot->isLegalShot($shotResult)) {
                $break++;
            }


            if ($break == 8) {
                return new Win();
            }
            if ($this->ballOn != $this->ballPotted) {
                $turnNumber = $gameLoop->next();
            }

        }*/
    }

    public function playersTurn()
    {

        if ($this->ballOn != $this->ballPotted) {
            next($this->players);
        }

    }

 /*   public function nextShot(BallCollectionInterface $ballOn)
    {
        if ($this->ballOn == $this->ballPotted) {
            $this->nextShot($ballOn);
        }
        $turn->getPlayer();
        $turn->ballOn();
        if ($turnNumber == 0) {
            return $this->breakShot();
        }
        return;
    }*/

    public function addScore(PlayerInterface $player, $points)
    {
        $playerIndex = $this->getPlayerIndex($player);
        if (false !== $playerIndex) {
            $this->scores[$playerIndex] += $points;
        }
        return $this;
    }

    private function getPlayerIndex(PlayerInterface $player)
    {
        return array_search($player, $this->players, true);
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

    public function win()
    {

    }
}