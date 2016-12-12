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
    public $balls;

    /**
     * Player constructor.
     * @param $name
     * @param $rank - int range(1,10)
     * @param $balls - array
     */
    public function __construct($name, $rank, $balls = [])
    {
        $this->name = $name;
        $this->rank = $rank;
        $this->balls = $balls;
    }

    /**
     * Player constructor.
     * @param $name
     * @param $rank - int range(1,10)
     */
/*    public function __construct()
    {
        $this->name = readline("Add a name for player: " . PHP_EOL);
        $this->rank = readline("Add a rank (from 1 to 10) for player: " . PHP_EOL);
    }*/




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

    public function getBalls()
    {
        return $this->balls;
    }

    /**
     * @param array $balls
     */
    public function setBalls(array $balls)
    {
        $this->balls = $balls;
    }
}
