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
$player1 = new \BilliardsGames\Player\Player('Didi', 6);
$player2 = new \BilliardsGames\Player\Player('Pesho', 4);
$game->addPlayer($player1);
$game->addPlayer($player2);
$player1details = [$player1->getName(), $player1->getRank()];
$player2details = [$player2->getName(), $player2->getRank()];
$players = [$player2->getName(),$player2->getName()];
//
//print_r($player1details);
//print_r($player2details);

//$firstPlayer = $players[array_rand($players)];
//$breakshot = new \BilliardsGames\Game\Turn\Breakshot($firstPlayer);
//$breakshot->setIsValid(true);

$game->init();
$game->startGame();
//print_r($game->getScores());

/*use \Mailjet\Resources;

$mj = new \Mailjet\Client($config['Mailjet']['apikey'], $config['Mailjet']['apisecret']);
$mj->setSecureProtocol(false);*/
