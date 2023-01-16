<?php
const ROOTpm = 'E:\PHP\ShopExam\\';
include ROOTpm . 'Model/ProductModel.php';

class AdminController
{
   private $product;

   function setProduct($id, $title, $price, $code, $image)
   {
      $this->product = new ProductModel($id, $title, $price, $code, $image);
   }

   public function BuildProductTileAdmin(){
      return
         "<div class='_admin__container'>".
         "<p name='itemId'>ID: ".$this->product->getId()."</p>".
         "<label for='itemTitle'>Название товара:</label>".
         "<textarea class='item__title-size' name='itemTitle'>".$this->product->getTitle()."</textarea>".
         "<label for='itemPrice'>Цена товара:</label>".
         "<textarea class='item__title-size2' name='itemPrice'>".$this->product->getPrice()."</textarea>".
         "<label for='itemCode'>Код Товара:</label>".
         "<textarea class='item__title-size2' name='itemCode'>".$this->product->getCode()."</textarea>".
         "<label for='itemImg'>Путь Изображения:</label>".
         "<textarea name='itemImg'>".$this->product->getImage()."</textarea>".
         "</div>";
   }
}