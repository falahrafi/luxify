<?php 

      require_once '../connection.php';

      $cartID = $_GET['id'];

      $query = "DELETE FROM carts WHERE id = $cartID;";

      mysqli_query($conn, $query);

?>