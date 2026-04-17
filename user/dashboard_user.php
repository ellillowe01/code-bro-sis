<?php
session_start();
if($_SESSION['role'] != "user"){
    header("location:../penyedia_jasa/loginpj.php?pesan=belum_login");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard User</title>
</head>
<body>
    <h1>Halaman User / Pelanggan</h1>
    <p>Halo **<?php echo $_SESSION['nama']; ?>**, Anda login sebagai User.</p>
    <a href="../logout.php">Logout</a>
</body>
</html>