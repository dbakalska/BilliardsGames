<?php
/**
 * Created by PhpStorm.
 * User: Diana Bakalska
 * Date: 11/7/2016
 * Time: 12:01 PM
 */

namespace BilliardsGames\Game;

use BilliardsGames\Player\PlayerInterface;
use BilliardsGames\Player\PlayerIterator;
use BilliardsGames\Shot\LegalShotTrait;
use BilliardsGames\Ball\Color\White;

class Game implements GameInitInterface
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
        $cueBall = new White();
        if ($cueBall && $this->ballCollection) {
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

/*    public function breakShot()
    {
        if ($this->rack() && $this->isLegalShot()) {
            return true;
        }
        return false;
    }*/

    public function start()
    {
        if (!$this->init) {
            throw new \Exception('Game not initialized.');
        }
        $this->startGame();
        print_r('END OF GAME' . PHP_EOL);
    }

    public function startGame()
    {
        $playerIterator = new PlayerIterator($this->players);
        $gameLoop = new GameLoopIterator($playerIterator);
        print_r('START OF GAME' . PHP_EOL);
        while ($gameLoop->next()) {
            $turn = $gameLoop->current();
            print_r(PHP_EOL . PHP_EOL . 'TURN: ' . ($gameLoop->key() + 1) . PHP_EOL);

            // Define random logic to decide if turn is valid
//            $turn->setIsValid(rand(100,1000) % 2 == 0);

            $currentPlayer = $turn->getPlayer();
            if ($turn->getIsValid()) {
                $this->addScore($currentPlayer, 1);
            }

            if ($gameLoop->key() >= 10) {
                $turn->setIsFinal(true);
            }
        }
    }

    public function changePlayersTurn()
    {
        if ($this->isLegalShot()) {
            if (!$this->isBallPotted($this->ballOn)) {}
                next($this->players);
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