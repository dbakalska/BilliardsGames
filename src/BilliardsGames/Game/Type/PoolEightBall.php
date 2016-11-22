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
        $balls = [];
        $balls[] = new Color\Yellow();
        $balls[] = new Color\Blue();
        $balls[] = new Color\Red();
        $balls[] = new Color\Pink();
        $balls[] = new Color\Orange();
        $balls[] = new Color\Green();
        $balls[] = new Color\Brown();
        $balls[] = new Color\Black();
        $balls[] = new Color\YellowStriped();
        $balls[] = new Color\BlueStriped();
        $balls[] = new Color\RedStriped();
        $balls[] = new Color\PinkStriped();
        $balls[] = new Color\OrangeStriped();
        $balls[] = new Color\GreenStriped();
        $balls[] = new Color\BrownStriped();
        return $balls;
    }
}
