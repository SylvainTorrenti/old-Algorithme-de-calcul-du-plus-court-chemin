<?php
class Map
{
    private $map = [
        [1, 1, 1, 1, 1],
        [1, 1, 0, 0, 1],
        [0, 1, 1, 0, 1],
        [0, 1, 1, 1, 1],
        [1, 1, 0, 1, 1],
        [1, 1, 1, 1, 0],
    ];

    /**
     * Get the value of map
     */
    public function getMap()
    {
        return $this->map;
    }
}