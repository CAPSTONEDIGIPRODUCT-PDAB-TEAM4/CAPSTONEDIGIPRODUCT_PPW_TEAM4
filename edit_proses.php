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
  
// Sisipkan file koneksi
require_once "koneksi.php";

// Pastikan ID event yang akan diupdate telah dikirim melalui URL
if(isset($_GET['id'])) {
    $event_id = $_GET['id'];

    // Ambil data event dari database berdasarkan ID
    $query = "SELECT * FROM events WHERE id = $event_id";
    $result = mysqli_query($conn, $query);

    // Periksa apakah event dengan ID tersebut ditemukan
    if(mysqli_num_rows($result) == 1) {
        $event = mysqli_fetch_assoc($result);

        // Tangani pembaruan data event jika form dikirim
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST['name'];
            $location = $_POST['location'];
            $date = $_POST['date'];
            $start_time = $_POST['start_time'];
            $price = $_POST['price'];
            
            // Perbarui nama file gambar jika diunggah
            if(isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $image = $_FILES['image']['name'];
                $temp_file = $_FILES['image']['tmp_name'];
                move_uploaded_file($temp_file, 'images/' . $image);
            } else {
                // Jika tidak ada gambar yang diunggah, gunakan nama gambar yang lama
                $image = $event['image'];
            }

            // Contoh query pembaruan data event
            $update_query = "UPDATE events SET name='$name', location='$location', date='$date', start_time='$start_time', price='FREE', image='$image' WHERE id=$event_id";
            if(mysqli_query($conn, $update_query)) {
                // Redirect ke halaman admin setelah pembaruan berhasil
                header("Location: admin.php");
                exit();
            } else {
                // Jika gagal, tampilkan pesan kesalahan
                echo "Failed to update event.";
            }
        }
    } else {
        // Jika event tidak ditemukan, redirect ke halaman admin
        header("Location: admin.php");
        exit();
    }
} else {
    // Jika parameter ID tidak ada, redirect ke halaman admin
    header("Location: admin.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Event</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="admin.css" />
</head>
<body>
    <section class="container">
        <header>Edit Event</header>
        
        <!-- Form untuk mengupdate event -->
        <form action="" class="event-form" method="POST" enctype="multipart/form-data">
            <!-- Gunakan input hidden untuk menyimpan ID event yang akan diupdate -->
            <input type="hidden" name="event_id" value="<?php echo $event['id']; ?>">
            <div class="form-group">
                <label for="name">Event Name</label>
                <input type="text" id="name" name="name" placeholder="Enter event name" value="<?php echo $event['name']; ?>" required />
            </div>
            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" id="location" name="location" placeholder="Enter event location" value="<?php echo $event['location']; ?>" required />
            </div>
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" id="date" name="date" value="<?php echo $event['date']; ?>" required />
            </div>
            <div class="form-group">
                <label for="start_time">Start Time</label>
                <input type="time" id="start_time" name="start_time" value="<?php echo $event['start_time']; ?>" required />
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" id="image" name="image" required />
            </div>
            <button type="submit">Update Event</button>
            <br>
            <p style="text-align: center;"><a href="admin.php">Back To Dashboard</a></p>
        </form>
    </section>

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
