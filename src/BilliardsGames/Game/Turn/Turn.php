<?php

namespace BilliardsGames\Game\Turn;

use BilliardsGames\Player\PlayerInterface;

class Turn
{
    protected $isValid = false;
    protected $player;

    public function __construct(PlayerInterface $player)
    {
        $this->player = $player;
    }

    /**
     * Gets the value of isValid.
     *
     * @return bool
     */
    public function getIsValid()
    {
        return $this->isValid;
    }

    /**
     * Sets the value of isValid.
     *
     * @param bool $isValid the is valid
     *
     * @return self
     */
    public function setIsValid($isValid)
    {
        $this->isValid = $isValid;

        return $this;
    }

    /**
     * Gets the value of player.
     *
     * @return BilliardsGames\Player\PlayerInterface
     */
    public function getPlayer()
    {
        return $this->player;
    }
}
