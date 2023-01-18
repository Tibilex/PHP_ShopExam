<?php

const ROOTpm = 'E:\PHP\ShopExam\\'; // My path for localhost
//include ROOTpm . 'Model/ProductModel.php';
include ROOTpm . 'Model/ProductModel.php';

class ProductController
{
   private ProductModel $product;

   function setProduct($id, $title, $price, $code, $image): void
   {
      $this->product = new ProductModel($id, $title, $price, $code, $image);
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

   public function GetAllProductsAdmin(): void
   {
      $connectionString = new mysqli("localhost", "root", "", "education");
      if($connectionString->connect_error){
         echo 'ERROR';
      }
      else{
         $request = "SELECT * FROM product_2";

         if($results = $connectionString->query($request)) {
            foreach ($results as $res){
               $products = new ProductController();
               $products->setProduct($res["id"], $res["title"], $res["price"], $res["code"], $res["image"]);
               echo $products->BuildProductTileAdmin();
            }
            $results->free();
         }
         else {
            echo '<p>Data NOT selected!</p>';
         }
      }
      $connectionString->close();
   }

   public function AddProductInDB($title, $price, $code, $image): void
   {
      $path = '/Img/';
      $fullPath = "{$path}{$image}";

      $connectionString = new mysqli("localhost", "root", "", "education");
      if (isset($_POST['prodName']) && isset($_POST['prodPrice']) && isset($_POST['prodCode'])){
         if($connectionString->connect_error){
            echo "error";
         }
         else{
            $data = "INSERT INTO product_2 (title, price, code, image) VALUES ('$title', '$price', '$code', '$fullPath')";
            if($connectionString->query($data)){
               echo "<p>Data added!</p>";
            }
            else{
               echo "<p>Data not added!</p>";
            }
            $connectionString->close();
         }
      }
   }

   public function DeleteProductInDB()
   {
      $connectionString = new mysqli("localhost", "root", "", "education");
      if($connectionString->connect_error){
         echo "error";
      }
      else{
         $itemId = $_POST['productDelBtn'];
         $request = "DELETE FROM product_2 WHERE id='$itemId'";

         if($connectionString->query($request)){
            $connectionString->close();
         }
         else{
            $connectionString->close();
            //echo "<script>document.location = './AdminPage.php';</script>";
         }
      }
   }

   public function EditProduct($title, $price, $code, $image)
   {
      $connectionString = new mysqli("localhost", "root", "", "education");
      if ($connectionString->connect_error) {
         echo "error";
      }
      else {
         $itemId = $_POST['productEditBtn'];

         $request = "UPDATE product_2 SET title='$title', price='$price', image='$image', code='$code' WHERE id='$itemId'";

         if($connectionString->query($request)){
            $connectionString->close();
         }
         else{
            $connectionString->close();
         }
      }
   }
}