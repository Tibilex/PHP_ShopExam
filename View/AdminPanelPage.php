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
         <a class="navigation__link" href="./AdminAccountEditPage.php">Редактор профилей пользователей</a>
         <a class="navigation__link" href="../index.php">Выход</a>
      </div>
   </header>
   <main class="admin__panel--main">
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
      <div class="admin-product__container">
         <?php
         const ROOTadm = 'E:\PHP\ShopExam\\'; // My path for localhost
         include ROOTadm . 'Controller/AdminController.php';

         $admins = new AdminController();
         $admins->GetUser("administrator");

         if (isset($_POST['addAdmin'])){
            $mail = $_POST['adminLogin'];
            $password = $_POST['adminPass'];
            $name = $_POST['adminName'];
            $phone = $_POST['adminPhone'];
            $admins->AddAdministrator($mail, $password, $name, $phone);
         }

         if (isset($_POST['userDelBtn'])){
            $admins->DeleteUser();
            echo "<script>document.location = './AdminPanelPage.php';</script>";
         }

         if (isset($_POST['userEditBtn'])){
            $mail = $_POST['itemLogin'];
            $password = $_POST['itemPass'];
            $name = $_POST['itemName'];
            $phone = $_POST['itemPhone'];
            $address = $_POST['itemAddress'];
            $admins->EditUser($mail, $password, $name, $phone, $address);
            echo "<script>document.location = './AdminPanelPage.php';</script>";
         }
         ?>
      </div>
   </main>
</div>
</body>
</html>

