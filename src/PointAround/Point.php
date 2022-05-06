<?php

class Point
{
    public $points;
    public $currentPoint;

    public function __construct($currentPoint)
    {
        $this->currentPoint = $currentPoint;
    }


    /**
     * Get the value of points
     */
    public function getPoints()
    {
        $this->points = [
            [$this->currentPoint[0] - 1, $this->currentPoint[1]],
            [$this->currentPoint[0] + 1, $this->currentPoint[1]],
            [$this->currentPoint[0], $this->currentPoint[1] - 1],
            [$this->currentPoint[0], $this->currentPoint[1] + 1],
        ];
        return $this->points;
    }
}