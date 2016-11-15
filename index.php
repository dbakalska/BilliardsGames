<?php
/**
 * Created by PhpStorm.
 * User: Diana Bakalska
 * Date: 11/4/2016
 * Time: 10:06 AM
 */

require 'vendor/autoload.php';

$player1 = new BilliardsGames\Player\Player('Diana');
$player2 = new BilliardsGames\Player\Player('Ilko');
echo $player1->getName();
echo "\n";
echo $player2->getName();
echo "\n";

$game = new BilliardsGames\Game\Game();
$game->addPlayer($player1)
    ->addPlayer($player2)
    ->init();

