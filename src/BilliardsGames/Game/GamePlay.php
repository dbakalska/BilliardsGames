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
    protected $gameResults = [];

    /**
     * @return mixed
     */
    public function getPlayer()
    {
        return $this->player;
    }

    /**
     * @param mixed $player
     */
    public function setPlayer($player)
    {
        $this->player = $player;
    }



}