<?php

/**
 * Created by PhpStorm.
 * User: Diana Bakalska
 * Date: 10/28/2016
 * Time: 3:55 PM
 */

namespace BilliardsGames\Game\Type;

use BilliardsGames\Ball\BallCollectionInterface;
use BilliardsGames\Game\Game;
use BilliardsGames\Table\PoolTable;
use BilliardsGames\Ball\Color;

class PoolEightBall extends Game implements BallCollectionInterface
{
    protected $table;

    public function __construct()
    {
        $this->table = new PoolTable();
    }

    public function getBalls()
    {
        return [
            new Color\Yellow,
            new Color\Blue,
            new Color\Red,
            new Color\Pink,
            new Color\Orange,
            new Color\Green,
            new Color\Brown,
            new Color\Black,
            new Color\YellowStriped,
            new Color\BlueStriped,
            new Color\RedStriped,
            new Color\PinkStriped,
            new Color\OrangeStriped,
            new Color\GreenStriped,
            new Color\BrownStriped,
        ];
    }
}
