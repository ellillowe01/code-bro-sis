<?php
session_start();
if($_SESSION['role'] != "penyedia"){
    header("location:loginpj.php?pesan=belum_login");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Penyedia Jasa</title>
</head>
<body>
    <h1>Halo, <?php echo $_SESSION['nama']; ?>!</h1>
    <p>Selamat datang di panel penyedia jasa ServConnect.</p>
    <hr>
    <ul>
        <li><a href="input_jasa.php">Tambah Jasa Baru (Tugas US4 kamu nanti)</a></li>
        <li><a href="../logout.php">Logout</a></li>
    </ul>
</body>
</html>