<?php
/**
 * Created by PhpStorm.
 * User: Diana Bakalska
 * Date: 11/14/2016
 * Time: 12:26 PM
 */

namespace BilliardsGames\Shot;

use BilliardsGames\Ball\Color\AbstractBallColor as Color;

trait LegalShotTrait
{
    protected $ballOn;
    protected $ballPotted;
    protected $foul = false;
    protected $forcedOffTheTable;
    protected $haveContactWithBallOn;
    protected $cueBall = Color::CUEBALL;

    public function isLegalShot()
    {
        $this->foul = true;

        if ($this->cueBall !== $this->haveContactWithBallOn) {
            return false;
        }

        if (($this->cueBall || $this->ballOn) == $this->forcedOffTheTable) {
            return false;
        }
        if ($this->cueBall == $this->ballPotted) {
            return false;
        }

        if ($this->ballPotted != $this->ballOn) {
            return false;
        }

        $this->foul = false;

        return true;
    }
}