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
use BilliardsGames\Ball\Color;
use BilliardsGames\Table\PoolTable;

class PoolNineBall extends Game implements BallCollectionInterface
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
        return $balls;
    }
}
