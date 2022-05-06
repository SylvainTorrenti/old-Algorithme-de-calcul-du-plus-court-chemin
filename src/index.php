<?php
require_once 'Map/Map.php';
require_once 'PointAround/Point.php';
require_once 'MapPath/MapPath.php';

global $shortestPath;

$start = [2, 4];
$end   = [1, 0];
$map = new Map();
$map->getMap();
$mapPath = new MapPath($map, $start, $end, []);
$mapPath->do($map, $start, $end, []);
echo '<pre>';
// var_dump($mapPath);
echo '<pre>';

// Display result
foreach (array($mapPath) as $r => $row) {
    echo '|';
    // var_dump($row);
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
