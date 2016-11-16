<?php

/**
 * Created by PhpStorm.
 * User: Diana Bakalska
 * Date: 10/27/2016
 * Time: 6:23 PM
 */

namespace BilliardsGames\Ball;

abstract class AbstractBall implements BallCollectionInterface
{
    protected $color;
    protected $number;
    protected $width;
    protected $height;
    protected $positionX;
    protected $positionY;
    protected $texture;
    protected $speed;

    /**
     * AbstractBall constructor.
     * @param $color
     * @param $number
     * @param $width
     * @param $height
     * @param $positionX
     * @param $positionY
     * @param $texture
     */
    public function __construct($color, $number, $width, $height, $positionX, $positionY, $texture, $speed)
    {
        $this->color = $color;
        $this->number = $number;
        $this->width = $width;
        $this->height = $height;
        $this->positionX = $positionX;
        $this->positionY = $positionY;
        $this->texture = $texture;
        $this->speed = $speed;
    }
}
