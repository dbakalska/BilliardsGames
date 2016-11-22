<?php

/**
 * Created by PhpStorm.
 * User: Diana Bakalska
 * Date: 10/28/2016
 * Time: 4:53 PM
 */

namespace BilliardsGames\Ball\Color;

use BilliardsGames\Ball\PoolBallInterface;

abstract class AbstractBallColor implements ColorInterface, PoolBallInterface
{
    const COLOR = 'not-set';

    public function getColor()
    {
        return static::COLOR;
    }
}
