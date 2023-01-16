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
         <a class="navigation__link" href="./AdminProductEditPage.php">Редактор товаров</a>
         <a class="navigation__link" href="#">Редактор категорий</a>
         <a class="navigation__link" href="./AdminAccountEditPage.php">Редактор профилей пользователей</a>
         <a class="navigation__link" href="../index.php">Выход</a>
      </div>
   </header>
   <main class="admin__panel--main">
      <div class="admin-account__container">
         <form class="add-admin__form">
            <label for="adminLogin">Логин:</label>
            <input name="adminLogin" type="text">
            <label for="adminPass">Пароль:</label>
            <input name="adminPass" type="text">
            <label for="adminName">Имя:</label>
            <input name="adminName" type="text">
            <input type="submit" name="addAdmin" value="Добавить">
         </form>
      </div>
      <div class="admin-product__container">
         <?php
         const ROOTadm = 'E:\PHP\ShopExam\\';
         include ROOTadm . 'Controller/AdminController.php';

         $connectionString = new mysqli("localhost", "root", "", "education");
         if($connectionString->connect_error){
            echo 'ERROR';
         }
         else{
            $request = "SELECT * FROM `administrators`";

            if($results = $connectionString->query($request)) {
               foreach ($results as $res){
                  $admins = new AdminController();
                  $admins->setAdministrator($res["id"], $res["login"], $res["password"], $res["name"]);
                  echo $admins->BuildAdminTile();
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
</div>
</body>
</html>

