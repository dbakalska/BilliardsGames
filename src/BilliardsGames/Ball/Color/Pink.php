<?php
/**
 * Created by PhpStorm.
 * User: Diana Bakalska
 * Date: 11/22/2016
 * Time: 12:49 PM
 */

namespace BilliardsGames\Ball\Color;

use BilliardsGames\Ball\PoolBallInterface;
use BilliardsGames\Ball\SnookerBallInterface;

class Pink extends AbstractBallColor implements SnookerBallInterface
{
    const COLOR = 'pink';
}