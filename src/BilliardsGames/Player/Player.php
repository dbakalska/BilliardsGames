<?php

/**
 * Created by PhpStorm.
 * User: Diana Bakalska
 * Date: 11/4/2016
 * Time: 4:39 PM
 */

namespace BilliardsGames\Player;

class Player
{
    protected $player;

    /**
     * Player constructor.
     * @param $name
     */
    public function __construct($player)
    {
        $this->player = $player;
    }

    public function getPlayer()
    {
        return $this->player;
    }

    public function setPlayer($player)
    {
        $this->player = $player;
    }
}
