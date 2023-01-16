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
      <div class="admin-product__container admin-product--position">
         <?php
         const ROOTadm = 'E:\PHP\ShopExam\\';
         include ROOTadm . 'Controller/AdminController.php';

         $connectionString = new mysqli("localhost", "root", "", "education");
         if($connectionString->connect_error){
            echo 'ERROR';
         }
         else{
            $request = "SELECT * FROM `product_1`";

            if($results = $connectionString->query($request)) {
               foreach ($results as $res){
                  $products = new AdminController();
                  $products->setProduct($res["id"], $res["name"], $res["price"], $res["code"], $res["image"]);
                  echo $products->BuildProductTileAdmin();
               }
               $results->free();
            }
            else {
               echo '<p>Data NOT selected!</p>';
            }
         }
         $connectionString->close();
         ?>
      </div>
   </main>
   <footer>

   </footer>
</div>
</body>
</html>


