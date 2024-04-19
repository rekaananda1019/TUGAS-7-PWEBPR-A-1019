<?php
// Lakukan koneksi ke database
$host = 'localhost';
$username = 'root';
$password = ''; // Ganti dengan password database Anda
$dbname = "contact app"; // Ganti dengan nama database Anda

// Membuat koneksi
$conn = new mysqli($host, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Tangkap data yang dikirimkan dari formulir HTML
$name = $_POST['reg-name'];
$email = $_POST['reg-email'];
$username = $_POST['reg-username'];
$tgl_lahir = $_POST['reg-tgl_lahir'];
$jns_kelamin = $_POST['reg-jns_kelamin'];
$password = $_POST['reg-password'];

// Query untuk menyimpan data ke database
$query = "INSERT INTO akun (name, email, username, tgl_lahir, jns_kelamin, password) 
VALUES ('$name', '$email', '$username', '$tgl_lahir', '$jns_kelamin', '$password')";

// Eksekusi query
if (mysqli_query($koneksi, $query)) {
    // Jika berhasil disimpan, arahkan pengguna ke dashboard
    header("Location: dashboard.php");
    exit();
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
}

// Tutup koneksi database
mysqli_close($koneksi);
?>
