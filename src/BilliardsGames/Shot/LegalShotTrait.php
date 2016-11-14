<?php
/**
 * Created by PhpStorm.
 * User: Diana Bakalska
 * Date: 11/14/2016
 * Time: 12:26 PM
 */

trait LegalShotTrait
{
    protected $ballOn;
    protected $ballPotted;
    protected $foul = false;
    protected $forcedOffTheTable;
    protected $haveContactWithBallOn;
    protected $cueBall = \BilliardsGames\Ball\Color\AbstractBallColor::CUEBALL;

    public function isLegalShot()
    {
        if (!$this->cueBall == $this->haveContactWithBallOn ||
            ($this->cueBall || $this->ballOn) == $this->forcedOffTheTable ||
            $this->cueBall == $this->ballPotted ||
            $this->ballPotted != $this->ballOn
        ) {
            $this->foul = true;
            return false;
        }
        return;
    }
}
