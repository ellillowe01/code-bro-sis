<?php
session_start();
include '../config/koneksi.php';

$data = mysqli_query($conn, "SELECT * FROM users");
?>

<link rel="stylesheet" href="../assets/css/style.css">

<div class="sidebar">
    <h3>Admin Panel</h3>
    <a href="dashboard.php" class="nav-link">Dashboard</a>
    <a href="kategori.php" class="nav-link">Kategori</a>
    <a href="user.php" class="nav-link active">User</a>
    <a href="pesanan.php" class="nav-link">Pesanan</a>
</div>

<div class="main">
    <div class="card">
        <h2>Data User</h2>

        <table width="100%" cellpadding="10">
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
            </tr>

            <?php while ($row = mysqli_fetch_assoc($data)) { ?>
                <tr>
                    <td>
                        <?= $row['name'] ?>
                    </td>
                    <td>
                        <?= $row['email'] ?>
                    </td>
                    <td>
                        <?= $row['role'] ?>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>