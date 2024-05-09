<?php
require_once "koneksi.php";

// Pesan kesalahan default
$error_message = "Terjadi kesalahan saat menghapus data.";

// Pastikan Anda memulai atau menghubungkan koneksi ke database di sini
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    // Ambil id dari parameter GET
    $id = $_GET['id'];

    // Persiapkan pernyataan hapus dengan prepared statement
    $query = "DELETE FROM events WHERE id = ?";
    $stmt = $conn->prepare($query);
    
    // Bind parameter
    $stmt->bind_param("i", $id);
    
    // Eksekusi pernyataan
    if ($stmt->execute()) {
        // Jika penghapusan berhasil, arahkan kembali ke halaman sebelumnya atau halaman utama
        header("Location: admin.php"); // Ganti halaman_sebelumnya.php dengan halaman yang sesuai
        exit();
    } else {
        // Jika terjadi kesalahan saat menghapus
        $error_message = "Gagal menghapus data: " . $stmt->error;
    }
} else {
    // Jika parameter id tidak ditemukan atau tidak valid
    $error_message = "Permintaan tidak valid.";
}

// Menampilkan pesan kesalahan
echo $error_message;

// Pastikan untuk menutup pernyataan dan koneksi setelah selesai
$stmt->close();
$conn->close();
?>
