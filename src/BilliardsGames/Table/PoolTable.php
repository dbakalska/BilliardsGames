<?php

/**
 * Created by PhpStorm.
 * User: Diana Bakalska
 * Date: 10/28/2016
 * Time: 10:57 AM
 */

namespace BilliardsGames\Table;

class PoolTable extends BilliardsTable
{
    const POOL_WIDTH = 4.5;
    const POOL_LENGTH = 9;

    public function __construct()
    {
        parent::__construct(static::POOL_WIDTH, static::POOL_LENGTH);
    }
}
