<?php

require_once '../connection.php';
require_once '../cart/price.php';

// Transactions Data
$transaction_id = $_GET['id'];

$sql = "SELECT transactions.id AS 'transactionID', transactions.user_id AS 'userID',
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


session_start();
$userid = $_SESSION['id'];

// Hanya tampilkan invoice dari masing-masing user
if ($userid != $transaction['userID']) {
   header('location: ../');
   exit();
}



// Carts Data
$sql = "SELECT carts.quantity, products.id AS 'productID', carts.id AS 'cartID', 
            products.category, products.name, products.price, carts.weights, galleries.image
            FROM `carts`
            INNER JOIN products ON products.id = carts.product_id
            INNER JOIN galleries ON products.id = galleries.product_id
            WHERE type='main' AND quantity > 0 AND transaction_id = $transaction_id
            GROUP BY products.id, carts.weights
            ORDER BY carts.id;";
$result = mysqli_query($conn, $sql);

$carts = [];
while ($cart = mysqli_fetch_assoc($result)) {
   $carts[] = $cart;
}


// Transfer Slips Data
$sql = "SELECT COUNT(id) AS 'jumlahSlip' FROM `transfer_slips` WHERE transaction_id = $transaction_id;";
$result = mysqli_query($conn, $sql);

$rows = [];
while ($row = mysqli_fetch_assoc($result)) {
   $rows[] = $row;
}
$slip = $rows[0];


?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Invoice – Luxify</title>
   <link href="../libraries/bootstrap-5.1.3-dist/css/bootstrap.css" rel="stylesheet">
   <link href="../styles/main.css" rel="stylesheet">
   <link href="../styles/about.css" rel="stylesheet">
   <link href="../styles/invoice.css" rel="stylesheet">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Maven+Pro:wght@500;700&family=Nunito+Sans:wght@400;600;700&display=swap" rel="stylesheet">
   <link rel="shortcut icon" href="../favicon.ico">
   <script src="https://kit.fontawesome.com/a81368914c.js"></script>
</head>

