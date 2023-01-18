<?php

class ProductModel
{
   private int $id;
   private string $title;
   private int $price;
   private int $code;
   private string $image;
   private string $category;

   public function __construct($id, $title, $price, $code, $image, $category)
   {
      $this->id = $id;
      $this->title = $title;
      $this->price = $price;
      $this->code = $code;
      $this->image = $image;
      $this->category = $category;
   }

   function getId(): int
   {
      return $this->id;
   }

   function getPrice(): int
   {
      return $this->price;
   }

   function getCode(): int
   {
      return $this->code;
   }

   function getTitle(): string
   {
      return $this->title;
   }

   function getImage(): string
   {
      return $this->image;
   }

   function getCategory(): string
   {
      return $this->category;
   }

   public function __destruct()
   {
      unset($this->id);
      unset($this->title);
      unset($this->code);
      unset($this->image);
      unset($this->price);
      unset($this->category);
   }
}