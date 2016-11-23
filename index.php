<?php
/**
 * Created by PhpStorm.
 * User: Diana Bakalska
 * Date: 11/4/2016
 * Time: 10:06 AM
 */

require 'vendor/autoload.php';

$game = new \BilliardsGames\Game\Game();
$player1 = new \BilliardsGames\Player\Player('edno');
$player2 = new \BilliardsGames\Player\Player('dve');
$game->addPlayer($player1);
$game->addPlayer($player2);
$game->init();
$game->start();
$game->addScore($player1, 40);
$game->changePlayersTurn();
$game->addScore($player2, 2);
print_r($game->getScores());


/*$game_8 = new \BilliardsGames\Game\Type\PoolEightBall();
print_r($game_8->getBalls());

$game_9 = new \BilliardsGames\Game\Type\PoolNineBall();
print_r($game_9->getBalls());

$game_10 = new \BilliardsGames\Game\Type\PoolTenBall();
print_r($game_10->getBalls());

$snooker = new \BilliardsGames\Game\Type\Snooker();
print_r($snooker->getBalls());*/