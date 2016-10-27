<?php

/**
 * Created by PhpStorm.
 * User: Diana Bakalska
 * Date: 10/27/2016
 * Time: 6:23 PM
 */
class Balls
{
    protected $color;
    protected $number;
    protected $size;
    protected $texture;

    /**
     * Balls constructor.
     * @param $color
     * @param $number
     * @param $size
     * @param $texture
     */
    public function __construct($color, $number, $size, $texture)
    {
        $this->color = $color;
        $this->number = $number;
        $this->size = $size;
        $this->texture = $texture;
    }

}