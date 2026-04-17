<?php
session_start();
include '../config/koneksi.php';

if ($_SESSION['role'] != 'admin') {
    die("Akses ditolak");
}

$data = mysqli_query($conn, "SELECT * FROM kategori");
?>

<link rel="stylesheet" href="../assets/css/style.css">

<div class="sidebar">
    <h3>Admin Panel</h3>
    <a href="dashboard.php" class="nav-link">Dashboard</a>
    <a href="kategori.php" class="nav-link active">Kategori</a>
    <a href="user.php" class="nav-link">User</a>
    <a href="pesanan.php" class="nav-link">Pesanan</a>
</div>

<div class="main">
    <div class="card">
        <h2>Data Kategori</h2>
        <br>
        <a href="tambah_kategori.php" class="btn">+ Tambah</a>

        <table width="100%" border="0" cellpadding="10">
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
            </tr>

            <?php $no = 1;
            while ($row = mysqli_fetch_assoc($data)) { ?>
                <tr>
                    <td>
                        <?= $no++ ?>
                    </td>
                    <td>
                        <?= $row['nama_kategori'] ?>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>