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
   <header>
      <div class="navbar__navigation">
         <a class="navigation__link" href="#">Оплата</a>
         <a class="navigation__link" href="#">Доставка</a>
         <a class="navigation__link" href="#">Гарантия</a>
         <a class="navigation__link" href="#">Акции</a>
         <a class="navigation__link" href="#">Контакты</a>
      </div>
      <div class="navbar__navigation navbar__accounting">

         <a class="account__link" href="../index.php">Назад</a>
         <a class="account__link" id="exitInAcc" href="../index.php">Выход</a>
         <a class="account__link cart__link" href="../View/UserCartPage.php">Корзина</a>
      </div>
   </header>
   <main class="main__container">
      <div class="admin-account__container">
         <form class="add-admin__form" method="post">

            <label for="adminLogin">Login:</label>
            <input name="adminLogin" type="text">
            <label for="adminPass">Password:</label>
            <input name="adminPass" type="text">
            <label for="adminName">Name:</label>
            <input name="adminName" type="text">
            <label for="adminPhone">Phone:</label>
            <input name="adminPhone" type="text">
            <input type="submit" name="addAdmin" value="Добавить">
         </form>
      </div>

      <?php
      $userId = intval($_SESSION['userId']);

      $user = new UserController();
      $user->showUserData($userId);
      echo $_SESSION['userId'];
      ?>
   </main>
   <footer>

   </footer>
</div>
</body>
</html>
