<?php
$age = mt_rand(0, 150);

if ($age >= 18 && $age <= 65) {
    echo 'Вам еще работать и работать';
} else if ($age > 65) {
    echo 'Вам пора на пенсию';
} else if ($age >= 1 && $age <= 17) {
    echo 'Вам ещё рано работать';
} else {
    echo 'Неизвестный возраст';
}