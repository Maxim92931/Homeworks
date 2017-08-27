<?php
require_once "Db.php";


$login = $_POST['login'];
$password = $_POST['password'];
$passwordRetry = $_POST['passwordRetry'];


if ($password == $passwordRetry) {
    \db\Db::signup($login, password_hash($password, PASSWORD_DEFAULT));
    echo true;
} else {
    echo false;
}
