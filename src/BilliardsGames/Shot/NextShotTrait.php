<?php
/**
 * Created by PhpStorm.
 * User: Diana Bakalska
 * Date: 11/17/2016
 * Time: 10:32 AM
 */

namespace BilliardsGames\Shot;

use BilliardsGames\Ball\Color\AbstractBallColor;
use BilliardsGames\Ball\BallCollectionInterface;

trait NextShotTrait
{
    use LegalShotTrait;

    protected $ballCollection = [];

    public function isBallPotted()
    {
        if ($this->isLegalShot()) {
            if ($this->ballOn == $this->ballPotted) {
                $this->ballOn == $this->removeBallFromCollection();
            }
            return true;
        }
    }

    public function removeBallFromCollection($ballPotted, BallCollectionInterface $ballCollection)
    {
        if ($this->ballOn == $this->ballPotted) {
            unset($ballCollection[$ballPotted]);
        }
    }

    public function nextShot()
    {
        if ($this->isBallPotted()) {
            $this->getBallOn();
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
