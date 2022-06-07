<?php 

   $sql = "SELECT SUM(quantity) AS 'quantityAll' FROM `carts`";
   $result = mysqli_query($conn, $sql);

   $rows = [];
   while($row = mysqli_fetch_assoc($result)){
      $rows[] = $row;
   }

   $cartQuantityAll = $rows[0]['quantityAll'];

?>