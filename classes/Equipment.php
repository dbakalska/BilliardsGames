<?php

/**
 * Created by PhpStorm.
 * User: Diana Bakalska
 * Date: 10/27/2016
 * Time: 6:23 PM
 */
class Equipment
{
    protected $cue;
    protected $chalk;
    protected $rest;
    protected $triangle;

    /**
     * Equipment constructor.
     * @param $cue
     * @param $chalk
     * @param $rest
     * @param $triangle
     */
    public function __construct($cue, $chalk, $rest, $triangle)
    {
        $this->cue = $cue;
        $this->chalk = $chalk;
        $this->rest = $rest;
        $this->triangle = $triangle;
    }


}