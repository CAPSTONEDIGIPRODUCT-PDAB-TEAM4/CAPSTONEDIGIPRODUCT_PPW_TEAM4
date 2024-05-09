<?php
// Pastikan form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sisipkan file koneksi
    require_once "koneksi.php";
    
    // Mendapatkan nilai-nilai dari form
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Escape username untuk mencegah SQL Injection
    $username = $conn->real_escape_string($username);
    
    // Query untuk memeriksa apakah username dan password cocok
    $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // Jika data ditemukan, user berhasil login
        // Set $_SESSION['sudah_login'] menjadi true
        $_SESSION['sudah_login'] = true;
        
        // Periksa apakah username yang login adalah "donitampan"
        if ($username === 'donitampan' && $password === '') {
            // Jika username adalah "donitampan", arahkan ke halaman admin.php
            header("Location: admin.php");
            exit(); // Pastikan tidak ada output lain sebelum header
        } else {
            // Jika bukan "donitampan", arahkan ke halaman dashboard.php
            header("Location: dashboard.php");
            exit(); // Pastikan tidak ada output lain sebelum header
        }
    } else {
        // Jika tidak ada data yang cocok, kembali ke halaman login dengan pesan kesalahan
        header("Location: login.php?error=1#login");
        exit(); // Pastikan tidak ada output lain sebelum header
    }
}
?>
