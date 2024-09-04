<?php

   require_once '../connection.php';

   $userid = $_SESSION['id'];

   $pilihAlamat = $_POST['pilih_alamat'];

   $name = $_POST['name'];
   $telp = $_POST['telp'];
   $prov = $_POST['prov'];
   $city = $_POST['city'];
   $kec = $_POST['kec'];
   $zip_code = $_POST['zip_code'];
   $address = $_POST['address'];
   $payment = $_POST['payment'];

   if($pilihAlamat == "new") {

      // Menambahkan Data Ke Tabel 'addresses'
      $query = "INSERT INTO addresses (name, telp, prov, city, kec, zip_code, address, user_id)
                        VALUES ('$name' , '$telp', '$prov', '$city', '$kec', '$zip_code', '$address', '$userid')";
      mysqli_query($conn, $query);

      // Menambahkan Data Ke Tabel 'transactions'
      $query = "INSERT INTO transactions (payment, status, user_id, address_id)
                        VALUES ('$payment' , 'pending', '$userid', (LAST_INSERT_ID()))";
      mysqli_query($conn, $query);

   } else {

      // Menambahkan Data Ke Tabel 'transactions'
      $query = "INSERT INTO transactions (payment, status, user_id, address_id)
                           VALUES ('$payment' , 'pending', '$userid', '$pilihAlamat')";
      mysqli_query($conn, $query);
      
   }

   $transaction_id = mysqli_insert_id($conn);

   $cartsID = $_POST['cart_id'];
   foreach ($cartsID as $cartID) {
      $query = "UPDATE carts SET transaction_id = $transaction_id WHERE id = $cartID";
      mysqli_query($conn, $query);
   }

   echo "
            <script>
                document.location.href = 'invoice.php?id=$transaction_id';
            </script>
        ";

?>