<?php

/**
 * Created by PhpStorm.
 * User: Diana Bakalska
 * Date: 10/28/2016
 * Time: 10:57 AM
 */

namespace BilliardsGames\Table;

class SnookerTable extends BilliardsTable
{
    const SNOOKER_WIDTH = 6;
    const SNOOKER_LENGTH = 12;

    public function __construct()
    {
        parent::__construct(static::SNOOKER_WIDTH, static::SNOOKER_LENGTH);
    }
}
