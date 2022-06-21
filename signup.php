<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Akun – Luxify</title>
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

  <!-- Reversed - Ellipse Elements -->
  <div class="container ellipse-container">
    <img src="assets/images/ellipse-b-l.png" class="ellipse-element ellipse-b-l">
    <img src="assets/images/ellipse-b-r.png" class="ellipse-element ellipse-b-r">
    <img src="assets/images/ellipse-b-t.png" class="ellipse-element ellipse-b-t">
  </div>

  <section class="contact">
    <div class="container">
      <div class="row contact-card justify-content-center">
        <!-- Illustration: LG - XL -->
        <div class="col-lg-6 col-sm-10 col-11 text-center">
          <img src="assets/images/illustration-mobile-login.png" alt="Ilustrasi Kontak" class="img-fluid contact-illustration d-none d-lg-block">
        </div>

        <div class="col-lg-4 col-sm-10 col-11">
          <form action="./auth/register.php" method="POST" class="row">

            <div class="col-12 text-center mb-5">
              <!-- Logo: LG - XL -->
              <img src="assets/images/luxify-logo.png" alt="" height="100" class="d-none d-lg-block mx-auto mb-4">
              <img src="assets/images/luxify-text-dark.png" alt="" height="40" class="d-none d-lg-block mx-auto">
              <!-- Logo: XS - MD -->
              <img src="assets/images/luxify-logo-text.png" alt="" height="56" class="d-lg-none mx-auto">
            </div>

            <!-- Illustration: XS - MD -->
            <div class="col-12">
              <img src="assets/images/illustration-login.png" alt="Ilustrasi Kontak" class="img-fluid d-lg-none my-5">
            </div>

            <div class="col-12">
              <label for="inputName" class="form-label">Nama</label>
              <div class="login-input-container">
                <input type="text" name="name" class="form-control login-input" id="inputName" required>
              </div>
            </div>
            <div class="col-12">
              <label for="inputUsername" class="form-label">Username</label>
              <div class="login-input-container">
                <input type="text" name="user" class="form-control login-input" id="inputUsername" required>
              </div>
            </div>
            <div class="col-12">
              <label for="inputPassword" class="form-label">Password</label>
              <div class="login-input-container">
                <input type="password" name="pass" class="form-control login-input" id="inputPassword" required>
                <button class="btn password-visibility float-end" type="button" onclick="passwordVisibility()">
                  <i class="fas fa-eye" id="iconVisibilityPassword"></i>
                </button>
              </div>
            </div>

            <div class="col-12">
              <button type="submit" class="btn btn-login px-4 float-end">
                Daftar
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- Bootstrap javascript -->
  <script src="libraries/bootstrap-5.1.3-dist/js/bootstrap.bundle.js"></script>
  <script>
    function passwordVisibility() {
      var pwText = document.getElementById("inputPassword");
      var pwVisibilityIcon = document.getElementById("iconVisibilityPassword");

      if (pwText.type === "password") {
        pwText.type = "text";
        pwVisibilityIcon.classList.remove("fa-eye");
        pwVisibilityIcon.classList.add("fa-eye-slash");
        pwVisibilityIcon.style.color = "#00AEEF";
      } else {
        pwText.type = "password";
        pwVisibilityIcon.classList.remove("fa-eye-slash");
        pwVisibilityIcon.classList.add("fa-eye");
        pwVisibilityIcon.style.color = "#1D1D1D";
      }
    }
  </script>
</body>

</html>