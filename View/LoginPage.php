<?php
const ROOTadm = 'E:\PHP\ShopExam\\'; // My path for localhost
include ROOTadm . 'Controller/UserController.php';
session_start();
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
      <form class="login__form" method="post">
         <label for="loginMail">Эл. адрес:</label>
         <input name="loginMail" type="text">
         <label for="loginPass">Пароль:</label>
         <input name="loginPass" type="password">
         <input type="submit" name="loginBtn" value="Вход">
      </form>
         <a class="login__link" href="RegistrationPage.php">Нет аккаунта? Зарегистрируйтесь</a>
         <a class="close__form" href="../index.php">X</a>
      <?php
      if (isset($_POST['loginBtn'])){
         $login = trim(htmlspecialchars($_POST['loginMail']));
         $password = trim(htmlspecialchars($_POST['loginPass']));
         $users->Authorization($login, $password);
      }
      ?>
   </div>
</body>
</html>
