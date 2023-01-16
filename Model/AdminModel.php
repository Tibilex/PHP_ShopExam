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

   function getId(){
      return $this->id;
   }

   function getLogin(){
      return $this->login;
   }

   function getPassword(){
      return $this->password;
   }

   function getName(){
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