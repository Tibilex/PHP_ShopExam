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
      <form class="login__form" method="post">
         <label for="registrationMail">Эл. адрес:</label>
         <input name="registrationMail" type="text">
         <label for="registrationPass">Пароль:</label>
         <input name="registrationPass" type="password">
         <label for="registrationPassConf">Потдвердите Пароль:</label>
         <input name="registrationPassConf" type="password">
         <input type="submit" name="registrationBtn" value="Регистрация">
         <?php
         if (isset($_POST['registrationBtn'])){
            if (isset($_POST['registrationMail']) && isset($_POST['registrationPass']) && isset($_POST['registrationPassConf'])){
               $mail = $_POST['registrationMail'];
               $password = $_POST['registrationPass'];
               $confirmPassword = $_POST['registrationPassConf'];
               if($password == $confirmPassword){
                  $users->Registration($mail, $password);
               }
            }
            else{
               echo "Не все поля заполнены";
            }
         }
         ?>
      </form>
      <a class="close__form" href="../index.php">X</a>
</div>
</body>
</html>
