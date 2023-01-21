<?php
session_start();
const ROOTadm = 'E:\PHP\ShopExam\\'; // My path for localhost
include ROOTadm . 'Controller/UserController.php';
include ROOTadm . 'Controller/ProductController.php';
$products = new ProductController();
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
         <a class="account__link cart__link" href="../index.php">Назад</a>
      </div>
   </header>
   <main class="cart__container">
      <div class="cart-product__container">
         <?php
         if (isset($_SESSION['userCartProducts'])){
            $products->GetAllProductsCart();
         }
         else{
            echo "<div class='empty_cart'>Ваша Корзина пуста</div>";
         }

         if (isset($_POST['delProdInCart'])){
            $products->DeleteProductInCart();
            echo "<script> location.href='../View/UserCartPage.php'; </script>";
         }
         ?>
      </div>
      <div class="buy-all-products__container">
         <form class="buy-all-products__form" method="post">
            <fieldset class="total__cost-fieldset">
            <legend>| Итого к оплате |</legend>
            <div class="total__cost"><?php if(isset($_SESSION['totalProductsCost'])) echo $_SESSION['totalProductsCost'];?><span>грн.</span></div>
            </fieldset>
            <fieldset class="total__cost-fieldset">
               <legend>| Контактный телефон |</legend>
               <div class="user-cart__info"><?php if(isset($_SESSION['userPhone'])) echo $_SESSION['userPhone'];?></div>
            </fieldset>
            <fieldset class="total__cost-fieldset">
               <legend>| Адрес доставки |</legend>
               <div class="user-cart__info"><?php if(isset($_SESSION['userAddress'])) echo $_SESSION['userAddress'];?></div>
            </fieldset>
            <input type="submit" name="buyCart" value="Потдвердить покупку">
            <?php
               if(isset($_POST['buyCart'])){
                  $_SESSION['userBuysHistory'] = $_SESSION['userCartProducts'];
                  unset($_SESSION['userCartProducts']);
                  echo "<script> location.href='../index.php'; </script>";
               }
            ?>
         </form>
      </div>

   </main>
   <footer>

   </footer>
</div>
</body>
</html>

