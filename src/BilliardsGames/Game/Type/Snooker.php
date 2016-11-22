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
use BilliardsGames\Table\SnookerTable;

class Snooker extends Game implements BallCollectionInterface
{
    protected $table;

    public function __construct()
    {
        $this->table = new SnookerTable();
    }

    public function getBalls()
    {
        $balls = [];
        for ($i = 0; $i < 15; $i++) {
            $balls[] = new Color\Red;
        }
        $balls[] = new Color\Yellow();
        $balls[] = new Color\Green();
        $balls[] = new Color\Brown();
        $balls[] = new Color\Blue();
        $balls[] = new Color\Pink();
        $balls[] = new Color\Black();
        return $balls;
    }
}
