<?php
$bmw = [
    'model' => 'X5',
    'speed' => 120,
    'doors' => 5,
    'year'  => '2015',
];

$toyota = [
    'model' => 'camry',
    'speed' => 140,
    'doors' => 4,
    'year'  => '2017',
];

$opel = [
    'model' => 'corsa',
    'speed' => 110,
    'doors' => 4,
    'year'  => '2016',
];

$result = array();

$result['BMW'] = $bmw;
$result['TOYOTA'] = $toyota;
$result['OPEL'] = $opel;


foreach ($result as $key => $value) {
    echo 'CAR ' . $key . '<br>';

    foreach ($value as $marka) {
        echo $marka . ' ';
    }
    echo '<br><br>';
}
