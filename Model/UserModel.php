<?php

class UserModel
{
   private int $id;
   private string $mail;
   private string $password;
   private string $name;
   private int $phone;
   private string $address;
   private string $role;

   function __construct($id, $mail, $password, $name, $role, $phone = "no phone", $address = "no address"){
      $this->id = $id;
      $this->mail = $mail;
      $this->password = $password;
      $this->name = $name;
      $this->role = $role;
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

   function getRole(): string
   {
      return $this->role;
   }

   public function __destruct()
   {
      unset($this->id);
      unset($this->mail);
      unset($this->password);
      unset($this->name);
      unset($this->phone);
      unset($this->address);
      unset($this->role);
   }
}