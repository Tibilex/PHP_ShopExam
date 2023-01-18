<?php
const ROOTadm = 'E:\PHP\ShopExam\\'; // My path for localhost
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
         <a class="navigation__link" href="./AdminPanelPage.php">Назад</a>
         <a class="navigation__link" href="#">Редактор категорий</a>
         <a class="navigation__link" href="./AdminAccountEditPage.php">Редактор профилей пользователей</a>
         <a class="navigation__link" href="../index.php">Выход</a>
      </div>
   </header>
   <main>
      <div class="admin__panel--main">
         <div class="admin-account__container">
            <form enctype="multipart/form-data" class="add-admin__form" method="post">
               <label for="prodName">Product name:</label>
               <input name="prodName" type="text">
               <label for="prodPrice">Product Price:</label>
               <input name="prodPrice" type="text">
               <label for="prodCode">Product Code:</label>
               <input name="prodCode" type="text">
               <label for="prodImage">Product Image:</label>
               <input name="file" type="file" accept="image/png, image/jpeg, image/jpg">
               <input type="submit" name="addBtn" value="Add Product">
            </form>
            <?php
            if (isset($_POST['addBtn'])){
               $pName = $_POST['itemTitle'];
               $pPrice = $_POST['prodPrice'];
               $pCode = $_POST['prodCode'];
               $pImage = $_FILES['file']['name'];
               $products->AddProductInDB($pName, $pPrice, $pCode, $pImage);
            }

            if (isset($_POST['productDelBtn'])){
               $products->DeleteProductInDB();
            }

            if (isset($_POST['productEditBtn'])){
               $pName = $_POST['itemTitle'];
               $pPrice = $_POST['itemPrice'];
               $pCode = $_POST['itemCode'];
               $pImage = $_POST['itemImg'];
               $products->EditProduct($pName, $pPrice, $pCode, $pImage);
            }
            ?>
         </div>
         <div class="admin-product__container admin-product--position">

            <?php
            $products->GetAllProductsAdmin();
            ?>
         </div>
      </div>
   </main>
   <footer>

   </footer>
</div>
</body>
</html>


