<?php

class UserModel
{
   private int $id;
   private string $mail;
   private string $password;
   private string $name;
   private int $phone;
   private string $address;

   function __construct($id, $mail, $password, $name, $phone, $address){
      $this->id = $id;
      $this->mail = $mail;
      $this->password = $password;
      $this->name = $name;
      $this->phone = $phone;
      $this->address = $address;
   }

   function getId(): int
   {
      return $this->id;
   }

   function getMail(): string
   {
      return $this->mail;
   }

   function getPassword(): string
   {
      return $this->password;
   }

   function getName(): string
   {
      return $this->name;
   }

   function getPhone(): int
   {
      return $this->phone;
   }

   function getAddress(): string
   {
      return $this->address;
   }

   public function __destruct()
   {
      unset($this->id);
      unset($this->mail);
      unset($this->password);
      unset($this->name);
      unset($this->phone);
      unset($this->address);
   }
}