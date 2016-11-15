<?php
/**
 * Created by PhpStorm.
 * User: Diana Bakalska
 * Date: 10/28/2016
 * Time: 10:54 AM
 */

namespace BilliardsGames\Game;

interface GameInitInterface
{
    public function addPlayer();

    public function init();

    public function start();
}
