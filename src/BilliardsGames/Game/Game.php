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

class Game
{
    protected $init;
    protected $rack;
    protected $players = [];
    protected $game;
    protected $balls = [];
    protected $breakShot;
    protected $ballOn;
    protected $ballPotted;
    protected $foul;


    public function init()
    {
        if (count($this->players) < 2) {
            throw new \Exception('Not enough players to start the game.');
        }
        $this->rack = true;
        $this->init = true;
    }

    public function addPlayer(Player $player)
    {
        $this->players[] = $player;
    }

    public function start()
    {
        if (!$this->init) {
            throw new \Exception('Game not initialized.');
        }

        $gameLoop = new GameLoopIterator;
        while ($gameLoop->valid()) {
            $turnNumber = $gameLoop->key();
            $turn = $gameLoop->current();

            $ballOn = $this->getNextBallOn();
            $shotResult = $turn->nextShot($ballOn);
            $break = 0;

            if ($this->breakShot->isLegalShot($shotResult)) {
                $break++;
            }
//            if ($break == 8) {
//                return new Win();
//            }
            if ($this->ballOn != $this->ballPotted) {
                $turnNumber = $gameLoop->next();
            }
        }
    }

    public function isFoul()
    {
        if ($this->ballPotted != $this->ballOn ||
            AbstractBallColor::CUEBALL == $this->ballPotted
        ) {
            $this->foul = true;
        }
    }

    public function playersTurn()
    {
        if ($this->ballOn !== $this->ballPotted) {

        }

    }

    public function nextShot(BallCollection $ballOn)
    {
        if ($this->ballOn == $this->ballPotted) {
            $this->nextShot($ballOn);
        }
        $turn->getPlayer();
        $turn->ballOn();
        if ($turnNumber == 0) {
            return $this->breakShot();
        }
        // return
    }

    public function win(Player $player)
    {

    }


}