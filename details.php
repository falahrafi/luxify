<?php

require_once 'connection.php';

if (isset($_SESSION['id'])) {
   // Akan mencari keseluruhan jumlah quantity pada cart
   // Menghasilkan variabel '$cartQuantityAll'
   require_once 'cart/cart-quantity.php';

   $userid = $_SESSION['id'];
   $username = $_SESSION['name'];
   $userlevel = $_SESSION['level'];
}

$productID = $_GET["id"];

$sql = "SELECT products.id AS 'productID', products.name, products.category, products.price,
                   products.description, galleries.image, galleries.type
            FROM products INNER JOIN galleries ON products.id = galleries.product_id
            WHERE products.id = $productID;";
$result = mysqli_query($conn, $sql);

$rows = [];
while ($row = mysqli_fetch_assoc($result)) {
   $rows[] = $row;
}
$coffee = $rows[0];

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>
      <?= $coffee["category"] . " " . $coffee["name"] . " – Luxify"; ?>
   </title>
   <link href="libraries/bootstrap-5.1.3-dist/css/bootstrap.css" rel="stylesheet">
   <link href="styles/main.css" rel="stylesheet">
   <link href="styles/about.css" rel="stylesheet">
   <link href="styles/product-detail.css" rel="stylesheet">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Maven+Pro:wght@500;700&family=Nunito+Sans:wght@400;600;700&display=swap" rel="stylesheet">
   <link rel="shortcut icon" href="favicon.ico">
   <script src="https://kit.fontawesome.com/a81368914c.js"></script>
</head>

