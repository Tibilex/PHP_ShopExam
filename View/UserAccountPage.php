<?php
session_start();
const ROOTadm = 'E:\PHP\ShopExam\\'; // My path for localhost
include ROOTadm . 'Controller/UserController.php';
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
<div class="container">
   <header class="navbar--color-user">
      <div class="navbar__navigation">
         <a class="navigation__link" href="#">Оплата</a>
         <a class="navigation__link" href="#">Доставка</a>
         <a class="navigation__link" href="#">Гарантия</a>
         <a class="navigation__link" href="#">Акции</a>
         <a class="navigation__link" href="#">Контакты</a>
      </div>
      <div class="navbar__navigation navbar__accounting">

         <a class="account__link" href="../index.php">Назад</a>
         <a class="account__link cart__link" href="../View/UserCartPage.php">Корзина</a>
      </div>
   </header>
   <main class="main__container">
      <div class="user-account__container">
         <form class="user-account-form__container" method="post">
            <label for='userName'>Имя:</label>
            <input type='text' name='userName'>
            <label for='userPassword'>Пароль:</label>
            <input type='text' name='userPassword'>
            <label for='userPhone'>Телефон:</label>
            <input type='number' name='userPhone'>
            <label for='userAddress'>Адресс:</label>
            <input type='text' name='userAddress'>
            <input type="submit" name="updateUser" value="Обновить данные">
         </form>
         <?php
         $userId = intval($_SESSION['userId']);

         $user = new UserController();
         $user->showUserData($userId);

         if (isset($_POST['updateUser'])){
            if ($_POST['userName'] && $_POST['userPassword'] && $_POST['userPhone'] && $_POST['userAddress']){
               $name = $_POST['userName'];
               $password = $_POST['userPassword'];
               $phone = $_POST['userPhone'];
               $address = $_POST['userAddress'];
               $user->UpdateUserData($name, $password, $phone, $address);
               echo "<div class='successfully_msg'>Данные обновлены</div>";
            }
            else{
               echo "<div class='error_msg'>Не все поля заполнены</div>";
            }
         }

         if (isset($_POST['exitInAcc'])){
            unset($_SESSION['userId']);
            unset($_SESSION['userMail']);
            unset($_SESSION['userPhone']);
            unset($_SESSION['userAddress']);
            unset($_SESSION['userCartProducts']);
            unset($_SESSION['totalProductsCost']);
            echo "<script> location.href='../index.php';</script>";
         }

         ?>

      </div>


   </main>
   <footer>

   </footer>
</div>
</body>
</html>
