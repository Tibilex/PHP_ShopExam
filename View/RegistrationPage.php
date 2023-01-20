<?php
const ROOTadm = 'E:\PHP\ShopExam\\'; // My path for localhost
include ROOTadm . 'Controller/UserController.php';

$users = new UserController();
?>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="../Css/style.css" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css?family=Roboto:300,regular,500,700&display=swap&subset=cyrillic-ext" rel="stylesheet" />
   <title>Shop</title>
</head>
<body>
<div class="login-form__container">
   <form class="login__form">
      <form class="login__form" method="post">
         <label for="loginMail">Эл. адрес:</label>
         <input name="loginMail" type="text">
         <label for="loginPass">Пароль:</label>
         <input name="loginPass" type="password">
         <label for="loginPassConf">Потдвердите Пароль:</label>
         <input name="loginPassConf" type="password">
         <input type="submit" value="Регистрация">
      </form>
      <a class="close__form" href="../index.php">X</a>
   </form>
</div>
</body>
</html>
