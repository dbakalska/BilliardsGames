<?php
/**
 * Created by PhpStorm.
 * User: Diana Bakalska
 * Date: 11/14/2016
 * Time: 11:19 AM
 */

namespace BilliardsGames\Shot;

use BilliardsGames\Ball\BallCollectionInterface;

class BreakShot
{
    use LegalShotTrait;

    protected $ballCollection = [];
    protected $breakShot = false;

    public function isRack(BallCollectionInterface $ballCollection)
    {
        if ($ballCollection && $this->cueBall) {
            if ($this->isLegalShot()) {
                $this->breakShot = true;
            }
            return true;
        }
        return false;
    }
}