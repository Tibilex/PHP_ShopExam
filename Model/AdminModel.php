<?php

class AdminModel
{
   private int $id;
   private string $login;
   private string $password;
   private string $name;

   function __construct($id, $login, $password, $name){
      $this->id = $id;
      $this->login = $login;
      $this->password = $password;
      $this->name = $name;
   }

   function getId(): int
   {
      return $this->id;
   }

   function getLogin(): string
   {
      return $this->login;
   }

   function getPassword(): string
   {
      return $this->password;
   }

   function getName(): string
   {
      return $this->name;
   }

   public function __destruct()
   {
      unset($this->id);
      unset($this->login);
      unset($this->password);
      unset($this->name);
   }
}