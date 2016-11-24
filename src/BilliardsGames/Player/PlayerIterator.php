<?php
/**
 * Created by PhpStorm.
 * User: Diana Bakalska
 * Date: 11/7/2016
 * Time: 3:07 PM
 */

namespace BilliardsGames\Player;

class PlayerIterator extends \InfiniteIterator
{
    public function __construct(array $players = [])
    {
        parent::__construct(new \ArrayIterator($players));
        $this->rewind();
    }
}