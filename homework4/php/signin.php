<?php

require_once "Db.php";

$login = $_POST['login'];
$password = $_POST['password'];

$result = \db\Db::signin($login, $password);
if ($result == 'Пароли совпадают') {
    setcookie('login', $login, time() + 86000, '/');
    echo true;
} else {
    echo $result;
}
