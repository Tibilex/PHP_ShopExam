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
         <a class="navigation__link" href="./AdminProductEditPage.php">Редактор товаров</a>
         <a class="navigation__link" href="../index.php">Выход</a>
      </div>
   </header>
   <main class="admin__panel--main">
      <div class="admin-product__container">
         <?php
         const ROOTadm = 'E:\PHP\ShopExam\\'; // My path for localhost
         include ROOTadm . 'Controller/AdminController.php';

         $users = new AdminController();
         $users->GetUser('user');

         ?>
      </div>
   </main>
   <footer>

   </footer>
</div>
</body>
</html>



