<?php
/**
 * Created by PhpStorm.
 * User: Diana Bakalska
 * Date: 11/7/2016
 * Time: 3:07 PM
 */

namespace BilliardsGames\Game;

use BilliardsGames\Game\Turn\Breakshot;
use BilliardsGames\Game\Turn\Turn;
use BilliardsGames\Player\PlayerIterator;

class GameLoopIterator implements \Iterator
{
    /* @var BilliardsGames\Game\PlayerIterator */
    protected $players = [];

    /* @var BilliardsGames\Game\Turn\Turn[] */
    protected $turns = [];

    /* @var int */
    protected $position = 0;

    /* @var int */
    protected $playerIndex;

    public function __construct(PlayerIterator $players)
    {
        $this->players = $players;
    }

    public function current()
    {
        return $this->turns[$this->position];
    }

    public function next()
    {
        if (empty($this->turns)) {
            print_r('BREAKSHOT' . PHP_EOL);
            $breakshot = new Breakshot($this->currentPlayer());
            $breakshot->setIsValid(true);
            $this->turns[$this->position] = $breakshot;
            return $breakshot;
        }
        if ($this->current()->getIsFinal()) {
            print_r('END OF TURNS' . PHP_EOL);
            return false;
        }
        print_r('SHOT' . PHP_EOL);
        $nextPlayer = $this->currentPlayer();
        if (!$this->valid()) {
            $nextPlayer = $this->nextPlayer();
        }
        $nextTurn = new Turn($nextPlayer);
        $this->position++;
        $this->turns[$this->position] = $nextTurn;
        return $nextTurn;
    }

    protected function currentPlayer()
    {
        $player = $this->players->current();
        print_r('CURRENT PLAYER: ' . $player->getName() . PHP_EOL);
        return $player;
    }

    public function nextPlayer()
    {
        $this->players->next();
        $player = $this->players->current();
        print_r('NEXT PLAYER: ' . $player->getName() . PHP_EOL);
        return $player;
    }

    public function key()
    {
        return $this->position;
    }

    public function valid()
    {
        $shot = $this->current();
        $valid = $shot->getIsValid();
        $message = $valid ? 'VALID' : 'NOT VALID!! - CHANGE PLAYER';
        print_r(basename(get_class($shot)) . ' SHOT IS: ' . $message . PHP_EOL);
        return $valid;
    }

    public function rewind()
    {
        // Rewind the Iterator to the first element
    }
}