<body>

   <section class="kopeey-hero">
      <div class="container-lg px-2 px-sm-4 px-md-5 px-lg-0 my-5">
         <div class="row justify-content-center">

            <div class="col-12 col-lg-7 cart-card py-5 px-3 px-sm-5"" id=" cartContainer">
               <div class="mb-4 text-center">
                  <h2>
                     <i class="fas fa-receipt"></i>
                     &nbsp;Invoice
                  </h2>
               </div>

               <div class="cart-item-container invoice py-5 mb-5 gx-md-5">
                  <div class="row g-3 text-center">

                     <h6>Total Tagihan:</h6>
                     <p class="invoice-label invoice-label-blue d-block mx-auto mt-2 mb-4" id="totalTagihanTop">
                        <!-- Diisi Dengan Javascript -->
                     </p>

                     <h6>Pembayaran:</h6>
                     <!-- Menentukan Pembayaran -->
                     <?php if ($transaction['payment'] == 'bca') { ?>
                        <img src="../assets/images/logo-bank-bca.png" alt="Logo Bank BCA" class="logo-bank mx-auto">
                        <div class="nama-rekening">Luxify Corporation</div>
                        <div class="no-rekening mt-1 mb-4">0123456789</div>
                     <?php } else if ($transaction['payment'] == 'mandiri') { ?>
                        <img src="../assets/images/logo-bank-mandiri.png" alt="Logo Bank Mandiri" class="logo-bank mx-auto">
                        <div class="nama-rekening">Luxify Corporation</div>
                        <div class="no-rekening mt-1 mb-4">12345678909876</div>
                     <?php } else if ($transaction['payment'] == 'cod') { ?>
                        <img src="../assets/images/icon-cod.png" alt="Cash on Delivery" class="logo-bank mx-auto">
                        <div clas="mb-4"></div>
                     <?php } ?>

                     <!-- Menentukan Status Transaksi -->
                     <?php if ($transaction['status'] == 'pending') { ?>
                        <p class="invoice-label invoice-status invoice-label-warning d-block mx-auto">
                           Pending
                        </p>
                     <?php } else if ($transaction['status'] == 'success') { ?>
                        <p class="invoice-label invoice-status invoice-label-success d-block mx-auto">
                           Success
                        </p>
                     <?php } else if ($transaction['status'] == 'failed') { ?>
                        <p class="invoice-label invoice-status invoice-label-danger d-block mx-auto">
                           Failed
                        </p>
                     <?php } ?>
                  </div>
               </div>

               <!-- Jangan tampilkan jika Status Pembayran = SUCCESS -->
               <?php if ($transaction['payment'] != 'cod' and $transaction['status'] != 'success') : ?>

                  <div class="mb-4 text-center">
                     <h2>
                        <i class="fas fa-camera"></i>
                        &nbsp;Bukti Transfer
                     </h2>
                  </div>

                  <div class="cart-item-container invoice py-5 mb-5 gx-md-5">

                     <form action="add-transfer-slip.php?id=<?= $transaction['transactionID']; ?>" method="POST" enctype="multipart/form-data">
                        <div class="row g-3 text-center">

                           <!-- Jika BELUM Mengirimkan Bukti Pembayaran -->
                           <?php if ($slip['jumlahSlip'] < 1) { ?>
                              <div class="col-md-8 col-10 mx-auto mb-3">
                                 <div>
                                    <label for="imageSlip" class="form-label">Upload bukti transfer</label>
                                    <input type="file" accept="image/*" name="image" class="form-control form-control-lg" id="imageSlip" required>
                                 </div>
                              </div>
                              <div class="col-lg-8 mx-auto">
                                 <button type="submit" name="upload" class="btn btn-upload px-4">
                                    Upload
                                    <i class="fas fa-cloud-upload-alt"></i>
                                 </button>
                              </div>

                              <!-- Jika SUDAH Mengirimkan Bukti Pembayaran -->
                           <?php } else { ?>

                              <!-- Jika Status Pembayran = PENDING -->
                              <?php if ($transaction['status'] == 'pending') { ?>
                                 <div class="col-10 mx-auto">
                                    <p class="my-2 alamat">
                                    <h5 class="mb-3">Anda sudah mengirimkan bukti transfer!</h5>
                                    Mohon menunggu admin untuk memverifikasi pembayaran anda.
                                    Silahkan menghubungi <b>Admin X (081122344566)</b> jika terdapat kendala dalam pembayaran.
                                    </p>
                                 </div>

                                 <!-- Jika Status Pembayran = FAILED -->
                              <?php } else if ($transaction['status'] == 'failed') { ?>
                                 <div class="col-10 mx-auto">
                                    <p class="my-2 alamat">
                                    <h5 class="mb-3">Terjadi masalah dalam proses verfifikasi pembayaran anda!</h5>
                                    Silakan menghubungi <b>Admin X (081122344566)</b> untuk mendapatkan bantuan secepatnya.
                                    </p>
                                 </div>
                              <?php } ?>

                           <?php } ?>

                        </div>
                     </form>

                  </div>
               <?php endif; ?>

               <div class="mb-4 text-center">
                  <h2>
                     <i class="fas fa-map-marked-alt"></i>
                     &nbsp;Alamat Pengiriman
                  </h2>
               </div>

               <div class="cart-item-container invoice py-3 mb-5 gx-md-5">
                  <div class="row g-3 text-center">
                     <div class="col-10 mx-auto">
                        <p class="my-2 alamat">
                           <?= $transaction['address']; ?>, <?= $transaction['prov']; ?>, <?= $transaction['city']; ?>, <?= $transaction['kec']; ?>, <?= $transaction['zip_code']; ?>
                           <b>(<?= $transaction['name'] . " - " . $transaction['telp']; ?>)</b>
                        </p>
                     </div>
                  </div>
               </div>

               <div class="mb-4 text-center">
                  <h2>
                     <i class="fas fa-file-alt"></i>
                     &nbsp;Detail Pesanan
                  </h2>
               </div>

               <?php
               $totalBeli = 0;
               foreach ($carts as $cart) :
               ?>
                  <div class="row cart-item-container p-4 mb-4 gx-md-5 mx-1">
                     <div class="col-sm-3 cart-image-container p-2 text-center">
                        <img src="../<?= $cart['image']; ?>" alt="Gambar Kopi" class="invoice-image">
                     </div>
                     <div class="col-sm-9 mt-3 mt-sm-0">
                        <h4>
                           <?= $cart['category'] . " " . $cart['name']; ?>
                        </h4>
                        <div class="mb-2">
                           <span class="invoice-label"><?= $cart['weights']; ?></span>
                        </div>
                        <h5 class="invoice-label invoice-label-black">
                           <?=
                           "Rp. " . number_format(price($cart['weights'], $cart['price']), 0, ',', '.') .
                              " x (" . $cart['quantity'] . ")";
                           ?>
                        </h5>
                        <h5 class="invoice-label invoice-label-blue-outline">
                           <?php
                           $cartPrices = ((float) price($cart['weights'], $cart['price'])) * $cart['quantity'];
                           $totalBeli += $cartPrices;
                           echo "Subtotal : Rp. " . number_format($cartPrices, 0, ',', '.');
                           ?>
                        </h5>
                     </div>
                  </div>
               <?php
               endforeach;
               ?>

               <div class="">
                  <p class="invoice-label invoice-label-green d-block text-center w-100">
                     <?php
                     if ($totalBeli > 500000) {
                        $diskon = 0.05;
                        echo 'Diskon : 5%';
                     } else {
                        $diskon = 0;
                        echo 'Diskon : 0%';
                     }
                     ?>
                  </p>
                  <p class="invoice-label invoice-label-black d-block text-center w-100">
                     Total Beli : Rp. <?= number_format($totalBeli, 0, ',', '.'); ?>
                  </p>
                  <p class="invoice-label invoice-label-blue d-block text-center w-100">
                     <?php
                     $totalTagihan = $totalBeli - ($totalBeli * $diskon);
                     ?>
                     Total Tagihan : <span id="totalTagihanBottom">Rp. <?= number_format($totalTagihan, 0, ',', '.'); ?></span>
                  </p>
               </div>

            </div>

         </div>
      </div>
   </section>

   <script type="text/javascript" src="../libraries/jquery-3.6.0.min.js"></script>
   <script src="../libraries/bootstrap-5.1.3-dist/js/bootstrap.bundle.js"></script>
   <script>
      function addQuantity(cartID) {
         $.ajax({
            type: "POST",
            url: "add-quantity.php",
            data: $('#cartData-' + cartID).serialize(),
            success: function(response) {
               $("#cartContainer").load(" #cartContainer > *");
               $("#checkoutModal").load(" #checkoutModal > *");
            }
         });
      }

      function removeQuantity(cartID) {
         $.ajax({
            type: "POST",
            url: "remove-quantity.php",
            data: $('#cartData-' + cartID).serialize(),
            success: function(response) {
               $("#cartContainer").load(" #cartContainer > *");
               $("#checkoutModal").load(" #checkoutModal > *");
            }
         });
      }

      function changeQuantity(cartID) {
         var quantityValue = $('#quantity-' + cartID).val();

         $.ajax({
            type: "POST",
            url: "change-quantity.php?qty=" + quantityValue,
            data: $('#cartData-' + cartID).serialize(),
            success: function(response) {
               $("#cartContainer").load(" #cartContainer > *");
               $("#checkoutModal").load(" #checkoutModal > *");
            }
         });
      }

      function deleteCart(cartID) {
         $.ajax({
            type: "POST",
            url: "delete-cart.php?id=" + cartID,
            data: $('#cartData-' + cartID).serialize(),
            success: function(response) {
               $("#cartContainer").load(" #cartContainer > *");
               $("#checkoutModal").load(" #checkoutModal > *");
            }
         });
      }
   </script>

   <script>
      $("#pilihAlamat").click(function() {
         if (document.getElementById("newAddress").selected == true) {
            $('#alamatBaru').show();
         } else {
            $('#alamatBaru').hide();
         }
      });
      $("#bayarSekarang").click(function() {
         if (document.getElementById("newAddress").selected == false) {
            $('#alamatBaru').remove();
         }
      });
   </script>

   <script>
      $totalTagihanBottom = document.getElementById('totalTagihanBottom').textContent;
      document.getElementById('totalTagihanTop').textContent = $totalTagihanBottom;
   </script>

</body>

</html>