<?php

namespace db;

use PDO;
use PDOException;

if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'checkLogin':
            Db::checkLogin($_POST['login']);
            break;
    }
}

class Db
{
    public static function getConnection()
    {
        $params = include($_SERVER['DOCUMENT_ROOT'] . '/config.php');

        $paramsStr = "mysql:host={$params['host']};dbname={$params['dbname']}; charset=utf8";
        $connection = new PDO($paramsStr, $params['user'], $params['pass']);

        return $connection;
    }

    public static function signin($login, $password)
    {
        try {
            $connection = Db::getConnection();
            $stmt = $connection->prepare("SELECT password FROM Users WHERE login = :login");
            $stmt->execute([':login'=>$login]);

            if ($pass = $stmt->fetch()[0]) {
                if (password_verify($password, $pass)) {
                    return 'Пароли совпадают';
                } else {
                    return 'Неверный пароль';
                }
            } else {
                return 'Неверный логин';
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            die();
        }
    }

    public static function signup($login, $password)
    {
        try {
            $connection = self::getConnection();
            $stmt = $connection->prepare("INSERT INTO Users (login, password) VALUES (:login, :password)");
            $result = $stmt->execute([
                ':login' => $login,
                ':password' => $password
            ]);
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            die();
        }
    }

    public static function checkLogin($login)
    {
        try {
            $connection = Db::getConnection();
            $stmt = $connection->prepare("SELECT COUNT(*) FROM Users WHERE login = :login");
            $stmt->execute([':login'=>$login]);

            if ($stmt->fetch()[0] != 0) {
                echo false;
            } else {
                echo true;
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            die();
        }
    }

    public static function getUserData($login) : array
    {
        try {
            $connection = self::getConnection();

            $stmt = $connection->prepare("SELECT name, age, description FROM Users WHERE login = :login");
            $stmt->execute([':login'=>$login]);

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            die();
        }
    }

    public static function updateProfile($name, $age, $about, $photo)
    {
        try {
            $login = $_COOKIE['login'];
            $connection = self::getConnection();

            if ($photo != null) {
                $stmt = $connection->prepare("UPDATE Users SET name = :name, age = :age, description = :about, photo = :photo WHERE login = :login");
                $stmt->execute([
                    ':name' => $name,
                    ':age' => $age,
                    ':about' => $about,
                    ':photo' => $photo,
                    ':login' => $login
                ]);
            } else {
                $stmt = $connection->prepare("UPDATE Users SET name = :name, age = :age, description = :about WHERE login = :login");
                $stmt->execute([
                    ':name' => $name,
                    ':age' => $age,
                    ':about' => $about,
                    ':login' => $login
                ]);
            }


        } catch (PDOException $ex) {
            echo $ex->getMessage();
            die();
        }
    }

    public static function getId($login)
    {
        try {
            $connection = self::getConnection();

            $stmt = $connection->prepare("SELECT id FROM Users WHERE login = :login");
            $stmt->execute([
                ':login' => $login
            ]);
            return $stmt->fetch()[0];
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            die();
        }
    }

    public static function getUsers()
    {
        try {
            $connection = self::getConnection();
            $result = $connection->query("SELECT * FROM Users");
            return $result->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            die();
        }
    }

    public static function getPhotos()
    {
        try {
            $connection = self::getConnection();
            $result = $connection->query("SELECT photo FROM Users");
            return $result->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            die();
        }
    }

    public static function deleteUser($login)
    {
        try {
            $connection = self::getConnection();

            $stmt = $connection->prepare("SELECT COUNT(*) FROM Users WHERE login = :login");
            $stmt->execute([
                ':login' => $login
            ]);

            if ($stmt->fetch()[0] > 0) {
                $stmt = $connection->prepare("DELETE FROM Users WHERE login = :login");
                $stmt->execute([
                    ':login' => $login
                ]);
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            die();
        }
    }

    public static function deletePhoto($photo)
    {
        try {
            $connection = self::getConnection();

            $stmt = $connection->prepare("SELECT COUNT(*) FROM Users WHERE photo = :photo");
            $stmt->execute([
                ':photo' => $photo
            ]);

            if ($stmt->fetch()[0] > 0) {
                $stmt = $connection->prepare("UPDATE Users SET photo = '' WHERE photo = :photo");
                $stmt->execute([
                    ':photo' => $photo
                ]);

                unlink($_SERVER['DOCUMENT_ROOT']. '/homework4/photos/'.$photo);
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            die();
        }
    }
}