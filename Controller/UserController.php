<?php

const ROOTus = 'E:\PHP\ShopExam\\'; // My path for localhost
include ROOTus . 'Model/UserModel.php';

class UserController
{
   private UserModel $user;

   function  setUser($id, $mail, $password, $name, $role, $phone, $address): void
   {
      $this->user = new UserModel($id, $mail, $password, $name, $role, $phone, $address);
   }

   private function BuildUserAccInfo(): string
   {
      return
      "<div class='user-account__container'>".
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

   public  function showUserData($id): void
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
               $currentUser->BuildUserAccInfo();
               echo $_SESSION['userId'];
            }
         }
         else{
            echo "error";
         }
      }
   }
}