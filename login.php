<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login – Luxify</title>
  <link href="libraries/bootstrap-5.1.3-dist/css/bootstrap.css" rel="stylesheet">
  <link href="styles/main.css" rel="stylesheet">
  <link href="styles/about.css" rel="stylesheet">
  <link href="styles/login.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Maven+Pro:wght@500;700&family=Nunito+Sans:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="shortcut icon" href="favicon.ico">
  <script src="https://kit.fontawesome.com/a81368914c.js"></script>
</head>

<body>

<!-- Ellipse Elements -->
<div class="container ellipse-container">
  <img src="assets/images/ellipse-b-l.png" class="ellipse-element ellipse-b-l">
  <img src="assets/images/ellipse-b-r.png" class="ellipse-element ellipse-b-r">
  <img src="assets/images/ellipse-b-t.png" class="ellipse-element ellipse-b-t">
</div>

<section class="contact">
  <div class="container">
    <div class="row contact-card justify-content-center">
      <div class="col-lg-4 col-sm-10 col-11 offset-lg-1">
        <form action="auth.php" method="POST" class="row">
          <div class="col-12 mb-5">
            <img src="assets/images/luxify-logo-text.png" alt="" height="44">
          </div>
          <div class="col-12">
            <img src="assets/images/illustration-contact.png" alt="Ilustrasi Kontak" class="img-fluid d-lg-none">
          </div>
          <div class="col-12">
            <label for="inputNama" class="form-label">Username</label>
            <input type="text" name="user" class="form-control contact-input" id="inputNama" required>
          </div>
          <div class="col-12">
            <label for="inputEmail" class="form-label">Password</label>
            <input type="password" name="pass" class="form-control contact-input" id="inputEmail" required>
          </div>
          <div class="col-12">
            <button type="submit" class="btn btn-kirim-pesan px-4 float-end">
              Login
            </button>
          </div>
          <div class="col-12">
            <h5 class="float-end mt-3">
              Tidak punya akun? <a href="#" class="text-decoration-none">Daftar sekarang</a>
            </h5>
          </div>
        </form>
      </div>

      <div class="col-lg-7 col-sm-10 col-11 text-center">
        <img src="assets/images/access-control-system-abstract-concept.webp" alt="Ilustrasi Kontak" class="img-fluid contact-illustration d-none d-lg-block">
      </div>
    </div>
  </div>
</section>

<!-- Bootstrap javascript -->
<script src="libraries/bootstrap-5.1.3-dist/js/bootstrap.bundle.js"></script>
</body>

</html>
