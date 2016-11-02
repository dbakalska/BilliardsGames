<?php
/**
 * Created by PhpStorm.
 * User: Diana Bakalska
 * Date: 10/28/2016
 * Time: 10:54 AM
 */

namespace BilliardsGames\Game;

interface GameCharacteristicsInterface
{
    public function startOfTheGame();

    public function breakShot();

    public function isLegalShot();

    public function ballPotted();

    public function foul();

    public function ballOn();

    public function nextShot();

    public function break();

    public function playersTurn();

}
