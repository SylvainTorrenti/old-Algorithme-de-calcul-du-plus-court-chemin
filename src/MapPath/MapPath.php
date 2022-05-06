<?php

class MapPath
{

    // private Map $map;
    private array $currentPoint;
    private array $end;
    private array $currentPath;
    private Point $points;


    public function __construct($map, array $currentPoint, array $end, array $currentPath)
    {
        $this->map = $map;
        $this->currentPoint = $currentPoint;
        $this->end = $end;
        $this->currentPath = $currentPath;
    }


    public function do($map, $currentPoint, $end, $currentPath)
    {
        $currentPath[] = $currentPoint;
        if (!empty($shortestPath) && count($currentPath) >= count($shortestPath)) {
            return;
        }
        //si le point actuel = à l'arrivée alors le chemin le plus court = le chemin actuel
        if ($currentPoint[0] == $end[0] && $currentPoint[1] == $end[1]) {
            $shortestPath = $currentPath;
            return;
        }

        //creation des points aux alentours pour connaître leur valeur.
        // $points = new Point($currentPoint);
        // $points->getPoints();
        echo '<pre>';
        // var_dump($points);
        echo '<pre>';
        // un point = [x, y]
        $points = [
            [$currentPoint[0] - 1, $currentPoint[1]],
            [$currentPoint[0] + 1, $currentPoint[1]],
            [$currentPoint[0], $currentPoint[1] - 1],
            [$currentPoint[0], $currentPoint[1] + 1],
        ];
        foreach ($points as $point) {
            // var_dump($point);
            //si x ou y est négatifs ou si x ou u sors de la map tu continue 
            if ($point[0] < 0 || $point[1] < 0 || $point[0] >= count(array($map)) || $point[1] >= count(array($map)[0])) {
                echo 'hello 1 <br>';
                // var_dump($point);
                continue;
            }
            //si le point est égale à 0 tu continue
            if (0 == array($map[$point[0]][$point[1]])) {
                echo 'hello 2 <br>';
                // var_dump($point);
                continue;
            }
            //si le point est déjà dans le trajet tu continue
            if (in_array($point, $currentPath)) {
                echo 'hello 3 <br>';
                continue;
            }

            $this->do($map, $point, $end, $currentPath);
            // var_dump($this->do($map, $point, $end, $currentPath));
        }
    }
}