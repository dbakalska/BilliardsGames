<?php
/**
 * Created by PhpStorm.
 * User: Diana Bakalska
 * Date: 11/17/2016
 * Time: 10:32 AM
 */

namespace BilliardsGames\Shot;

use BilliardsGames\Ball\BallCollectionInterface;

trait NextShotTrait
{
    use LegalShotTrait;

    protected $ballPotted;
    protected $ballCollection = [];

    public function removeBallFromCollection($ball)
    {
        if ($this->isBallPotted($ball)) {
            unset($this->ballCollection[$this->ballPotted]);
        }
    }

    public function setBallOn($ballOn)
    {
        $this->ballOn = $ballOn;
    }

    public function getBallOn()
    {
        return $this->ballOn;
    }
}
