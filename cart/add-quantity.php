<?php 

      require_once '../connection.php';

      // Mengambil data berdasarkan halaman 'details.php'
      $weights = htmlspecialchars($_POST["weights"]);
      $grindLevel = htmlspecialchars($_POST["grind_level"]);
      $coffeeID = htmlspecialchars($_POST["coffee_id"]);

      // Mengambil data yang sama dengan data dari halaman 'details.php'
      $cart = "SELECT * FROM `carts` WHERE weights = '$weights' AND grind_level = '$grindLevel' AND coffee_id = $coffeeID;";
      $resultCart = mysqli_query($conn, $cart);
      $rowCart = mysqli_fetch_assoc($resultCart);
      $cartID = $rowCart['id'];

      // Untuk data yang sudah ada, quantity ditambah 1
      $quantityNew = (int) $rowCart['quantity'] + 1;

      $query = "UPDATE carts SET quantity = $quantityNew WHERE id = $cartID";

      mysqli_query($conn, $query);
      
      echo json_encode(array("coba" => 'Hello'));
?>