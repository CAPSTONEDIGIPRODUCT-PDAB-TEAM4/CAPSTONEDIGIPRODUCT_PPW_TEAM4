<?php
session_start();

// cek 'ingat saya' dulu
// kalau ingat, tambahkan sudah_login di Session
if (isset($_COOKIE['ingat_saya'])) {
  $_SESSION['sudah_login'] = true;
}

// cek session login
if (!isset($_SESSION['sudah_login'])) {
  header('Location: login.php');
  exit;
}

require_once "koneksi.php";

// Query untuk mengambil data tiket dari database
$query = "SELECT * FROM events";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet" />

    <title>Dashboard Admin</title>

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

    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <nav class="main-nav">
              <!-- ***** Logo Start ***** -->
              <a href="admin.php" class="logo">
                <h1>setara</h1>
              </a>
              <!-- ***** Logo End ***** -->

              <!-- ***** Menu Start ***** -->
              <ul class="nav">
                <li><a href="admin.php">Manage Events</a></li>
                <li><a href="tambah.php">Add Events</a></li>
                <li><a href="edit.php" class="active">Update Events</a></li>
                <li><a href="index.php">Logout</a></li>
              </ul>
              <a class="menu-trigger">
                <span>Menu</span>
              </a>
              <!-- ***** Menu End ***** -->
            </nav>
          </div>
        </div>
      </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <div class="main-banner" id="top">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
          </div>
        </div>
      </div>
    </div>

    <div class="section events" id="events">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-heading">
                        <h6>Manage</h6>
                        <h2>Upcoming Events</h2>
                    </div>
                </div>
                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                    <div class="col-lg-12 col-md-6">
                        <div class="item">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="image">
                                        <?php echo '<img src="/CAPSTONE/uploads/' . basename($row['image']) . '" alt="Event Image" />'; ?>
                                    </div>

                                </div>
                                <div class="col-lg-9">
                                    <ul>
                                        <li>
                                            <span class="category"><?php echo $row['location']; ?></span>
                                            <h4><?php echo $row['name']; ?></h4>
                                        </li>
                                        <li>
                                            <span>Date:</span>
                                            <h6><?php echo $row['date']; ?></h6>
                                        </li>
                                        <li>
                                            <span>Start:</span>
                                            <h6><?php echo $row['start_time']; ?></h6>
                                        </li>
                                        <li>
                                            <span>Price:</span>
                                            <h6><?php echo $row['price']; ?></h6>
                                        </li>
                                    </ul>
                                    <a href="edit_proses.php?id=<?php echo $row['id']; ?>"><i class="fa fa-pencil"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>

    <div class="team section" id="team">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-6 offset-lg-2">
            <div class="team-member">
              <div class="main-content">
                <img src="assets/images/doni.jpg" alt="" />
                <span class="category">Team Member</span>
                <h4>Doni Arya Rachmadi</h4>
                <ul class="social-icons">
                  <li>
                    <a href="https://www.instagram.com/doniaryar/" target="_blank"><i class="fab fa-instagram"></i></a>
                  </li>
                  <li>
                    <a href="https://github.com/donigantengabis" target="_blank"><i class="fab fa-github"></i></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="team-member">
              <div class="main-content">
                <img src="assets/images/remanda.jpg" alt="" />
                <span class="category">Team Leader</span>
                <h4>Remanda Dheva</h4>
                <ul class="social-icons">
                  <li>
                    <a href="https://www.instagram.com/remnda3174_?igsh=MWlxZTFmNG1jeTI3Nw==" target="_blank"><i class="fab fa-instagram"></i></a>
                  </li>
                  <li>
                    <a href="https://github.com/RemandaDheva" target="_blank"><i class="fab fa-github"></i></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="team-member">
              <div class="main-content">
                <img src="assets/images/helen.jpg" alt="" />
                <span class="category">Team Member</span>
                <h4>Helen Amalia Dengen</h4>
                <ul class="social-icons">
                  <li>
                    <a href="https://www.instagram.com/hlndengen?igsh=bTYwOHBkM21mcHIw" target="_blank"><i class="fab fa-instagram"></i></a>
                  </li>
                  <li>
                    <a href="https://github.com/helenanaa" target="_blank"><i class="fab fa-github"></i></a>
                  </li>
                </ul>
              </div>
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
