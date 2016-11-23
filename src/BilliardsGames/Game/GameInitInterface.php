<?php
/**
 * Created by PhpStorm.
 * User: Diana Bakalska
 * Date: 10/28/2016
 * Time: 10:54 AM
 */

namespace BilliardsGames\Game;

use BilliardsGames\Player\PlayerInterface;

interface GameInitInterface
{
    public function addPlayer(PlayerInterface $player);

    public function rack();

    public function init();
}
