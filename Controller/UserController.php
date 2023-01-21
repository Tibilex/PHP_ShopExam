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
      "</div>".
      "<form class='user-account-form__container' method='post'>".
      "<input type='submit' name='exitInAcc' value='Выход из аккаунта'>".
      "</form>";

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
                     $_SESSION['userPhone'] = $res['phone'];
                     $_SESSION['userAddress'] = $res['address'];
                     $_SESSION['userCartProducts'] = array();
                     $_SESSION['userBuysHistory'] = array();
                     $_SESSION['totalProductsCost'] = 0;
                  }
               }
            }
            echo "Not Authorization";

            $results->free();
            $connectionString->close();
         }
      }
   }

   public function Registration($login, $password): void
   {
      $connectionString = new mysqli("localhost", "root", "", "education");
      if($connectionString->connect_error){
         echo "error";
      }
      else{
         $data = "INSERT INTO users (mail, password, name, role, phone, address) VALUES ('$login' , '$password', 'No name', 'user', '000', 'no address')";
         if($connectionString->query($data)){
            echo "<p>Регистрация успешна</p>";
         }
         else{
            echo "<p>Ошибка регистрации</p>";
         }
         $connectionString->close();
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
            }
         }
         else{
            echo "error";
         }
      }
   }

   public function UpdateUserData($name, $password, $phone, $address): void
   {
      $connectionString = new mysqli("localhost", "root", "", "education");
      if ($connectionString->connect_error) {
         echo "error";
      }
      else {
         $itemId = $_SESSION['userId'];

         $request = "UPDATE users SET password='$password', name='$name', phone='$phone', address='$address' WHERE id='$itemId'";

         if($connectionString->query($request)){
            $connectionString->close();
         }
         else{
            $connectionString->close();
         }
      }
   }

}