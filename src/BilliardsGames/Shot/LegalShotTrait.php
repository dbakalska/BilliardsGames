<?php
/**
 * Created by PhpStorm.
 * User: Diana Bakalska
 * Date: 11/14/2016
 * Time: 12:26 PM
 */

namespace BilliardsGames\Shot;

trait LegalShotTrait
{
    protected $cueBall;
    protected $ballOn;
    protected $foul = false;
    protected $inPocket = false;

    public function isLegalShot()
    {
        $this->foul = true;

        if (!haveContactWithBallOn($this->ballOn)) {
            return false;
        }

        if (isBallPotted($this->cueBall)) {
            return false;
        }

        if (isBallPotted(!$this->ballOn)) {
            return false;
        }

        $this->foul = false;

        return true;
    }

    public function haveContactWithBallOn(BallOn $ballOn)
    {
        return $ballOn->isHit();
    }

    public function forcedOffTheTable($ball)
    {
        if ($ball->isInPocket) {
            return true;
        }
    }

    public function isBallPotted($ball)
    {
        if ($ball->isInPocket()) {
            $this->removeBallFromCollection($ball);
        }
        return true;
    }

    public function isInPocket(): bool
    {
        return $this->inPocket;
    }

    public function setInPocket(bool $inPocket)
    {
        $this->inPocket = $inPocket;
    }
}
