<?php

class Point
{
    public $point;
    /**
     * Get the value of points
     */
    public function getPoint($x, $y)
    {
        $this->points = [
            [$x, $y]
        ];
        return $this->point;
    }
}