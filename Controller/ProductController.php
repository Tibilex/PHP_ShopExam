<?php
const ROOTpm = 'E:\PHP\ShopExam\\'; // My path for localhost
//include ROOTpm . 'Model/ProductModel.php';
include ROOTpm . 'Model/ProductModel.php';

class ProductController
{
   private ProductModel $product;

   function setProduct($id, $title, $price, $code, $image, $category): void
   {
      $this->product = new ProductModel($id, $title, $price, $code, $image, $category);
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
         "<label for='itemCategory'>P. Category:</label>".
         "<textarea class='item__title-size2' name='itemCategory'>".$this->product->getCategory()."</textarea>".
         "<button class='item-edit__button' type='submit' value=".$this->product->getId()." name='productEditBtn'>Edit</button>".
         "<button class='item-edit__button' type='submit' value=".$this->product->getId()." name='productDelBtn'>Delete</button>".
         "</form>".
         "</div>";
   }

   public function BuildProductStyledTile(): string
   {
      return
      "<div class='product__tile'>".
      "<div class='product__img-block'>".
      "<img class='product__img' src=".$this->product->getImage()." alt='img'>".
      "</div>".
      "<div class='product__title'>".$this->product->getTitle()."</div>".
      "<div class='product__cost-block'>".
      "<div class='product__cost'>".$this->product->getPrice()." грн.</div>".
      "<div class='product__code'>Код товара: ".$this->product->getcode()."</div>".
      "</div>".
      "<form method='post'>".
      "<button class='product_buy-button' type='submit' value=".$this->product->getId()." name='productBuyBtn'>Купить</button>".
      "</form>".
      "</div>";
   }

   public function BuildCardProductTile(): string
   {
      return
       "<form class='product__tile product__tile--pos'>".
       "<div class='product__img-block'>".
       "<img class='product__img' src=".$this->product->getImage()." alt='img'>".
       "</div>".
       "<div class='product__title'>".$this->product->getTitle()."</div>".
       "<div class='button-price'>".
       "<button class='product_buy-button' type='submit' value=".$this->product->getId()." name='delProdInCart'>Удалить товар</button>".
       "<div class='product__cost product__pos'>".$this->product->getPrice()." грн.</div>".
       "</div>".
       "</form>";
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
               $products->setProduct($res["id"], $res["title"], $res["price"], $res["code"], $res["image"], $res["category"]);
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

   public function GetAllProductsStyled(): void
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
               $products->setProduct($res["id"], $res["title"], $res["price"], $res["code"], $res["image"], $res["category"]);
               echo $products->BuildProductStyledTile();
            }
            $results->free();
         }
         else {
            echo '<p>Data NOT selected!</p>';
         }
      }
      $connectionString->close();
   }

   public function GetAllProductsCart(): void
   {
      $connectionString = new mysqli("localhost", "root", "", "education");
      if($connectionString->connect_error){
         echo 'ERROR';
      }
      else {
         $totalCost = 0;
         if (isset($_SESSION['userId'])) {
            foreach ($_SESSION['userCartProducts'] as $item) {
               $request = "SELECT * FROM product_2 WHERE id=$item";
               if ($results = $connectionString->query($request)) {

                  foreach ($results as $res) {

                     $products = new ProductController();
                     $products->setProduct($res["id"], $res["title"], $res["price"], $res["code"], $res["image"], $res["category"]);
                     echo $products->BuildCardProductTile();
                     $totalCost += $res["price"];
                  }
                  $_SESSION['totalProductsCost'] = $totalCost;
                  $results->free();
               } else {
                  echo '<p>Data NOT selected!</p>';
               }
            }
         }
      }
      $connectionString->close();
   }

   public function AddProductInDB($title, $price, $code, $image, $category): void
   {
      $path = '/Img/';
      $fullPath = "{$path}{$image}";

      $connectionString = new mysqli("localhost", "root", "", "education");
      if($connectionString->connect_error){
         echo "error";
      }
      else{
         $data = "INSERT INTO product_2 (title, price, code, image, category) VALUES ('$title', '$price', '$code', '$fullPath', '$category')";
         if($connectionString->query($data)){
            echo "<p>Data added!</p>";
         }
         else{
            echo "<p>Data not added!</p>";
         }
         $connectionString->close();
      }
   }

   public function DeleteProductInDB(): void
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

   public function DeleteProductInCart(): void
   {

   }

   public function EditProduct($title, $price, $code, $image, $category): void
   {
      $connectionString = new mysqli("localhost", "root", "", "education");
      if ($connectionString->connect_error) {
         echo "error";
      }
      else {
         $itemId = $_POST['productEditBtn'];

         $request = "UPDATE product_2 SET title='$title', price='$price', image='$image', code='$code', category='$category' WHERE id='$itemId'";

         if($connectionString->query($request)){
            $connectionString->close();
         }
         else{
            $connectionString->close();
         }
      }
   }


}