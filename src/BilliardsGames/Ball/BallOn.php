<?php
/**
 * Created by PhpStorm.
 * User: Diana Bakalska
 * Date: 11/22/2016
 * Time: 2:59 PM
 */

namespace BilliardsGames\Ball;

use BilliardsGames\Ball\Color\AbstractBallColor;
use BilliardsGames\Shot\LegalShotTrait;

class BallOn
{
    use BallTrait;

    protected $hit = false;

    public function isHit(): bool
    {
        return $this->hit;
    }

    public function setHit(bool $hit)
    {
        $this->hit = $hit;
        return $this;
    }

}
