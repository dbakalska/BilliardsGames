<?php
/**
 * Created by PhpStorm.
 * User: Diana Bakalska
 * Date: 11/22/2016
 * Time: 2:59 PM
 */

namespace BilliardsGames\Ball;

class BallOn
{
    protected $hit = false;

    public function setBallOn($ballOn)
    {
        $this->ballOn = $ballOn;
    }

    public function getBallOn()
    {
        return $this->ballOn;
    }

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
