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
    protected $pockets;
    protected $dimensions;
    protected $startingPoint;

    /**
     * BilliardsTable constructor.
     * @param $pockets
     * @param $dimensions
     */
    public function __construct($pockets, $dimensions)
    {
        $this->pockets = $pockets;
        $this->dimensions = $dimensions;
    }



}
