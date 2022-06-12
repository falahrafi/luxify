<?php 

      require_once '../connection.php';

      // Mengambil data berdasarkan halaman 'details.php'
      $weights = htmlspecialchars($_POST["weights"]);
      $productID = htmlspecialchars($_POST["product_id"]);

      // Mengambil data yang sama dengan data dari halaman 'details.php'
      $cart = "SELECT * FROM `carts` WHERE weights = '$weights' AND product_id = $productID;";
      $resultCart = mysqli_query($conn, $cart);
      $rowCart = mysqli_fetch_assoc($resultCart);
      $cartID = $rowCart['id'];

      // Untuk data yang sudah ada, quantity dikurangi 1
      $quantityNew = (int) $rowCart['quantity'] - 1;

      $query = "UPDATE carts SET quantity = $quantityNew WHERE id = $cartID";

      mysqli_query($conn, $query);
?>