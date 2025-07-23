<?php
$host = "localhost";
$user = "username";
$pass = "password";
$db   = "psbi_lamaran";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
  die("Koneksi gagal: " . $conn->connect_error);
}

$nama = $_POST['nama'];
$email = $_POST['email'];
$telepon = $_POST['telepon'];
$pesan = $_POST['pesan'];

$targetDir = "uploads/";
$cvName = basename($_FILES["cv"]["name"]);
$targetFile = $targetDir . $cvName;
move_uploaded_file($_FILES["cv"]["tmp_name"], $targetFile);

$sql = "INSERT INTO lamaran (nama, email, telepon, pesan, file_cv) VALUES ('$nama', '$email', '$telepon', '$pesan', '$cvName')";

if ($conn->query($sql) === TRUE) {
  echo "Lamaran berhasil dikirim.";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>
