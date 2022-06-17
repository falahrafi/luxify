<?php

   require_once '../connection.php';

   $transaction_id = $_GET['id'];

   $sql = "SELECT transactions.id AS 'transactionID', 
               transactions.payment, transactions.status, addresses.name, addresses.telp,
               addresses.prov, addresses.city, addresses.kec, addresses.zip_code, addresses.address
               FROM `transactions`
               INNER JOIN addresses ON addresses.id = transactions.address_id
               WHERE transactions.id = $transaction_id";
   $result = mysqli_query($conn, $sql);

   $rows = [];
   while ($row = mysqli_fetch_assoc($result)) {
      $rows[] = $row;
   }
   $transaction = $rows[0];

   echo $transaction['payment'] . '<br>';
   echo $transaction['status'] . '<br>';
   echo $transaction['name'] . '<br>';
   echo $transaction['telp'] . '<br>';
   echo $transaction['prov'] . '<br>';
   echo $transaction['city'] . '<br>';
   echo $transaction['kec'] . '<br>';
   echo $transaction['zip_code'] . '<br>';
   echo $transaction['address'] . '<br>';

?>