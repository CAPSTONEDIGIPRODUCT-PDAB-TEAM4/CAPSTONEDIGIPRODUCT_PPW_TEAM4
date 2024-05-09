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

// Pesan kesalahan default
$error_message = "";

// Tangani unggahan file jika formulir dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Tentukan direktori target untuk menyimpan file yang diunggah
    $target_dir = "uploads/";

    // Tentukan path lengkap file yang akan diunggah
    $target_file = $target_dir . basename($_FILES["image"]["name"]);

    // Coba pindahkan file yang diunggah ke direktori target
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        // File berhasil diunggah, lanjutkan dengan proses lainnya
        // Misalnya, Anda bisa menyimpan data ke database
        $name = $_POST['name'];
        $location = $_POST['location'];
        $date = $_POST['date'];
        $start_time = $_POST['start_time'];
        $price = "FREE"; // Set harga menjadi FREE

        // Query untuk menyimpan data event ke database
        $query = "INSERT INTO events (name, location, date, start_time, price, image) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssssss", $name, $location, $date, $start_time, $price, $target_file);

        if ($stmt->execute()) {
            // Data berhasil disimpan
            $error_message = "Event berhasil ditambahkan!";
        } else {
            // Jika terjadi kesalahan saat menyimpan data ke database
            $error_message = "Maaf, terjadi kesalahan saat menyimpan data event: " . $stmt->error;
        }
        $stmt->close();
    } else {
        // Jika terjadi kesalahan saat mengunggah file, tampilkan pesan kesalahan
        $error_message = "Maaf, terjadi kesalahan saat mengunggah file gambar.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Tambah Event</title>
    <link rel="stylesheet" href="admin.css" />
</head>
<body>
    <div class="container">
        <header>Tambah Event Baru</header>
        <?php if ($error_message != ""): ?>
            <p style="color: red;"><?php echo $error_message; ?></p>
        <?php endif; ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data" class="event-form">
            <div class="form-group">
                <label for="name">Event Name</label>
                <input type="text" id="name" name="name" placeholder="Enter event name" required />
            </div>
            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" id="location" name="location" placeholder="Enter event location" required />
            </div>
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" id="date" name="date" required />
            </div>
            <div class="form-group">
                <label for="start_time">Start Time</label>
                <input type="time" id="start_time" name="start_time" required />
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" id="price" name="price" placeholder="FREE" value="FREE" readonly />
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" id="image" name="image" required />
            </div>
            <button type="submit">Add Event</button>
            <br>
            <p style="text-align: center;"><a href="admin.php">Back To Dashboard</a></p>
        </form>
    </div>
</body>
</html>
          