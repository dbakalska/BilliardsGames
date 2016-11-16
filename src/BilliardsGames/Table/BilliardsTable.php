<?php

/**
 * Created by PhpStorm.
 * User: Diana Bakalska
 * Date: 10/27/2016
 * Time: 6:22 PM
 */

namespace BilliardsGames\Table;

abstract class BilliardsTable
{
    const POCKETS = 6;
    protected $width;
    protected $length;

    public function __construct($pockets, $width, $length)
    {
        $this->$pockets = self::POCKETS;
        $this->$width = $width;
        $this->$length = $length;
    }
}