<body>

   <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container py-4">
         <a class="navbar-brand" href="index.php">
            <img src="assets/images/luxify-logo-text.png" alt="" height="44">
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
                     <li><a href="index.php#category-men" class="btn-arabica dropdown-item">Luxify for Men</a></li>
                     <li><a href="index.php#category-women" class="btn-liberica dropdown-item">Luxify for Women</a></li>
                  </ul>
               </li>
               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarAbout" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                     About
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarAbout">
                     <li><a class="dropdown-item" href="about.php">About Us</a></li>
                     <li><a class="dropdown-item" href="contact.php">Contact Us</a></li>
                  </ul>
               </li>
               <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="cart">
                     <i class="fas fa-shopping-cart"></i>
                     <?php if (isset($cartQuantityAll)) : ?>
                        <?php if ($cartQuantityAll > 0) : ?>
                           <span class="translate-middle badge my-label my-label-blue px-2">
                              <?php if ($cartQuantityAll > 99) {
                                 $cartQuantityAll = '99+';
                              } ?>
                              <?= $cartQuantityAll; ?>
                              <span class="visually-hidden">unread messages</span>
                           </span>
                        <?php endif; ?>
                     <?php endif; ?>
                  </a>
               </li>
               <?php if (isset($_SESSION['id'])): ?>
                  <li class="nav-item dropdown">
                     <div class="text-center">
                        <a class="nav-link dropdown-toggle btn-outline-admin px-3 py-1" href="#" id="navbarUser" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                           <?= $username ?>
                        </a>
                        <ul class="dropdown-menu dropdown-user" aria-labelledby="navbarUser">
                           <li>
                              <a class="dropdown-item halaman-admin mb-2" href="transactions">
                                 <i class="fas fa-receipt"></i>&emsp;Transaksi Saya
                              </a>
                           </li>
                           <?php if ($userlevel == 'admin') : ?>
                              <li>
                                 <a class="dropdown-item halaman-admin mb-2" href="admin">
                                    <i class="fas fa-user-cog"></i>&ensp;Halaman Admin
                                 </a>
                              </li>
                              <hr>
                           <?php endif; ?>
                           <li>
                              <a class="dropdown-item logout" href="logout.php">
                                 <i class="fas fa-sign-out-alt me-2"></i>Logout
                              </a>
                           </li>
                        </ul>
                     </div>
                  </li>
               <?php else: ?>
                  <a href="login.php" class="btn btn-beli-sekarang px-4 ms-3" role="button">
                     Login
                  </a>
               <?php endif; ?>
            </ul>
         </div>
      </div>
   </nav>

   <section class="product-detail">
      <div class="container">
         <div class="row product-detail-card justify-content-center align-items-center">

            <div class="col-lg-6 product-detail-image-container">
               <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                  <div class="carousel-inner text-center">

                     <?php foreach ($rows as $row) : ?>

                        <div class="carousel-item <?php if ($row['type'] == 'main') {
                                                      echo 'active';
                                                   } ?>">
                           <img src="<?= $row['image']; ?>" class="product-detail-image" alt="">
                        </div>

                     <?php endforeach; ?>

                  </div>
                  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                     <i class="fas fa-chevron-left"></i>
                     <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                     <i class="fas fa-chevron-right"></i>
                     <span class="visually-hidden">Next</span>
                  </button>
               </div>
            </div>

            <div class="col-lg-6 product-info">
               <form action="cart/add-to-cart.php?id=<?= $productID; ?>" method="post" class="row gx-0">
                  <div class="col-12 mb-2">
                     <div class="btn product-info-category mb-1">
                        <?= $coffee['category']; ?>
                     </div>
                  </div>

                  <div class="col-12 mb-2">
                     <h2>
                        <?= $coffee['name']; ?>
                     </h2>
                  </div>

                  <div class="col-12 mb-5">
                     <div class="product-info-price">
                        <?= "Rp. " . number_format($coffee['price'], 0, ',', '.'); ?>
                        <span> / 50 ml</span>
                     </div>
                  </div>

                  <!-- Label Ukuran -->
                  <div class="col-12 mb-2">
                     <h4>Ukuran</h4>
                  </div>

                  <!-- Pilihan Ukuran -->
                  <div class="col-lg-3 mb-lg-0 mb-3 product-info-weights">
                     <label class="options-container">
                        <input type="radio" name="weights" value="50 ml" checked>
                        <div class="btn btn-options">
                           50 ml
                        </div>
                     </label>
                  </div>
                  <div class="col-lg-3 mb-lg-0 mb-3 product-info-weights">
                     <label class="options-container">
                        <input type="radio" name="weights" value="100 ml">
                        <div class="btn btn-options">
                           100 ml
                        </div>
                     </label>
                  </div>
                  <div class="col-lg-3 mb-lg-0 mb-3 product-info-weights">
                     <label class="options-container">
                        <input type="radio" name="weights" value="150 ml">
                        <div class="btn btn-options">
                           150 ml
                        </div>
                     </label>
                  </div>

                  <!-- Label Deskripsi -->
                  <div class="col-12 mb-2 mt-5">
                     <h4>Deskripsi</h4>
                  </div>

                  <!-- Isi Deskripsi -->
                  <div class="col-10 product-info-desc">
                     <p class="text-justify">
                        <?= $coffee['description']; ?>
                     </p>
                  </div>

                  <!-- Tombol Masukkan Keranjang -->
                  <div class="col-12 mt-4">

                     <!-- Small - Extra Large -->
                     <button type="submit" class="btn btn-masukkan-keranjang px-4 d-none d-sm-block" role="button">
                        <i class="fas fa-cart-plus"></i>
                        &nbsp;Masukkan Keranjang
                     </button>

                     <!-- Extra Small -->
                     <button type="submit" class="btn btn-masukkan-keranjang px-4 d-block d-sm-none" role="button">
                        <i class="fas fa-cart-plus"></i>
                        &nbsp;Keranjang
                     </button>
                  </div>

               </form>
            </div>

         </div>
      </div>
   </section>

   <section class="footer">
      <div class="container">
         <div class="row gx-sm-5 gx-lg-2">
            <div class="col-md-4 mb-5">
               <img src="assets/images/luxify-logo-text-full-white.png" alt="" height="42">
               <p class="hero-paragraph mt-4">
                  Menyediakan berbagai jenis produk kosmetik bagi pria dan wanita, untuk menjaga penampilanmu menjadi lebih menarik.
               </p>
            </div>

            <div class="col-md-2 offset-md-2 mb-5">
               <div class="footer-group-name mb-4">
                  Products
               </div>
               <div class="footer-link mb-3">
                  <a href="index.php#category-men" class="btn-arabica" id="btn-footer-arabica">Luxify for Men</a>
               </div>
               <div class="footer-link mb-3">
                  <a href="index.php#category-women" class="btn-liberica" id="btn-footer-liberica">Luxify for Women</a>
               </div>
            </div>

            <div class="col-md-2 mb-5">
               <div class="footer-group-name mb-4">
                  Company
               </div>
               <div class="footer-link mb-3">
                  <a href="about.php" target="_blank">About Us</a>
               </div>
               <div class="footer-link">
                  <a href="contact.php" target="_blank">Contact Us</a>
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

   <script type="text/javascript" src="libraries/jquery-3.6.0.min.js"></script>
   <script src="libraries/bootstrap-5.1.3-dist/js/bootstrap.bundle.js"></script>
   <script>
      var price = parseFloat("<?php echo $coffee['price']; ?>");
      console.log(price);

      $(document).ready(function() {
         $('input[type=radio][name=weights][value="150 ml"]').trigger('click');
      });

      // Mengubah Ukuran Gambar
      $('input[type=radio][name=weights]').click(function() {
         if (this.value == '50 ml') {
            $('.product-detail-image').addClass('product-detail-image-50');
            $('.product-detail-image').removeClass('product-detail-image-100');
            $('.product-detail-image').removeClass('product-detail-image-150');
         } else if (this.value == '100 ml') {
            $('.product-detail-image').addClass('product-detail-image-100');
            $('.product-detail-image').removeClass('product-detail-image-150');
            $('.product-detail-image').removeClass('product-detail-image-50');
         } else if (this.value == '150 ml') {
            $('.product-detail-image').addClass('product-detail-image-150');
            $('.product-detail-image').removeClass('product-detail-image-100');
            $('.product-detail-image').removeClass('product-detail-image-50');
         }
      });

      // Mengubah tampilan harga kopi jika berat kopi dipilih
      $('input[type=radio][name=weights]').change(function() {

         if (this.value == '50 ml') {
            let price50ml = price.toLocaleString("id-ID");
            $('.product-info-price').html("Rp. " + price50ml + "<span> / 50 ml</span>");
         } else if (this.value == '100 ml') {
            let price100ml = price * 2;
            price100ml = price100ml.toLocaleString("id-ID");
            $('.product-info-price').html("Rp. " + price100ml + "<span> / 100 ml</span>");
         } else if (this.value == '150 ml') {
            let price150ml = price * 3;
            price150ml = price150ml.toLocaleString("id-ID");
            $('.product-info-price').html("Rp. " + price150ml + "<span> / 150 ml</span>");
         }

      });
   </script>

</body>

</html>