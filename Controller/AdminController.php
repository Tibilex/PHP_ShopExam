<?php
const ROOTpm = 'E:\PHP\ShopExam\\'; // My path for localhost
include ROOTpm . 'Model/ProductModel.php';
include ROOTpm . 'Model/UserModel.php';

class AdminController
{
   private ProductModel $product;
   private UserModel $user;



   function setProduct($id, $title, $price, $code, $image): void
   {
      $this->product = new ProductModel($id, $title, $price, $code, $image);
   }

   function  setUsers($id, $mail, $password, $name, $role, $phone, $address): void
   {
      $this->user = new UserModel($id, $mail, $password, $name, $role, $phone, $address);
   }

   public function BuildProductTileAdmin(): string
   {
      return
         "<div class='_admin__container'>".
         "<form class='product-edit__form' method='post' enctype='multipart/form-data'".
         "<p>ID: ".$this->product->getId()."</p>".
         "<label for='itemTitle'>P. Title:</label>".
         "<textarea class='item__title-size' name='itemTitle'>".$this->product->getTitle()."</textarea>".
         "<label for='itemPrice'>P. Price:</label>".
         "<textarea class='item__title-size2' name='itemPrice'>".$this->product->getPrice()."</textarea>".
         "<label for='itemCode'>P. Code:</label>".
         "<textarea class='item__title-size2' name='itemCode'>".$this->product->getCode()."</textarea>".
         "<label for='itemImg'>Img Path:</label>".
         "<textarea name='itemImg'>".$this->product->getImage()."</textarea>".
         "<button class='item-edit__button' type='submit' value=".$this->product->getId()." name='productEditBtn'>Edit</button>".
         "<button class='item-edit__button' type='submit' value=".$this->product->getId()." name='productDelBtn'>Delete</button>".
         "</form>".
         "</div>";
   }

   public function BuildUserTile(): string{
      return
         "<div class='_admin__container'>".
         "<form class='product-edit__form' method='post' enctype='multipart/form-data'".
         "<p>ID: ".$this->user->getId()."</p>".
         "<label for='itemLogin'>Login:</label>".
         "<textarea class='item__title-size3' name='itemLogin'>".$this->user->getMail()."</textarea>".
         "<label for='itemPass'>Pass:</label>".
         "<textarea class='item__title-size2' name='itemPass'>".$this->user->getPassword()."</textarea>".
         "<label for='itemName'>Name:</label>".
         "<textarea class='item__title-size2' name='itemName'>".$this->user->getName()."</textarea>".
         "<label for='itemPhone'>Phone:</label>".
         "<textarea class='item__title-size2' name='itemPhone'>".$this->user->getPhone()."</textarea>".
         "<label for='itemAddress'>Address:</label>".
         "<textarea class='item__title-size3' name='itemAddress'>".$this->user->getAddress()."</textarea>".
         "<button class='item-edit__button item-edit__button--size' type='submit' value=".$this->user->getId()." name='userEditBtn'>Edit</button>".
         "<button class='item-edit__button item-edit__button--size' type='submit' value=".$this->user->getId()." name='userDelBtn'>Delete</button>".
         "</form>".
         "</div>";
   }

   public function GetUser($role): void
   {
      $connectionString = new mysqli("localhost", "root", "", "education");
      if($connectionString->connect_error){
         echo 'ERROR';
      }
      else{
         $request = "SELECT * FROM users WHERE role='$role'";

         if($results = $connectionString->query($request)) {
            foreach ($results as $res){
               $admins = new AdminController();
               $admins->setUsers($res["id"], $res["mail"], $res["password"], $res["name"], $res['role'], $res["phone"], $res["address"]);
               echo $admins->BuildUserTile();
            }
            $results->free();
         }
         else {
            echo '<p>Data NOT selected!</p>';
         }
      }
      $connectionString->close();
   }

   public function AddAdministrator($mail, $password, $name, $phone): void
   {
      $connectionString = new mysqli("localhost", "root", "", "education");
      if($connectionString->connect_error){
         echo "error";
      }
      else{
         $data = "INSERT INTO users (mail, password, name, phone, role, phone, address) VALUES ('$mail' , '$password', '$name', '$phone', 'administrator', '000', 'no address')";
         if($connectionString->query($data)){
            echo "<p>Data added!</p>";
         }
         else{
            echo "<p>Data not added!</p>";
         }
         $connectionString->close();
      }
   }

   public function DeleteUser(): void
   {
      $connectionString = new mysqli("localhost", "root", "", "education");
      if($connectionString->connect_error){
         echo "error";
      }
      else{
         $itemId = $_POST['userDelBtn'];
         $request = "DELETE FROM users WHERE id='$itemId'";

         if($connectionString->query($request)){
            $connectionString->close();
         }
         else{
            $connectionString->close();
         }
      }
   }

   public function EditUser($mail, $password, $name, $phone, $address): void
   {

      $connectionString = new mysqli("localhost", "root", "", "education");
      if ($connectionString->connect_error) {
         echo "error";
      }
      else {
         $itemId = $_POST['userEditBtn'];

         $request = "UPDATE users SET mail='$mail', password='$password', name='$name', phone='$phone', address='$address' WHERE id='$itemId'";

         if($connectionString->query($request)){
            $connectionString->close();
         }
         else{
            $connectionString->close();
         }
      }
   }

}
