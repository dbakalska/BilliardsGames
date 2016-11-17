<?php
/**
 * Created by PhpStorm.
 * User: Diana Bakalska
 * Date: 11/4/2016
 * Time: 10:06 AM
 */

require 'vendor/autoload.php';


$gameplay = new Gameplay;
$player1 = new Player('edno');
$player2 = new Player('dve');
$gameplay->addPlayer($player1);
$gameplay->addPlayer($player2);


/*
echo '<pre>';
print_r($gameplay->getScores());
print_r($gameplay->getScore($player1));
print_r($gameplay->getScore($player2));
echo '</pre>';
$gameplay->addScore($player1, 20);
$gameplay->addScore($player2, 5);
$gameplay->addScore($player1, 13);
echo '<pre>';
print_r($gameplay->getScores());
print_r($gameplay->getScore($player1));
print_r($gameplay->getScore($player2));
echo '</pre>';*/