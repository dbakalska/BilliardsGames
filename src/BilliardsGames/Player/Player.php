<?php

/**
 * Created by PhpStorm.
 * User: Diana Bakalska
 * Date: 11/4/2016
 * Time: 4:39 PM
 */

namespace BilliardsGames\Player;

class Player implements PlayerInterface
{
    protected $name;

    /**
     * Player constructor.
     * @param $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
}
