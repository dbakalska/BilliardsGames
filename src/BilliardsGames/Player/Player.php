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
    public $name;
    public $rank;

    /**
     * Player constructor.
     * @param $name
     * @param $rank - int range(1,10)
     */
    public function __construct($name, $rank)
    {
        $this->name = $name;
        $this->rank = $rank;
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

    /**
     * @return mixed
     */
    public function getRank()
    {
        return $this->rank;
    }

    /**
     * @param mixed $rank
     */
    public function setRank($rank)
    {
        $this->rank = $rank;
    }

}
