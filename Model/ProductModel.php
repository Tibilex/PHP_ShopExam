<?php

class ProductModel
{
   private int $id;
   private string $title;
   private int $price;
   private int $code;
   private string $image;

   public function __construct($id, $title, $price, $code, $image)
   {
      $this->id = $id;
      $this->title = $title;
      $this->price = $price;
      $this->code = $code;
      $this->image = $image;
   }

   function getId(){
      return $this->id;
   }

   function getPrice(){
      return $this->price;
   }

   function getCode(){
      return $this->code;
   }

   function getTitle() {
      return $this->title;
   }

   function getImage() {
      return $this->image;
   }

   public function __destruct()
   {
      unset($this->id);
      unset($this->title);
      unset($this->code);
      unset($this->image);
      unset($this->price);
   }
}