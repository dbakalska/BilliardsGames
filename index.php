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

use \Mailjet\Resources;

$mj = new \Mailjet\Client($config['Mailjet']['apikey'], $config['Mailjet']['apisecret']);
$mj->setSecureProtocol(false);

$response = $mj->get(\Mailjet\Resources::$Contact);

//var_dump($response->getReasonPhrase()); exit;
if ($response->success())
    print_r($response->getData());
else
    var_dump($response->getStatus());

//$body = [
//    'Recipients' => [
//        [
//            'Email' => "deangelis@abv.bg",
//            'Name' => "Mailjet"
//        ]
//    ]
//];
//$id = 1;
//$response = $mj->post(Resources::$NewsletterTest, ['id' => $id, 'body' => $body]);

$body = [
    'Email' => "dbakalska.it+1@gmail.com",
];
$response = $mj->post(Resources::$Contact, ['body' => $body]);
$response->success() && var_dump($response->getData());
//




/*$game = new \BilliardsGames\Game\Type\PoolEightBall();
$player1 = new \BilliardsGames\Player\Player('Peter', 6);
$player2 = new \BilliardsGames\Player\Player('George', 9);
$game->addPlayer($player1);
$game->addPlayer($player2);
$player1details = [$player1->getName(), $player1->getRank()];
$player2details = [$player2->getName(), $player2->getRank()];
$players = [$player1->getName(),$player2->getName()];
$firstPlayer = $players[array_rand($players)];
$breakshot = new \BilliardsGames\Game\Turn\Breakshot($firstPlayer);
$breakshot->setIsValid(true);*/

//$game->init();
//$game->startGame();
//print_r($game->getScores());


/* SQL queries
$query = "CREATE TABLE players (
id INT(6) AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
rank INT(2) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP
)";
$result = $connection->query($query);

$query = "INSERT INTO Players (Name, Rank) VALUES (?, ?)";
$result = $connection->prepare($query);
$result->execute(array($player1->getName(), $player1->getRank()));

$query = "INSERT INTO Players (Name, Rank) VALUES (?, ?)";
$result = $connection->prepare($query);
$result->execute(array($player2->getName(), $player2->getRank()));

$result = $connection->prepare("SELECT * FROM players WHERE 1");
$result->execute();
print_r($result->fetchAll(PDO::FETCH_ASSOC));

$result = $connection->prepare("UPDATE players SET email = 'dbakalska.it@gmail.com' WHERE id = 2");
$result->execute();
*/

