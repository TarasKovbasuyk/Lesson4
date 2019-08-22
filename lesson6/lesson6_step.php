<?php
$arrayValue = range(90,150,3);
$arrayKey = range(150,90,-3);
$array = array_combine ($arrayKey,$arrayValue);
foreach ($array as $key => $value){
    echo $key .  " - "  . $value . "<br>";
}
$arrayTwo = $array;
ksort($arrayTwo);
foreach ($arrayTwo as $key => $value){
    echo $key .  " - "  . $value . "<br>";
}
