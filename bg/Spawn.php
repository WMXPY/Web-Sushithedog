<?php
$mode = $_GET['mode'];
$contentd = file_get_contents('savedmap.json');
$map = json_decode($contentd);
$size = count($map)-1;
function dothis($map)
{
    $size = count($map)-1;
    $landsize = $map[$size][0];
    $rand = mt_rand(0, $landsize);
    $cound = 0;
    for ($x=0;$x<$size;$x++) {
        for ($y=0;$y<$size;$y++) {
            if ($map[$x][$y][2]!=0) {
                if ($rand == $cound) {
                    $map[$x][$y][1] .= ' tblue-meng';
                    $map[$size][2][0][0] = 6;
                    $map[$size][2][0][1] = $map[$x][$y][5][1];
                    $map[$size][2][0][2] = $map[$x][$y][5][2];
                    $map[$size][2][0][3] = 10;
                    $map[$size][2][0][4] = 6;
                    $cound = $rand+$landsize;
                    $map[$x][$y][6][0][1] = 1;
                    $map[$x][$y][6][0][0] = 1;
                    $map[$size][1] = 1;
                    break;
                }
                $cound ++;
            }
        }
    }
    $output = json_encode($map);
    file_put_contents('savedmap.json', $output);
    // array_pop($map);
    echo json_encode($map);
}
if ($map[$size][1] == 0) {
    dothis($map);
}
