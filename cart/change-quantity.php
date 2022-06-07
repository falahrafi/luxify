<?php 

      require_once '../connection.php';

      // Mengambil data berdasarkan halaman 'details.php'
      $weights = htmlspecialchars($_POST["weights"]);
      $grindLevel = htmlspecialchars($_POST["grind_level"]);
      $coffeeID = htmlspecialchars($_POST["coffee_id"]);

      $qtyNew = (int) $_GET['qty'];

      // Mengambil data quantity saat ini (sebelum diubah)
      $cart = "SELECT * FROM `carts` WHERE weights = '$weights' AND grind_level = '$grindLevel' AND coffee_id = $coffeeID;";
      $resultCart = mysqli_query($conn, $cart);
      $rowCart = mysqli_fetch_assoc($resultCart);
      $cartID = $rowCart['id'];
      $qtyOld = (int) $rowCart['quantity'];

      // Menghitung selisih quantity
      $qtyGap = $qtyNew - $qtyOld;

      // Menentukan apakah selisih negatif atau positif
      // Jika positif maka quantity nantinya akan ditambah
      // Jika negatif maka quantity nantinya akan dikurangi
      if($qtyGap > 0){
         $qtyChange = (int) $qtyOld + $qtyGap;
      } else if ($qtyGap < 0) {
         $qtyChange = (int) $qtyOld - abs($qtyGap);
      }

      $query = "UPDATE carts SET quantity = $qtyChange WHERE id = $cartID";

      mysqli_query($conn, $query);

?>