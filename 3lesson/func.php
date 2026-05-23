<?php 
function sum($a = null, $b = 6){
    $c = $b + $a;
    return $c;
}

function my_array_keys($ar){
    $data = [];
    foreach($ar as $key => $name){
       $data[] = $key;
    }
    return $data;
}
?>