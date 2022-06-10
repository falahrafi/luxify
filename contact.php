<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Hubungi Kami – Luxify</title>
   <link href="libraries/bootstrap-5.1.3-dist/css/bootstrap.css" rel="stylesheet">
   <link href="styles/main.css" rel="stylesheet">
   <link href="styles/about.css" rel="stylesheet">
   <link href="styles/contact.css" rel="stylesheet">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Maven+Pro:wght@500;700&family=Nunito+Sans:wght@400;600;700&display=swap" rel="stylesheet">
   <script src="https://kit.fontawesome.com/a81368914c.js"></script>
</head>

<body>

   <!-- Ellipse Elements -->
   <div class="container ellipse-container">
      <img src="assets/images/ellipse-b-l.png" class="ellipse-element ellipse-b-l">
      <img src="assets/images/ellipse-b-r.png" class="ellipse-element ellipse-b-r">
      <img src="assets/images/ellipse-b-t.png" class="ellipse-element ellipse-b-t">
      <img src="assets/images/ellipse-s-l-g.png" class="ellipse-element ellipse-s-l-g">
      <img src="assets/images/ellipse-s-l-b.png" class="ellipse-element ellipse-s-l-b">
      <img src="assets/images/ellipse-s-r-b.png" class="ellipse-element ellipse-s-r-b">
      <img src="assets/images/ellipse-s-t-b.png" class="ellipse-element ellipse-s-t-b">
   </div>

   <nav class="navbar navbar-expand-lg navbar-dark">
      <div class="container py-4 justify-content-center">
         <a class="navbar-brand" href="index.php">
            <img src="assets/images/luxify-logo-text.png" alt="" height="44">
         </a>
      </div>
   </nav>

   <section class="contact">
      <div class="container">
         <div class="row contact-card justify-content-center">

            <div class="col-lg-4 col-sm-10 col-11 offset-lg-1">
               <form action="admin/functions/contact_us/tambah.php" method="POST" class="row">
                  <div class="col-12">
                     <h2>Hubungi Kami</h2>
                  </div>
                  <div class="col-12">
                     <img src="assets/images/illustration-contact.png" alt="Ilustrasi Kontak" class="img-fluid d-lg-none mb-5">
                  </div>
                  <div class="col-12">
                     <label for="inputNama" class="form-label">Nama</label>
                     <input type="text" name="name" class="form-control contact-input" id="inputNama" required>
                  </div>
                  <div class="col-12">
                     <label for="inputEmail" class="form-label">Email</label>
                     <input type="email" name="email" class="form-control contact-input" id="inputEmail" required>
                  </div>
                  <div class="col-12">
                     <label for="inputPesan" class="form-label">Pesan Anda</label>
                     <textarea name="message" class="form-control contact-input" id="inputPesan" rows="5" required></textarea>
                  </div>
                  <div class="col-12">
                     <button type="submit" class="btn btn-kirim-pesan px-4">
                        Kirim Pesan
                     </button>
                  </div>
               </form>
            </div>

            <div class="col-lg-7 col-sm-10 col-11 text-center">
               <img src="assets/images/illustration-contact.png" alt="Ilustrasi Kontak" class="img-fluid contact-illustration d-none d-lg-block">
            </div>
         </div>
      </div>
   </section>

   <section class="footer">
      <div class="container">
         <div class="row gx-sm-5">
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
      <div class="footer-copyright text-center">
         &copy;2022 <span>Luxify &bull;</span> All Rights Reserved.
      </div>
   </section>

   <script src="libraries/bootstrap-5.1.3-dist/js/bootstrap.bundle.js"></script>
</body>

</html>