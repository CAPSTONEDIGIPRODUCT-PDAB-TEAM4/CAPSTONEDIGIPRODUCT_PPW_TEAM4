<?php
// Mulai sesi
session_start();
// cek 'ingat saya' dulu
// kalau ingat, tambahkan sudah_login di Session
if (isset($_COOKIE['ingat_saya'])) {
  $_SESSION['sudah_login'] = true;
}

// cek session login
if (!isset($_SESSION['sudah_login'])) {
  header('Location: login.php');
  exit();
}


// Periksa apakah parameter 'action' bernilai 'logout'
if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    // Hapus semua data sesi
    session_destroy();

    // Redirect ke halaman index.php
    header("Location: index.php");
    exit();
}

// Sisipkan file koneksi
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

    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <nav class="main-nav">
              <!-- ***** Logo Start ***** -->
              <a href="dashboard.php" class="logo">
                <h1>setara</h1>
              </a>
              <!-- ***** Logo End ***** -->

              <!-- ***** Menu Start ***** -->
              <ul class="nav">
                <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                <li class="scroll-to-section"><a href="#facts">Facts</a></li>
                <li class="scroll-to-section"><a href="#faq">FAQ</a></li>
                <li class="scroll-to-section"><a href="#aktivis">Activist</a></li>
                <li class="scroll-to-section"><a href="#events">Events</a></li>
                <li><a href="dashboard.php?action=logout">Sign Out</a></li>
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
          <div class="col-lg-12">
            <div class="owl-carousel owl-banner">
              <div class="item item-1">
                <div class="header-text">
                  <span class="category">Penjelasan</span>
                  <h2>Apa Itu Gender Equality?</h2>
                  <p>
                    Gender equality, atau kesetaraan gender, adalah prinsip yang mengadvokasi hak yang sama, kesempatan, dan perlakuan yang adil bagi semua individu, tanpa memandang jenis kelamin mereka. Ini melibatkan penghapusan
                    diskriminasi berbasis gender dalam segala bentuknya dan mengakui nilai serta kontribusi setiap individu dalam masyarakat. Kesetaraan gender tidak hanya merupakan tujuan moral yang penting, tetapi juga kunci untuk
                    menciptakan masyarakat yang lebih inklusif, adil, dan makmur bagi semua.
                  </p>
                  <div class="buttons">
                    <div class="main-button">
                      <a href="https://en.wikipedia.org/wiki/Gender_equality" target="_blank">Wikipedia</a>
                    </div>
                    <div class="icon-button">
                      <a href="https://youtu.be/-hc0kZh6CnM?si=nVpdbpqHUr6D8Raw" target="_blank"><i class="fa fa-play"></i> Video Singkat</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item item-2">
                <div class="header-text">
                  <span class="category">Visi dan Misi</span>
                  <h2>Apa Visi dan Misi Kami?</h2>
                  <h3 style="color: white">Visi</h3>
                  <p>Menciptakan dunia di mana setiap individu memiliki kesempatan yang sama untuk berkembang dan berkontribusi tanpa adanya batasan atau diskriminasi berbasis gender.</p>
                  <h3 style="color: white">Misi</h3>
                  <p>Memperjuangkan kesetaraan gender melalui pendidikan, advokasi, aksi nyata, dan pembangunan kesadaran untuk menciptakan masyarakat yang inklusif, adil, dan berkelanjutan bagi semua.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="services section" id="facts">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-6">
            <div class="service-item">
              <div class="icon">
                <img src="assets/images/service-01.png" alt="short courses" />
              </div>
              <div class="main-content">
                <h4>Facts</h4>
                <p>Setiap hari, 800 wanita meninggal karena komplikasi kehamilan atau persalinan yang sebenarnya bisa dicegah</p>
                <div class="main-button">
                  <a href="https://medium.com/@ClintonFdn/8-facts-about-gender-equality-you-need-to-know-now-faa7f9a45a04" target="_blank">Read More</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="service-item">
              <div class="icon">
                <img src="assets/images/service-01.png" alt="web experts" />
              </div>
              <div class="main-content">
                <h4>Facts</h4>
                <p>Perempuan menghabiskan hingga 5 jam lebih banyak untuk pekerjaan rumah tangga tidak berbayar dibandingkan laki-laki setiap harinya</p>
                <div class="main-button">
                  <a href="https://medium.com/@ClintonFdn/8-facts-about-gender-equality-you-need-to-know-now-faa7f9a45a04" target="_blank">Read More</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="service-item">
              <div class="icon">
                <img src="assets/images/service-01.png" alt="online degrees" />
              </div>
              <div class="main-content">
                <h4>Facts</h4>
                <p>Perempuan memperoleh sebagian besar gelar sarjana, namun hanya sebagian kecil dari gelar ilmu komputer</p>
                <div class="main-button">
                  <a href="https://medium.com/@ClintonFdn/8-facts-about-gender-equality-you-need-to-know-now-faa7f9a45a04" target="_blank">Read More</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="service-item">
              <div class="icon">
                <img src="assets/images/service-01.png" alt="online degrees" />
              </div>
              <div class="main-content">
                <h4>Facts</h4>
                <p>Satu dari empat anak perempuan di seluruh dunia menikah sebelum ulang tahunnya yang ke-18</p>
                <div class="main-button">
                  <a href="https://medium.com/@ClintonFdn/8-facts-about-gender-equality-you-need-to-know-now-faa7f9a45a04" target="_blank">Read More</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="service-item">
              <div class="icon">
                <img src="assets/images/service-01.png" alt="online degrees" />
              </div>
              <div class="main-content">
                <h4>Facts</h4>
                <p>200 juta lebih sedikit perempuan dibandingkan laki-laki yang memiliki akses ke Internet di seluruh dunia</p>
                <div class="main-button">
                  <a href="https://medium.com/@ClintonFdn/8-facts-about-gender-equality-you-need-to-know-now-faa7f9a45a04" target="_blank">Read More</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="service-item">
              <div class="icon">
                <img src="assets/images/service-01.png" alt="online degrees" />
              </div>
              <div class="main-content">
                <h4>Facts</h4>
                <p>Perempuan di sebagian besar negara menghadapi hambatan hukum yang membatasi peluang ekonomi mereka</p>
                <div class="main-button">
                  <a href="https://medium.com/@ClintonFdn/8-facts-about-gender-equality-you-need-to-know-now-faa7f9a45a04" target="_blank">Read More</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="section about-us" id="faq">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 offset-lg-1">
            <div class="accordion" id="accordionExample">
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Apakah kesetaraan gender sudah tercapai di seluruh dunia?</button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    Meskipun ada kemajuan yang signifikan dalam memperjuangkan kesetaraan gender, masih ada banyak tantangan yang harus diatasi di seluruh dunia. Kesetaraan gender <strong>masih belum tercapai sepenuhnya</strong> dalam hal
                    pendidikan, pekerjaan, akses ke layanan kesehatan, serta representasi politik dan kepemimpinan.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Mengapa kesetaraan gender penting?</button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    Kesetaraan gender penting karena <strong>menciptakan masyarakat yang lebih inklusif, adil, dan berkelanjutan bagi semua individu</strong>. Ini juga merupakan kunci untuk mencapai kemajuan ekonomi, sosial, dan politik
                    yang seimbang. Tanpa kesetaraan gender, potensi penuh setiap individu dan masyarakat secara keseluruhan tidak dapat direalisasikan.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Bagaimana kita dapat berkontribusi dalam mempromosikan kesetaraan gender?
                  </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    Ada banyak cara kita dapat berkontribusi dalam mempromosikan kesetaraan gender, mulai dari <strong>mendukung organisasi</strong> dan kampanye yang memperjuangkan kesetaraan gender, hingga
                    <strong>memerangi stereotip</strong> gender dan mendukung pemberdayaan perempuan di semua bidang kehidupan.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingFour">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    Apa yang dapat dilakukan untuk mengatasi diskriminasi gender di tempat kerja?
                  </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    Untuk mengatasi diskriminasi gender di tempat kerja, penting untuk menerapkan kebijakan yang adil dan transparan, memberikan pelatihan kesadaran gender kepada karyawan, serta memastikan bahwa proses perekrutan, promosi,
                    dan penggajian dilakukan secara objektif dan tanpa prasangka gender.
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-5 align-self-center">
            <div class="section-heading">
              <h6>FAQ</h6>
              <h2>Pentingnya Gender Equality di Indonesia</h2>
              <p>Kesetaraan gender di Indonesia sangat penting dibahas mengingat begitu banyaknya persoalan perempuan di Indonesia yang masih belum selesai.</p>
              <div class="main-button">
                <a href="https://dp3acskb.babelprov.go.id/content/mengapa-kesetaraan-gender-penting" target="_blank">Lebih Detail ></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="section testimonials" id="aktivis">
      <div class="container">
        <div class="row">
          <div class="col-lg-7">
            <div class="owl-carousel owl-testimonials">
              <div class="item">
                <p>
                  “Saya membujuk mereka melalui hal itu,” kata Sara. Saya memberi tahu mereka, 'Saya tahu apa yang Anda rasakan, karena saya sudah melaluinya. Saya menjalaninya, dan saya selamat', dan mereka merasa lebih baik, karena saya
                  adalah pengungsi sama seperti mereka.”
                </p>
                <div class="author">
                  <img src="assets/images/saramardini.jpeg" alt="" />
                  <span class="category">Women Activist</span>
                  <h4>Sara Mardini</h4>
                </div>
              </div>
              <div class="item">
                <p>“Saya harus menjadi orang yang bisa dipahami oleh anak-anak di kamp pengungsi. Hal terbesar yang bisa saya berikan kepada mereka adalah harapan,”</p>
                <div class="author">
                  <img src="assets/images/halimaaden.jpeg" alt="" />
                  <span class="category">Women Activist</span>
                  <h4>Halima Aden</h4>
                </div>
              </div>
              <div class="item">
                <p>
                  “Saya ingin menjadi gadis terakhir di dunia yang memiliki cerita seperti saya. Kita tidak hanya harus membayangkan masa depan yang lebih baik bagi perempuan, anak-anak, dan kelompok minoritas yang teraniaya; kita harus
                  bekerja secara konsisten untuk mewujudkannya—mengutamakan kemanusiaan, bukan perang.”
                </p>
                <div class="author">
                  <img src="assets/images/nadiamurad.png" alt="" />
                  <span class="category">Women Activist</span>
                  <h4>Nadia Murad</h4>
                </div>
              </div>
              <div class="item">
                <p>“Saya bertekad untuk mewujudkan kesetaraan gender di Bangladesh. Saya percaya pada kekuatan perempuan dan anak perempuan untuk memperjuangkan hak-hak kami. Kita akan berhasil."</p>
                <div class="author">
                  <img src="assets/images/rimasultanarimu.jpg" alt="" />
                  <span class="category">Women Activist</span>
                  <h4>Rima Sultana Rimu</h4>
                </div>
              </div>
              <div class="item">
                <p>
                  “Saya ingin dunia tetap bersama Afghanistan dan seluruh dunia yang berada dalam bahaya,” kata Zahra. “Seharusnya tidak ada perbedaan antara pengungsi dan perlakuan terhadap orang-orang dari berbagai negara. Saya ingin
                  kesetaraan bagi semua orang, baik mereka yang berasal dari Ukraina atau Afghanistan atau di mana pun, mereka harus memiliki hak yang sama.”
                </p>
                <div class="author">
                  <img src="assets/images/zahra.jpg" alt="" />
                  <span class="category">Women Activist</span>
                  <h4>Zahra</h4>
                </div>
              </div>
              <div class="item">
                <p>
                  “Anda, sebagai penyintas, dapat memberikan bantuan kepada seseorang yang saat ini menjadi korban,” kata Omaira tentang apa yang ia pelajari dari menjadi pekerja pendukung. ”Anda harus mengatakan 'Anda bukan lagi korban,
                  Anda akan menjadi penyintas.'”
                </p>
                <div class="author">
                  <img src="assets/images/omaira.jpg" alt="" />
                  <span class="category">Women Activist</span>
                  <h4>Omaira</h4>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-5 align-self-center">
            <div class="section-heading">
              <h6>Activist</h6>
              <h2>What They Say?</h2>
              <p>Beberapa aktivis dan pemimpin perempuan menjadikan dunia tempat yang lebih baik dan lebih aman bagi semua orang.</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="section events" id="events">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-heading">
                        <h6>Schedule</h6>
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
                                    <!-- Ubah link WhatsApp agar sesuai dengan data acara dan username pengguna -->
                                    <?php
                                    $event_name = urlencode($row['name']);
                                    $message = "Halo, saya ingin mendaftar event $event_name. Saya adalah pengguna dengan (username_anda).";
                                    $whatsapp_link = "https://wa.me/62895602790842?text=" . urlencode($message);
                                    ?>
                                    <a href="<?php echo $whatsapp_link; ?>" target="_blank">Join <i class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>



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
