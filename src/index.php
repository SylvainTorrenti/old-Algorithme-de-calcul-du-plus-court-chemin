<?php
require_once 'Map/Map.php';
require_once 'Point/Point.php';
require_once 'Path/Path.php';


$shortestPath = [];

$start = new Point(2,4);
$start->getPoint(2,4);

$end = new Point(1,0);
$end->getPoint(1,0);
$map = new Map();
$map->getMap();
$path = new Path($map, $start, $end, []);
// $mapPath->do($map, $start, $end, []);
echo '<pre>';
// var_dump($path);
// var_dump($mapPath);
// var_dump($shortestPath);
echo '<pre>';

// Display result
foreach (array($path) as $r => $row) {
    echo '|';
    var_dump($row);
    foreach (array($row) as $c => $cell) {
        // var_dump($shortestPath);
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
