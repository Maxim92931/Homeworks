<?php
require_once "functions.php";

echo '<h3>Задание №1</h3>';
task1(['111', '222', '333', '444'], true);

echo '<hr>';
echo '<h3>Задание №2</h3>';
task2([23, 0, 0, -6.32], '/');

echo '<hr>';
echo '<h3>Задание №3</h3>';
task3('/', 2, 4.9, 0, 8, 10);

echo '<hr>';
echo '<h3>Задание №4</h3>';
task4(7, 12);

echo '<hr>';
echo '<h3>Задание №5</h3>';
$str = 'Аргентина манит негра';
isPalindrome(task5($str), $str);

echo '<hr>';
echo '<h3>Задание №6</h3>';
task6();

echo '<hr>';
echo '<h3>Задание №7</h3>';
task7();

echo '<hr>';
echo '<h3>Задание №8</h3>';
task8('​ RX packets:2563 errors:0 dropped:0 overruns:0 frame:0.:)');

echo '<hr>';
echo '<h3>Задание №9</h3>';
task9('test.txt');

task10();
