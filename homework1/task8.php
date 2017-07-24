<?php
$str = 'Мама мыла раму';
$newStr;

echo $str . '<br>';
$array = explode(" ", $str);

print_r($array);

$i = count($array) - 1;
while ($i >= 0) {
    $newStr .= $array[$i] . '|';
    $i--;
}

echo '<br>' . $newStr;
