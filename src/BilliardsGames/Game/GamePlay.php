<?php
/**
 * Created by PhpStorm.
 * User: Diana Bakalska
 * Date: 11/8/2016
 * Time: 1:38 PM
 */

namespace BilliardsGames\Game;


class GamePlay
{
    protected $player;
    protected $points;
    protected $gameResults = [];

    public function __construct($player, int $points, array $gameResults)
    {
        $this->gameResults[$this->player] = $player;
        $this->gameResults[$this->points] = $points;
    }

    public function getPlayer()
    {
        return $this->player;
    }

    public function setPlayer($player)
    {
        $this->player = $player;
    }

    public function getGameResults()
    {
        return $this->gameResults;
    }
}
