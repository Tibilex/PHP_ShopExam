<?php

class Paginator
{
   private int $result_per_page;
   private int $total_pages;
   private int $results_count;
   private int $first_page_result;

   public function Paginate($perPage, $startPosition): void
   {
      $connectionString = new mysqli("localhost", "root", "", "education");
      if($connectionString->connect_error){
         echo 'ERROR';
      }
      else{
         $request = "SELECT * FROM product_2 LIMIT $startPosition, $perPage";
         //$result = $connectionString->query($request);
         //echo $this->results_count = mysqli_num_rows($result);
         if($result = $connectionString->query($request)) {
            foreach ($result as $res){
               $products = new ProductController();
               $products->setProduct($res["id"], $res["title"], $res["price"], $res["code"], $res["image"], $res["category"]);
               echo $products->BuildProductStyledTile();
            }
            $result->free();
         }
      }

   }

   public function GetTableRows() : int
   {
      $connectionString = new mysqli("localhost", "root", "", "education");
      if ($connectionString->connect_error) {
         echo 'ERROR';
      } else {
         $request = "SELECT * FROM product_2";
         $result = $connectionString->query($request);
         $this->results_count = mysqli_num_rows($result);
         return $this->results_count;
      }
      return $this->results_count;
   }
}