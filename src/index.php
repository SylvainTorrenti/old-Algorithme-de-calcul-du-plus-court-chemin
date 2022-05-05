<?php

global $shortestPath;
//la map
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


//points autour du currentpoint
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

    /**
     * Set the value of points
     *
     * @return  self
     */
    public function setPoints($points)
    {
        $points = [
            [$this->currentPoint[0] - 1, $this->currentPoint[1]],
            [$this->currentPoint[0] + 1, $this->currentPoint[1]],
            [$this->currentPoint[0], $this->currentPoint[1] - 1],
            [$this->currentPoint[0], $this->currentPoint[1] + 1],
        ];
        $this->points = $points;

        return $this;
    }
}
// recupération du trajet
class MapPath
{

    private $map;
    private array $start;
    private array $end;
    private array $currentPath;
    public Point $points;


    public function __construct($map, array $start, array $end, array $currentPath)
    {
        $this->map = $map;
        $this->start = $start;
        $this->end = $end;
        $this->currentPath = $currentPath;
    }


    public function do($map, $start, $end, $currentPath)
    {
        $currentPath[] = $start;
        if (!empty($shortestPath) && count($currentPath) >= count($shortestPath)) {
            return;
        }
        //si le point actuel = à l'arrivée alors le chemin le plus court = le chemin actuel
        if ($start[0] == $end[0] && $start[1] == $end[1]) {
            $shortestPath = $currentPath;
            return;
        }

        //creation des points aux alentours pour connaître leur valeur.
        $points = new Point($start);
        $points->getPoints();
        echo '<pre>';
        // echo gettype($points);
        // var_dump($points);
        echo '<pre>';
        
        foreach ($points as $point) {
            var_dump($point);
            //si x ou y est négatifs ou si x ou u sors de la map tu continue 
            if ($point[0] < 0 || $point[1] < 0 || $point[0] >= count(array($map)) || $point[1] >= count($map[0])) {
                continue;
            }
            //si le point est égale à 0 tu continue
            if (0 == $map[$point[0]][$point[1]]) {
                continue;
            }
            //si le point est déjà dans le trajet tu continue
            if (in_array($point, $currentPath)) {
                continue;
            }

            $this->do($map, $point, $end, $currentPath);
        }
    }
}



$start = [2, 4];
$end   = [1, 0];
$map = new Map();
$map->getMap();
$mapPath = new MapPath($map, $start, $end, []);
$mapPath->do($map, $start, $end, []);
echo '<pre>';
var_dump($mapPath);
echo '<pre>';

// Display result
foreach ($mapPath as $r => $row) {
    echo '|';
    var_dump($row);
    foreach ($row as $c => $cell) {
        var_dump($cell);
        if (($pos = array_search([$r, $c], $shortestPath)) !== false) {
            switch ($pos) {
                case 0:
                    echo 'D';
                    break;
                case count($shortestPath) - 1:
                    echo 'A';
                    break;
                default:
                    echo 'o';
                    break;
            }
        } else {
            echo ($cell ? ' ' : 'x');
        }
        echo '|';
    }
    echo PHP_EOL;
}
