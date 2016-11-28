<?php
/**
 * Created by PhpStorm.
 * User: Diana Bakalska
 * Date: 11/4/2016
 * Time: 10:06 AM
 */

require 'vendor/autoload.php';
require 'config/DBconnection.php';

$game = new \BilliardsGames\Game\Type\PoolEightBall();
$player1 = new \BilliardsGames\Player\Player('Peter', 6);
$player2 = new \BilliardsGames\Player\Player('George', 9);
$game->addPlayer($player1);
$game->addPlayer($player2);
$player1details = [$player1->getName(), $player1->getRank()];
$player2details = [$player2->getName(), $player2->getRank()];
$players = [$player1->getName(),$player2->getName()];
$firstPlayer = $players[array_rand($players)];
$breakshot = new \BilliardsGames\Game\Turn\Breakshot($firstPlayer);
$breakshot->setIsValid(true);


//$query = "INSERT INTO Players (Name, Rank) VALUES ($player1->getName(), $player1->getRank())";
//$query = "SELECT * FROM players WHERE Id = 1";
//print_r($result = $connection->query($query));

$query = "INSERT INTO Players (Name, Rank) VALUES (?, ?)";
$result = $connection->prepare($query);
$result->execute(array('Peter', 6));


$game->init();
//$game->start();
//$game->startGame();


//print_r($game->getScores());


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
