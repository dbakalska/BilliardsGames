<?php

/**
 * Created by PhpStorm.
 * User: Diana Bakalska
 * Date: 10/27/2016
 * Time: 6:22 PM
 */
abstract class BilliardsTable
{
    protected $pockets;
    protected $dimensions;

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