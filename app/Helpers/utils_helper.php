<?php


function debugDatas($d)
{
    if (is_array($d) || is_object($d)) {
        echo '<pre>';
        var_dump($d);
    } else {
        echo $d;
    }
}

function response(array $data): void
{
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
    header('Access-Control-Allow-Headers: Content-Type');
    header('Content-Type: application/json');

    echo json_encode($data);
}
