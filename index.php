<?php
/**
 * Created by PhpStorm.
 * User: Diana Bakalska
 * Date: 11/4/2016
 * Time: 10:06 AM
 */

require 'vendor/autoload.php';
$config = require 'config/credentials.php';
require 'config/DBconnection.php';
require_once 'readline.php';

$game = new \BilliardsGames\Game\Type\PoolEightBall();

$playersArr = [
    0 => ['name' => 'Didi', 'rank' => 4],
    1 => ['name' => 'Peter', 'rank' => 7],
];
shuffle($playersArr);
foreach($playersArr as $pl) {
    $game->addPlayer(new \BilliardsGames\Player\Player($pl['name'], $pl['rank']));
}


$game->init();
$game->startGame();
//print_r($game->getScores());
