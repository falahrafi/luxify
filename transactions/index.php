<?php

require_once '../connection.php';

$userid = $_SESSION['id'];

$sql =   "SELECT
            transactions.id AS 'transactionID',
            transactions.payment,
            transactions.status,
            products.price,
            
            (
               SELECT 
                  CASE
                     WHEN carts.weights = '50 ml' THEN (products.price)
                     WHEN carts.weights = '100 ml' THEN (products.price * 2)
                     WHEN carts.weights = '150 ml' THEN (products.price * 3)
                     ELSE 'X'
                  END
            ) AS 'cartPrice',

            carts.weights,
            carts.quantity,

            (
               (
                  SELECT 
                     CONVERT(cartPrice, SIGNED)
               ) * carts.quantity
            ) AS 'subTotal',

            carts.product_id,
            products.name,
            
            SUM(
               (
                  SELECT
                     CONVERT(cartPrice, SIGNED)
               ) * carts.quantity
            ) AS 'totalBeli',

            IF(
               SUM((SELECT CONVERT(cartPrice, SIGNED)) * carts.quantity) > 500000,
               CONVERT((SUM((SELECT CONVERT(cartPrice, SIGNED)) * carts.quantity) - SUM((SELECT CONVERT(cartPrice, SIGNED)) * carts.quantity) * (5/100)), SIGNED),
               CONVERT((SUM((SELECT CONVERT(cartPrice, SIGNED)) * carts.quantity)), SIGNED)
            ) AS 'totalTagihan'

            FROM
               `transactions` 
               INNER JOIN `carts` ON transactions.id = carts.transaction_id
               INNER JOIN `products` ON carts.product_id = products.id

            WHERE
               transactions.user_id = $userid 

            GROUP BY
               transactionID;
         ";
$result = mysqli_query($conn, $sql);

$rows = [];
while ($row = mysqli_fetch_assoc($result)) {
   $rows[] = $row;
}

?>

<!doctype html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Transaksi Saya</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Maven+Pro:wght@700&family=Montserrat:wght@400;500;700&family=Nunito+Sans:wght@400;700&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="../styles/main.css">
   <link rel="stylesheet" href="../styles/transaction.css">
   <link rel="shortcut icon" href="../favicon.ico">
   <script src="https://kit.fontawesome.com/daa4449d64.js" crossorigin="anonymous"></script>
</head>

<body>

   <section>
      <div class="container-lg px-4 px-lg-0">
         <div class="row main-container my-5 px-0">
            <div class="col-12 daftar-barang-container">
               <a href="../">
                  <img src="../assets/images/luxify-logo.png" alt="" width="80" class="d-block mx-auto my-3">
               </a>
               <h2 class="text-center">Daftar Transaksi</h2>
               <div class="table-responsive-lg my-5">
                  <table class="table table-borderless table-daftar-barang">
                     <thead>
                        <tr>
                           <th><i class="fa-solid fa-hashtag"></i>&ensp;ID</th>
                           <th><i class="fa-solid fa-credit-card d-none d-lg-inline"></i>&ensp;Pembayaran</th>
                           <th><i class="fa-solid fa-tag d-none d-lg-inline"></i>&ensp;Tagihan</th>
                           <th><i class="fa-solid fa-circle-check d-none d-lg-inline"></i>&ensp;Status</th>
                           <th><i class="fa-solid fa-arrow-up-right-from-square"></i></th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php if (empty($rows) == 1) : ?>
                           <tr>
                              <td colspan="5" class="text-center">
                                 Anda belum memiliki data transaksi.
                              </td>
                           </tr>
                        <?php endif; ?>

                        <?php foreach ($rows as $transactions) : ?>

                           <tr>
                              <th><?= $transactions['transactionID']; ?></th>
                              <td>
                                 <?php
                                 if ($transactions['payment'] == 'bca') {
                                    echo '<img src="../assets/images/logo-bank-bca.png" alt="" height="24" class="d-block">';
                                 } else if ($transactions['payment'] == 'mandiri') {
                                    echo '<img src="../assets/images/logo-bank-mandiri.png" alt="" height="24" class="d-block">';
                                 } else if ($transactions['payment'] == 'cod') {
                                    echo '<img src="../assets/images/icon-cod.png" alt="" height="34" class="d-block">';
                                 } else {
                                    echo "-";
                                 }
                                 ?>
                              </td>
                              <td>Rp. <?= number_format($transactions['totalTagihan'], 0, ',', '.'); ?>,-</td>
                              <td>
                                 <div class="status-transaksi bg-status bg-yellow" onload="aturStatus(this, '<?= $transactions['status']; ?>');">
                                    <?= ucwords($transactions['status']); ?>
                                 </div>
                              </td>
                              <td>
                                 <a href="invoice.php?id=<?= $transactions['transactionID']; ?>" class="btn btn-details px-3 px-lg-4">
                                    <i class="fa-solid fa-receipt"></i>
                                    <span class="d-none d-lg-inline">&nbsp;Invoice</span>
                                 </a>
                              </td>
                           </tr>
                        <?php endforeach; ?>
                     </tbody>
                  </table>
               </div>
               <div class="copyright text-center">
                  &copy;2022 <span>Luxify</span> &bull; All Rights Reserved.
               </div>
            </div>
         </div>
      </div>
   </section>

   <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
   <script>
      // Load bagian bagian select status pembayaran secara otomatis,
      // sehingga fungsi 'aturStatus()' dapat berjalan
      $(document).ready(function() {
         $('.status-transaksi').trigger('load');
      });

      // Fungsi ketika bagian select status pembayaran di-load
      function aturStatus(_this, status) {
         if (status == 'pending') {
            $(_this).addClass('bg-yellow');
            $(_this).removeClass('bg-red');
            $(_this).removeClass('bg-green');
         } else if (status == 'success') {
            $(_this).addClass('bg-green');
            $(_this).removeClass('bg-red');
            $(_this).removeClass('bg-yellow');
         } else if (status == 'failed') {
            $(_this).addClass('bg-red');
            $(_this).removeClass('bg-yellow');
            $(_this).removeClass('bg-green');
         }
      }
   </script>
</body>

</html>