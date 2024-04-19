<?php
// Lakukan koneksi ke database
$host = 'localhost';
$username = 'root';
$password = ''; // Ganti dengan password database Anda
$dbname = "contact app"; // Ganti dengan nama database Anda

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mendapatkan nilai input username dan password dari form
$username = $_POST['username'];
$password = $_POST['password'];

// Melakukan query untuk memeriksa apakah username dan password cocok
$sql = "SELECT * FROM akun WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Jika username dan password cocok, arahkan ke halaman dashboard
    header("Location: dashboard.html");
} else {
    // Jika username dan password tidak cocok, tampilkan pesan kesalahan
    echo "<script>alert('Username atau password salah. Silakan coba lagi.');</script>";
}

$conn->close();
?>
