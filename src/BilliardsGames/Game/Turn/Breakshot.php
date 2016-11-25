<?php

namespace BilliardsGames\Game\Turn;

use BilliardsGames\Game\Game;
use BilliardsGames\Shot\LegalShotTrait;

class Breakshot extends Turn
{
    use LegalShotTrait;

    public function breakShot()
    {
        if ($this->rack() && $this->isLegalShot()) {
            return true;
        }
        return false;
    }
}
