<?php

require_once '../connection.php';

$sql = "SELECT carts.quantity, products.id AS 'productID', carts.id AS 'cartID', 
            products.category, products.name, products.price, carts.weights, galleries.image
            FROM `carts`
            INNER JOIN products ON products.id = carts.product_id
            INNER JOIN galleries ON products.id = galleries.product_id
            WHERE type='main' AND quantity > 0
            GROUP BY products.id, carts.weights
            ORDER BY carts.id;";
$result = mysqli_query($conn, $sql);

$rows = [];
while ($row = mysqli_fetch_assoc($result)) {
   $rows[] = $row;
}

function price($weights, $harga)
{
   if ($weights == "50 ml") {
      $price = $harga * 1;
   } else if ($weights == "100 ml") {
      $price = $harga * 2;
   } else if ($weights == "150 ml") {
      $price = $harga * 3;
   }

   return $price;
}

session_start();

if (!isset($_SESSION['level'])) {
   header('location: ../login.php');
   exit();
}

$userid = $_SESSION['id'];
$username = $_SESSION['name'];
$userlevel = $_SESSION['level'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Keranjang – Luxify</title>
   <link href="../libraries/bootstrap-5.1.3-dist/css/bootstrap.css" rel="stylesheet">
   <link href="../styles/main.css" rel="stylesheet">
   <link href="../styles/about.css" rel="stylesheet">
   <link href="../styles/cart.css" rel="stylesheet">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Maven+Pro:wght@500;700&family=Nunito+Sans:wght@400;600;700&display=swap" rel="stylesheet">
   <link rel="shortcut icon" href="../favicon.ico">
   <script src="https://kit.fontawesome.com/a81368914c.js"></script>
</head>

<body>

   <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container py-4">
         <a class="navbar-brand" href="../index.php">
            <img src="../assets/images/luxify-logo-text.png" alt="" height="44">
         </a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <div class="hamburger-menu-container">
               <div class="hamburger-menu-animated"></div>
            </div>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 kopeey-menu">
               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle active" href="#" id="navbarProducts" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                     Products
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarProducts">
                     <li><a href="../index.php#category-men" class="btn-arabica dropdown-item">Luxify for Men</a></li>
                     <li><a href="../index.php#category-women" class="btn-liberica dropdown-item">Luxify for Women</a></li>
                  </ul>
               </li>
               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarAbout" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                     About
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarAbout">
                     <li><a class="dropdown-item" href="../about.php">About Us</a></li>
                     <li><a class="dropdown-item" href="../contact.php">Contact Us</a></li>
                  </ul>
               </li>
               <li class="nav-item dropdown">
                  <div class="btn-outline-admin px-2 text-center">
                     <a class="nav-link dropdown-toggle" href="#" id="navbarUser" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?= $username ?>
                     </a>
                     <ul class="dropdown-menu dropdown-user" aria-labelledby="navbarUser">
                        <?php if ($userlevel == 'admin') : ?>
                           <li>
                              <a class="dropdown-item halaman-admin mb-2" href="../admin">
                                 <i class="fas fa-user-cog me-2"></i>Halaman Admin
                              </a>
                           </li>
                        <?php endif; ?>
                        <li>
                           <a class="dropdown-item logout" href="../logout.php">
                              <i class="fas fa-sign-out-alt me-2"></i>Logout
                           </a>
                        </li>
                     </ul>
                  </div>
               </li>
            </ul>
         </div>
      </div>
   </nav>

   <section class="kopeey-hero">
      <div class="container">
         <div class="row justify-content-center">

            <div class="col-12 col-lg-7 cart-card p-5" id="cartContainer">
               <div class="mb-3">
                  <h2>
                     <i class="fas fa-cart-plus"></i>
                     &nbsp;Keranjang
                  </h2>
               </div>

               <?php
               foreach ($rows as $cart) :
               ?>

                  <div class="row cart-item-container p-4 mt-4 gx-md-5">
                     <div class="col-sm-3 cart-image-container p-2 text-center">
                        <img src="../<?= $cart['image']; ?>" alt="Gambar Kopi" class="cart-image">
                     </div>
                     <div class="col-sm-9 mt-3 mt-sm-0">
                        <h4>
                           <a href="../details.php?id=<?= $cart['productID']; ?>">
                              <?= $cart['name'] . " for " . $cart['category']; ?>
                           </a>
                        </h4>
                        <div>
                           <span class="cart-label"><?= $cart['weights']; ?></span>
                        </div>
                        <div class="mt-3 align-items-end">
                           <span>
                              <button class="btn-plus-minus px-2 px-sm-3 py-1 py-sm-2" onclick="removeQuantity(<?= $cart['cartID']; ?>)">
                                 <i class="fas fa-minus"></i>
                              </button>
                           </span>
                           <span>
                              <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" onchange="changeQuantity(<?= $cart['cartID']; ?>)" size="2" class="quantity text-center" id="quantity-<?= $cart['cartID']; ?>" value="<?= $cart['quantity']; ?>">
                           </span>
                           <span>
                              <button class="btn-plus-minus px-2 px-sm-3 py-1 py-sm-2" onclick="addQuantity(<?= $cart['cartID']; ?>)">
                                 <i class="fas fa-plus"></i>
                              </button>
                           </span>
                           <span>
                              <button class="btn-delete px-2 px-sm-3 py-1 py-sm-2" onclick="deleteCart(<?= $cart['cartID']; ?>)">
                                 <i class="fas fa-trash"></i>
                              </button>
                           </span>
                        </div>
                     </div>
                  </div>

                  <!-- Form untuk mengirim data pada AJAX -->
                  <form id="cartData-<?= $cart['cartID']; ?>">
                     <input type="hidden" name="weights" value="<?= $cart['weights']; ?>">
                     <input type="hidden" name="product_id" value="<?= $cart['productID']; ?>">
                  </form>

               <?php
               endforeach;
               ?>
               <p class="mt-3">
                  *Anda akan mendapatkan diskon <b>5%</b> jika total beli diatas <b>Rp. 500.000,-</b>
               </p>

               <div class="text-center text-sm-end mt-4">
                  <button type="button" id="btnCheckout" class="btn btn-checkout px-4" data-bs-toggle="modal" data-bs-target="#checkoutModal">
                     Checkout
                     <i class="fas fa-check-circle"></i>
                  </button>
               </div>
            </div>


            <div class="col-10 col-sm-12 col-lg-4 offset-lg-1 mt-5 text-center">
               <img src="../assets/images/hero-image.png" alt="" class="hero-image img-fluid">
            </div>

         </div>
      </div>
   </section>

   <!-- Modal -->
   <div class="modal fade" id="checkoutModal" tabindex="-1" aria-labelledby="checkoutModalLabel" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content modal-card p-4">
            <div class="modal-header">
               <h2 class="modal-title" id="checkoutModalLabel">
                  <i class="fas fa-receipt"></i>
                  &nbsp;Detail Pembayaran
               </h2>
               <button type="button" class="btn btn-close-modal" data-bs-dismiss="modal" aria-label="Close">
                  <i class="fas fa-times"></i>
               </button>
            </div>
            <div class="modal-body">

               <?php
               $totalBeli = 0;
               foreach ($rows as $cart) :
               ?>
                  <div class="row cart-item-container p-4 mb-4 gx-md-5 mx-1">
                     <div class="col-sm-3 cart-image-container p-2 text-center">
                        <img src="../<?= $cart['image']; ?>" alt="Gambar Kopi" class="cart-image">
                     </div>
                     <div class="col-sm-9 mt-3 mt-sm-0">
                        <h4>
                           <?= $cart['category'] . " " . $cart['name']; ?>
                        </h4>
                        <div class="mb-2">
                           <span class="cart-label"><?= $cart['weights']; ?></span>
                        </div>
                        <h5 class="cart-label cart-label-black">
                           <?=
                           "Rp. " . number_format(price($cart['weights'], $cart['price']), 0, ',', '.') .
                              " x (" . $cart['quantity'] . ")";
                           ?>
                        </h5>
                        <h4 class="cart-label cart-label-blue-outline">
                           <?php
                           $cartPrices = ((float) price($cart['weights'], $cart['price'])) * $cart['quantity'];
                           $totalBeli += $cartPrices;
                           echo "Subtotal : Rp. " . number_format($cartPrices, 0, ',', '.');
                           ?>
                        </h4>
                     </div>
                  </div>
               <?php
               endforeach;
               ?>

               <div class="">
                  <p class="cart-label cart-label-green d-block text-center w-100">
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
                  <p class="cart-label cart-label-black d-block text-center w-100">
                     Total Beli : Rp. <?= number_format($totalBeli, 0, ',', '.'); ?>
                  </p>
                  <p class="cart-label cart-label-blue d-block text-center w-100">
                     <?php
                     $totalTagihan = $totalBeli - ($totalBeli * $diskon);
                     ?>
                     <i class="fas fa-money-bill-wave"></i>
                     &nbsp;Total Tagihan : Rp. <?= number_format($totalTagihan, 0, ',', '.'); ?>
                  </p>
               </div>

               <form action="" method="get">

                  <h2 class="modal-title mt-5 mb-3">
                     <i class="fas fa-shipping-fast"></i>
                     &nbsp;Alamat Pengiriman
                  </h2>

                  <div class="cart-item-container alamat-pengiriman p-4 mb-4 gx-md-5">
                     <div class="row g-3">
                        <div class="col-12">
                           <label for="inputNama" class="form-label"><i class="fas fa-user"></i>&ensp;Nama Penerima</label>
                           <input type="text" name="name" class="form-control" id="inputNama" placeholder="Nama Lenkap" required>
                        </div>
                        <div class="col-12">
                           <label for="inputTelp" class="form-label"><i class="fas fa-phone-alt"></i>&ensp;No. Telp.</label>
                           <input type="text" name="telp" class="form-control" id="inputTelp" placeholder="Nomor Telepon/HP Anda" pattern="[0-9+]+" required>
                        </div>
                        <div class="col-lg-6">
                           <label for="inputProvinisi" class="form-label"><i class="fas fa-globe-asia"></i>&ensp;Provinsi</label>
                           <input type="text" name="prov" class="form-control" id="inputProvinsi" required>
                        </div>
                        <div class="col-lg-6">
                           <label for="inputKota" class="form-label"><i class="fas fa-city"></i>&ensp;Kota</label>
                           <input type="text" name="city" class="form-control" id="inputKota" required>
                        </div>
                        <div class="col-lg-6">
                           <label for="inputKecamatan" class="form-label"><i class="fas fa-landmark"></i>&ensp;Kecamatan</label>
                           <input type="text" name="kec" class="form-control" id="inputKecamatan" required>
                        </div>
                        <div class="col-lg-6">
                           <label for="inputKodePos" class="form-label"><i class="fab fa-usps"></i>&ensp;Kode Pos</label>
                           <input type="text" name="zip_code" class="form-control" id="inputKodePos" required>
                        </div>
                        <div class="col-12">
                           <label for="inputAlamat" class="form-label"><i class="fas fa-map-marked-alt"></i>&ensp;Alamat</label>
                           <input type="text" name="address" class="form-control" id="inputAlamat" placeholder="Alamat Lengkap" required>
                        </div>
                     </div>
                  </div>

                  <h2 class="modal-title mt-5 mb-3">
                     <i class="fas fa-credit-card"></i>
                     &nbsp;Metode Pembayaran
                  </h2>

                  <div class="cart-item-container alamat-pengiriman p-4 mb-4 gx-md-5">
                     <div class="metode-pembayaran">
                        <select name="pembayaran" id="inputPembayaran" class="form-select" required>
                           <option value="cod" selected>COD (Cash on Delivery)</option>
                           <option value="bca">Transfer Bank - BCA</option>
                           <option value="mandiri">Transfer Bank - Mandiri</option>
                        </select>
                        <i class="fas fa-chevron-down"></i>
                     </div>
                  </div>

                  <button type="submit" name="bayar" class="btn btn-checkout w-100 mt-4 px-4">
                     <i class="fas fa-wallet"></i>
                     &ensp;Bayar Sekarang
                  </button>

               </form>

            </div>
         </div>
      </div>
   </div>

   <section class="footer">
      <div class="container">
         <div class="row gx-sm-5">
            <div class="col-md-4 mb-5">
               <img src="../assets/images/luxify-logo-text-full-white.png" alt="" height="42">
               <p class="hero-paragraph mt-4">
                  Menyediakan berbagai jenis produk kosmetik bagi pria dan wanita, untuk menjaga penampilanmu menjadi lebih menarik.
               </p>
            </div>

            <div class="col-md-2 offset-md-2 mb-5">
               <div class="footer-group-name mb-4">
                  Products
               </div>
               <div class="footer-link mb-3">
                  <a href="../index.php#category-men" class="btn-arabica" id="btn-footer-arabica">Luxify for Men</a>
               </div>
               <div class="footer-link mb-3">
                  <a href="../index.php#category-women" class="btn-liberica" id="btn-footer-liberica">Luxify for Women</a>
               </div>
            </div>

            <div class="col-md-2 mb-5">
               <div class="footer-group-name mb-4">
                  Company
               </div>
               <div class="footer-link mb-3">
                  <a href="../about.php" target="_blank">About Us</a>
               </div>
               <div class="footer-link">
                  <a href="../contact.php" target="_blank">Contact Us</a>
               </div>
            </div>

            <div class="col-md-2 mb-5">
               <div class="footer-group-name mb-4">
                  Social Media
               </div>
               <div class="footer-link">
                  <a href="https://instagram.com" target="_blank">
                     <i class="fab fa-instagram"></i>
                  </a>
                  <a href="https://facebook.com" target="_blank">
                     <i class="fab fa-facebook"></i>
                  </a>
               </div>
            </div>
         </div>

      </div>

      <!-- Small - Extra Large -->
      <div class="footer-copyright text-center d-none d-sm-block">
         &copy;2022 <span>Luxify &bull;</span> All Rights Reserved.
      </div>

      <!-- Extra Small -->
      <div class="footer-copyright text-center d-block d-sm-none">
         &copy;2022 <span>Luxify
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

</body>

</html>