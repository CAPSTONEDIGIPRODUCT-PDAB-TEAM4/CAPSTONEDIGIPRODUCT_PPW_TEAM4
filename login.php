<?php
session_start();

require_once "koneksi.php";

if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
  $result = mysqli_query($koneksi, $sql);
  
  if (mysqli_num_rows($result) > 0) {
      // Set session sudah_login
      $_SESSION['sudah_login'] = true;

      if (isset($_POST['rememberMe'])) {
          setcookie(
              'ingat_saya',
              'true',
              time() + (86400 * 7), // 1 minggu
              '/'
          );
      }
      header('Location: login_process.php');
  } else {
      echo "<script>alert('Email atau password tidak tepat')</script>";
      header("Refresh:0");
  }
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet" />

    <title>Ayo Dukung Gender Equality</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css" />
    <link rel="stylesheet" href="assets/css/templatemo-scholar.css" />
    <link rel="stylesheet" href="assets/css/owl.css" />
    <link rel="stylesheet" href="assets/css/animate.css" />
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
  </head>

  <body>
    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
      <div class="preloader-inner">
        <span class="dot"></span>
        <div class="dots">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
    </div>
    <!-- ***** Preloader End ***** -->
    
    <div class="login section" id="login">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 align-self-center">
            <div class="section-heading">
              <h6>Bergabung Dengan Kami</h6>
              <h2>Daftar</h2>
              <p>Cukup hanya dengan mendaftar, anda sudah melakukan langkah kecil untuk mendukung Kesetaraan Gender, dengan mendaftar anda juga bisa mendapat keuntungan untuk bisa mengikuti acara-acara umum yang kami adakan.</p>
              <div class="special-offer">
                <span class="offer">gra<br /><em>tis</em></span>
                <h6>Daftar: <em>Sekarang</em></h6>
                <h4>Tidak Kami Pungut <em>Biaya</em></h4>
                <a href="regis.php"><i class="fa fa-angle-right"></i></a>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="login-content">
              <form id="login-form" action="login_process.php" method="post">
                <div class="row">
                  <h2></h2>
                  <div class="col-lg-12">
                    <input type="text" name="username" id="username" placeholder="Username" autocomplete="on" required />
                  </div>
                  <div class="col-lg-12">
                    <input type="password" name="password" id="password" placeholder="Password" required />
                  </div>
                  <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" value="true" name="rememberMe" id="rememberMe">
                    <label class="form-check-label" for="rememberMe">
                      Remember Me
                    </label>
                  </div>
                  <div class="col-lg-12">
                    <button type="submit" class="orange-button">Login</button>  
                  </div>
                  <?php
                  // Check if there's an error message in the URL
                  if (isset($_GET['error']) && $_GET['error'] == 1) {
                      echo '<div class="col-lg-12">';
                      echo '<p style="color: white;">Username or password is incorrect.</p>';
                      echo '</div>';
                  }
                  ?>
                  <div class="col-lg-12">
                    <a href="index.php"><button>Back to Homepage</button></a>
                  </div>
                  
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer>
      <div class="container">
        <div class="col-lg-12">
          <p>@2024 CAPSTONE Digital Product Team 4</p>
        </div>
      </div>
    </footer>

    <!-- Scripts -->
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/isotope.min.js"></script>
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/counter.js"></script>
    <script src="assets/js/custom.js"></script>
  </body>
</html>
