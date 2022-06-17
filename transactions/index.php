<?php

   require_once '../connection.php';

   $sql = "SELECT transactions.id AS 'transactionID', 
               transactions.payment, transactions.status
               FROM `transactions`";
   $result = mysqli_query($conn, $sql);

   $rows = [];
   while ($row = mysqli_fetch_assoc($result)) {
      $rows[] = $row;
   }

?>

<table>
   <?php foreach ($rows as $transactions) :?>
   <tr>
      <td><?= $transactions['transactionID']; ?></td>
      <td><?= $transactions['payment']; ?></td>
      <td><?= $transactions['status']; ?></td>
      <td><a href="invoice.php?id=<?= $transactions['transactionID']; ?>">Detail</a></td>
   </tr>
   <?php endforeach;?>
</table>