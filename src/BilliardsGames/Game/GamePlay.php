<?php
/**
 * Created by PhpStorm.
 * User: Diana Bakalska
 * Date: 11/8/2016
 * Time: 1:38 PM
 */

namespace BilliardsGames\Game;

use BilliardsGames\Player\PlayerInterface;

class GamePlay
{
    protected $points;
    protected $players = [];
    protected $scores = [];

//    public function __construct(Player $player, int $points, array $gameResults)
//    {
//        $this->gameResults[$this->player] = $player;
//        $this->gameResults[$this->points] = $points;
//    }

//    public function getGameResults()
//    {
//        return $this->gameResults;
//    }

    public function addPlayer(PlayerInterface $player)
    {
        $this->players[] = $player;
        $this->scores[key($this->players)] = 0;
    }

    public function addScore(PlayerInterface $player, $points)
    {
        $playerIndex = $this->getPlayerIndex($player);
        if ($playerIndex) {
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
}
