<?php

const ROOTus = 'E:\PHP\ShopExam\\'; // My path for localhost
include ROOTus . 'Model/UserModel.php';

class UserController
{
   private UserModel $user;

   public function  setUser($id, $mail, $password, $name, $role, $phone, $address): void
   {
      $this->user = new UserModel($id, $mail, $password, $name, $role, $phone, $address);
   }

   public function BuildUserAccInfo(): string
   {
      return
      "<div class='current-user__container'>".
      "<div class='current-user__data-label'>Текущие Данные</div>".
      "<fieldset class='current-user__data-border'>".
      "<legend> Имя </legend>".
      "<p>".$this->user->getName()."</p>".
      "</fieldset>".
      "<fieldset class='current-user__data-border'>".
      "<legend> Пароль </legend>".
      "<p>".$this->user->getPassword()."</p>".
      "</fieldset>".
      "<fieldset class='current-user__data-border'>".
      "<legend> Телефон </legend>".
      "<p>".$this->user->getPhone()."</p>".
      "</fieldset>".
      "<fieldset class='current-user__data-border'>".
      "<legend> Адрес </legend>".
      "<p>".$this->user->getAddress()."</p>".
      "</fieldset>".
      "</div>";
   }

   public function Authorization($login, $password): void
   {
      $connectionString = new mysqli("localhost", "root", "", "education");
      if ($connectionString->connect_error) {
         echo 'Error';
      } else {
         $request = "SELECT * FROM users";
         if ($results = $connectionString->query($request)) {
            foreach ($results as $res) {
               if ($login == $res["mail"] && $password == $res["password"]) {
                  if($res["role"] == 'administrator'){
                     echo "<script> location.href='../View/AdminPanelPage.php'; </script>";
                  }
                  if($res["role"] == 'user'){
                     echo "<script> location.href='../index.php'; </script>";
                     session_start();
                     $_SESSION['userId'] = $res['id'];
                     $_SESSION['userMail'] = $res['mail'];
                  }
               }
            }
            echo "Not Authorization";

            $results->free();
            $connectionString->close();
         }
      }
   }

   public function showUserData($id): void
   {
      $connectionString = new mysqli("localhost", "root", "", "education");
      if ($connectionString->connect_error) {
         echo 'Error';
      } else {
         $request = "SELECT * FROM users WHERE id='$id'";
         if ($results = $connectionString->query($request)) {
            foreach ($results as $res) {
               $currentUser = new UserController();
               $currentUser->setUser($res["id"], $res["mail"], $res["password"], $res["name"], $res['role'], $res["phone"], $res["address"]);
               echo $currentUser->BuildUserAccInfo();
               echo $_SESSION['userMail'];
            }
         }
         else{
            echo "error";
         }
      }
   }
}