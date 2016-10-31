<?php

/**
 * Created by PhpStorm.
 * User: Diana Bakalska
 * Date: 10/28/2016
 * Time: 5:54 PM
 */

namespace src;

class Shot
{
    protected $horizontalX;
    protected $verticalY;

    /**
     * AbstractShot constructor.
     * @param $horizontalX
     * @param $verticalY
     */
    public function __construct($horizontalX, $verticalY)
    {
        $this->horizontalX = $horizontalX;
        $this->verticalY = $verticalY;
    }

    protected function stopShot()
    {
        if ($this->horizontalX == 0 && $this->verticalY == 0) {
            return;
        }
    }

    protected function drawShot()
    {
        if ($this->horizontalX == 0 && ($this->verticalY == -1 || $this->verticalY == -2)) {
            return;
        }
    }

    protected function followShot()
    {
        if ($this->horizontalX == 0 && ($this->verticalY == 1 || $this->verticalY == 2)) {
            return;
        }
    }

    protected function leftSideSpin()
    {
        if (($this->horizontalX == -1 || $this->horizontalX == -2) && $this->verticalY == 0) {
            return;
        }
    }

    protected function rightSideSpin()
    {
        if (($this->horizontalX == 1 || $this->horizontalX == 2) && $this->verticalY == 0) {
            return;
        }
    }
}
