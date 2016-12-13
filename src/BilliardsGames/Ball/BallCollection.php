<?php
/**
 * Created by PhpStorm.
 * User: Diana Bakalska
 * Date: 12/7/2016
 * Time: 3:37 PM
 */

namespace BilliardsGames\Ball;

class BallCollection implements BallCollectionInterface
{
    private $balls = array();

    public function addBall($ball, $key = null)
    {
        if ($key == null) {
            $this->balls[] = $ball;
        } else {
            if (isset($this->balls[$key])) {
                throw new KeyHasUseException("Key $key already in use.");
            } else {
                $this->balls[$key] = $ball;
            }
        }
    }

    public function deleteBall($key)
    {
        if (isset($this->balls[$key])) {
            unset($this->balls[$key]);
//            $this->balls = array_values($this->balls);
        } else {
            throw new KeyInvalidException("Invalid key $key.");
        }
    }

    public function getBall($key)
    {
        if (isset($this->balls[$key])) {
            return $this->balls[$key];
        } else {
            throw new KeyInvalidException("Invalid key $key.");
        }
    }

    public function setBalls(array $balls)
    {
        $this->balls = $balls;
    }

    public function getBalls(): array
    {
        return $this->balls;
    }

    public function length()
    {
        return count($this->balls);
    }

    public function keyExists($key)
    {
        return isset($this->items[$key]);
    }
}
