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

// Fungsi untuk menampilkan data kontak
function loadContacts($conn) {
    $sql = "SELECT * FROM contact";
    $result = $conn->query($sql);
    $contact = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $contact[] = $row;
        }
    }
    return $contacts;
}

// Fungsi untuk menghapus kontak
if (isset($_POST['delete_contact'])) {
    $id = $_POST['delete_contact'];
    $sql = "DELETE FROM contact WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Fungsi untuk memperbarui kontak
if (isset($_POST['edit_contact'])) {
    // Ambil data dari form edit
    $id = $_POST['id'];
    $phone = $_POST['phone'];
    $owner = $_POST['owner'];
    $email = $_POST['email'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $jns_kelamin = $_POST['jns_kelamin'];

    $sql = "UPDATE contact SET phone='$phone', owner='$owner', email='$email', tgl_lahir='$tgl_lahir', jns_kelamin='$jns_kelamin' WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Panggil fungsi untuk memuat data kontak saat halaman dimuat
$contact = loadContacts($conn);

// Tutup koneksi
$conn->close();
?>
