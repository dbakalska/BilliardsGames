<?php
/**
 * Created by PhpStorm.
 * User: Diana Bakalska
 * Date: 11/4/2016
 * Time: 10:06 AM
 */

require 'vendor/autoload.php';

$game = new \BilliardsGames\Game\Type\PoolEightBall();
$game->addPlayer(new \BilliardsGames\Player\Player('edno', 6));
$game->addPlayer(new \BilliardsGames\Player\Player('dve', 9));
// $game->addPlayer(new \BilliardsGames\Player\Player('tri'));
// $game->addPlayer(new \BilliardsGames\Player\Player('chetiri'));
$game->init();
//$game->start();
$game->startGame();


print_r($game->getScores());


/*
$game_8 = new \BilliardsGames\Game\Type\PoolEightBall();
print_r($game_8->getBalls());

$game_9 = new \BilliardsGames\Game\Type\PoolNineBall();
print_r($game_9->getBalls());

$game_10 = new \BilliardsGames\Game\Type\PoolTenBall();
print_r($game_10->getBalls());

$snooker = new \BilliardsGames\Game\Type\Snooker();
print_r($snooker->getBalls());
$snooker = new \BilliardsGames\Game\Type\Snooker();
print_r($snooker->getBalls());
*/
