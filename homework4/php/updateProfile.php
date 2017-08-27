<?php

require_once "Db.php";

$filename = null;
$id = \db\Db::getId($_COOKIE['login']);


if (isset($_FILES['photo'])) {
    $filename = $_FILES['photo']['name'];

    $ext = substr($filename, strrpos($filename, '.'), strlen($filename) - 1);
    $filename = '';
    $filename = $id . $ext;

    move_uploaded_file($_FILES['photo']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . '/homework4/photos/' . $filename);

}

\db\Db::updateProfile($_POST['name'], $_POST['age'], $_POST['about'], $filename);
