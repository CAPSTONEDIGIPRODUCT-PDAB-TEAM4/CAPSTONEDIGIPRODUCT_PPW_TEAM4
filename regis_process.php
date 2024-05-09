<?php
// Pastikan form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Sisipkan file koneksi
    require_once "koneksi.php";
    
    // Mendapatkan nilai-nilai dari form
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone_number = $_POST['phone_number'];
    $birth_date = $_POST['birth_date'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    
    // Cek apakah nomor telepon sudah ada di database
    $sql_check_phone = "SELECT * FROM user WHERE phone_number='$phone_number'";
    $result_check_phone = $conn->query($sql_check_phone);
    if ($result_check_phone->num_rows > 0) {
        header("Location: regis.php?error=Nomor telepon sudah terdaftar.");
        exit();
    }
    
    // Cek apakah email sudah ada di database
    $sql_check_email = "SELECT * FROM user WHERE email='$email'";
    $result_check_email = $conn->query($sql_check_email);
    if ($result_check_email->num_rows > 0) {
        header("Location: regis.php?error=Email sudah terdaftar.");
        exit();
    }
    
    // Cek apakah username sudah ada di database
    $sql_check_username = "SELECT * FROM user WHERE username='$username'";
    $result_check_username = $conn->query($sql_check_username);
    if ($result_check_username->num_rows > 0) {
        header("Location: regis.php?error=Username sudah terdaftar.");
        exit();
    }
    
    // Query untuk memasukkan data ke dalam tabel 'user'
    $sql = "INSERT INTO user (full_name, username, email, password, phone_number, birth_date, gender, address)
            VALUES ('$full_name', '$username', '$email', '$password', '$phone_number', '$birth_date', '$gender', '$address')";
    
    if ($conn->query($sql) === TRUE) {
        // Registrasi berhasil, arahkan kembali ke halaman index.php
        header("Location: index.php");
        exit(); // Pastikan tidak ada output lain sebelum header
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    // Menutup koneksi
    $conn->close();
}
?>
