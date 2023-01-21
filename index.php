<?php
session_start();
include 'Controller/ProductController.php';
include 'Controller/UserController.php';
$products = new ProductController();
$users = new UserController();
if (isset($_SESSION['userMail'])){
   $user = $_SESSION['userMail'];
}
else
   $_SESSION['userMail'] = null;
?>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="./Css/style.css" rel="stylesheet">
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

         <a class="account__link" href="./View/UserAccountPage.php">
            <?php
            if (isset($user)){
               echo $user;
            }
            ?>
         </a>
         <a class="account__link" href="./View/LoginPage.php">Вход</a>
         <a class="account__link cart__link" href="./View/UserCartPage.php">Корзина</a>
      </div>
   </header>
   <main class="main__container">
      <div class="filter__container">

      </div>
      <div class="products__container">
         <?php
         $products->GetAllProductsStyled();

         if(isset($_POST['productBuyBtn'])){
            $itemId = intval($_POST['productBuyBtn']);
            $_SESSION['userCartProducts'][] = $itemId;
         }
         ?>
      </div>

   </main>
   <footer>

   </footer>
</div>
</body>
</html>
