<?php
require_once "php/Db.php";

if (!isset($_COOKIE['login'])) {
    header('Location: ../index.php');
}
$userData = \db\Db::getUserData($_COOKIE['login'])[0];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Starter Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">


    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">Авторизация</a></li>
                <li><a href="reg.php">Регистрация</a></li>
                <li><a href="list.php">Список пользователей</a></li>
                <li><a href="filelist.php">Список файлов</a></li>
                <li><a href="profile.php">Профиль</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<div class="form-container">
    <form enctype="multipart/form-data" class="form-horizontal">
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Имя</label>
            <div class="col-sm-10">
                <input name="name" class="form-control" id="name" value="<?php echo $userData['name'] ?>">
            </div>
        </div>

        <div class="form-group">
            <label for="age" class="col-sm-2 control-label">Возраст</label>
            <div class="col-sm-10">
                <input type="date" name="age" class="form-control" id="age" value="<?php echo $userData['age'] ?>">
            </div>
        </div>

        <div class="form-group">
            <label for="about" class="col-sm-2 control-label">О себе</label>
            <textarea id="about" name="about" rows="5" cols="50" ><?php echo $userData['description'] ?></textarea>
        </div>

        <div class="form-group">
            <label for="photo" class="col-sm-2 control-label">Фото</label>
            <input type="file" id="photo" name="photo" accept="image/jpeg, image/png" ></>
        </div>

        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" id="save" class="btn btn-default">Сохранить</button>
    </form>
</div>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="js/main.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>