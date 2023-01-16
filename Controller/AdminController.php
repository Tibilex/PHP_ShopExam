<?php
const ROOTpm = 'E:\PHP\ShopExam\\';
include ROOTpm . 'Model/ProductModel.php';
include ROOTpm . 'Model/AdminModel.php';
include ROOTpm . 'Model/UserModel.php';

class AdminController
{
   private ProductModel $product;
   private AdminModel $administrator;
   private UserModel $user;

   function setProduct($id, $title, $price, $code, $image)
   {
      $this->product = new ProductModel($id, $title, $price, $code, $image);
   }

   function setAdministrator($id, $login, $password, $name)
   {
      $this->administrator = new AdminModel($id, $login, $password, $name, );
   }

   function setUser($id, $mail, $password, $name, $phone, $address)
   {
      $this->user = new UserModel($id, $mail, $password, $name, $phone, $address);
   }

   public function BuildProductTileAdmin(){
      return
         "<div class='_admin__container'>".
         "<form class='product-edit__form' method='post' enctype='multipart/form-data'".
         "<p>ID: ".$this->product->getId()."</p>".
         "<label for='itemTitle'>Название товара:</label>".
         "<textarea class='item__title-size' name='itemTitle'>".$this->product->getTitle()."</textarea>".
         "<label for='itemPrice'>Цена товара:</label>".
         "<textarea class='item__title-size2' name='itemPrice'>".$this->product->getPrice()."</textarea>".
         "<label for='itemCode'>Код Товара:</label>".
         "<textarea class='item__title-size2' name='itemCode'>".$this->product->getCode()."</textarea>".
         "<label for='itemImg'>Путь Изображения:</label>".
         "<textarea name='itemImg'>".$this->product->getImage()."</textarea>".
         "<button class='item-edit__button' type='submit' value=".$this->product->getId()." name='productEditBtn'>Редактировать</button>".
         "<button class='item-edit__button' type='submit' value=".$this->product->getId()." name='productDelBtn'>Удалить</button>".
         "</form>".
         "</div>";
   }

   public function BuildAdminTile(){
      return
         "<div class='_admin__container'>".
         "<form class='product-edit__form' method='post' enctype='multipart/form-data'".
         "<p>ID: ".$this->administrator->getId()."</p>".
         "<label for='itemLogin'>Логин:</label>".
         "<textarea class='item__title-size' name='itemLogin'>".$this->administrator->getLogin()."</textarea>".
         "<label for='itemPass'>Пароль:</label>".
         "<textarea class='item__title-size2' name='itemPass'>".$this->administrator->getPassword()."</textarea>".
         "<label for='itemName'>Имя:</label>".
         "<textarea class='item__title-size2' name='itemName'>".$this->administrator->getName()."</textarea>".
         "<button class='item-edit__button item-edit__button--size' type='submit' value=".$this->administrator->getId()." name='adminEditBtn'>Редактировать</button>".
         "<button class='item-edit__button item-edit__button--size' type='submit' value=".$this->administrator->getId()." name='adminDelBtn'>Удалить</button>".
         "</form>".
         "</div>";
   }

   public function BuildUserTile(){
      return
         "<div class='_admin__container'>".
         "<form class='product-edit__form' method='post' enctype='multipart/form-data'".
         "<p>ID: ".$this->user->getId()."</p>".
         "<label for='itemLogin'>Логин:</label>".
         "<textarea class='item__title-size3' name='itemLogin'>".$this->user->getMail()."</textarea>".
         "<label for='itemPass'>Пароль:</label>".
         "<textarea class='item__title-size2' name='itemPass'>".$this->user->getPassword()."</textarea>".
         "<label for='itemName'>Имя:</label>".
         "<textarea class='item__title-size2' name='itemName'>".$this->user->getName()."</textarea>".
         "<label for='itemPhone'>Телефон:</label>".
         "<textarea class='item__title-size2' name='itemPhone'>".$this->user->getPhone()."</textarea>".
         "<label for='itemAddress'>Адрес:</label>".
         "<textarea class='item__title-size3' name='itemAddress'>".$this->user->getAddress()."</textarea>".
         "<button class='item-edit__button item-edit__button--size' type='submit' value=".$this->user->getId()." name='userEditBtn'>Редактировать</button>".
         "<button class='item-edit__button item-edit__button--size' type='submit' value=".$this->user->getId()." name='userDelBtn'>Удалить</button>".
         "</form>".
         "</div>";
   }
}