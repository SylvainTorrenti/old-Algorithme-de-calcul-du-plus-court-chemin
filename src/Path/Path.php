<?php
require_once 'Point/Point.php';

$shortestPath = [];

class Path
{

    private Map $map;
    private $currentPoint;
    private  $end;
    private  $currentPath;
    private Point $points;


    public function __construct($map,$currentPoint, $end, $currentPath)
    {
        $this->map = $map;
        $this->currentPoint = $currentPoint;
        $this->end = $end;
        $this->currentPath = $currentPath;
    }

    /**
     * Get the value of currentPath
     */ 
    public function getCurrentPath()
    {
        $currentPoint = new Point();
        $currentPath[] = $currentPoint;
        if (!empty($shortestPath) && count($currentPath) >= count($shortestPath)) {
            return;
        }
        //si le point actuel = à l'arrivée alors le chemin le plus court = le chemin actuel
        if ($currentPoint[0] == $end[0] && $currentPoint[1] == $end[1]) {
            $shortestPath = $currentPath;
            return;
        }
        return $this->currentPath;
    }
}