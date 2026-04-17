<?php
session_start();
include '../config/koneksi.php';

$data = mysqli_query($conn, "SELECT * FROM pesanan");
?>

<link rel="stylesheet" href="../assets/css/style.css">

<div class="sidebar">
    <h3>Admin Panel</h3>
    <a href="dashboard.php" class="nav-link">Dashboard</a>
    <a href="kategori.php" class="nav-link">Kategori</a>
    <a href="user.php" class="nav-link">User</a>
    <a href="pesanan.php" class="nav-link active">Pesanan</a>
</div>

<div class="main">
    <div class="card">
        <h2>Data Pesanan</h2>

        <table width="100%" cellpadding="10">
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Jasa</th>
                <th>Status</th>
            </tr>

            <?php while ($row = mysqli_fetch_assoc($data)) { ?>
                <tr>
                    <td>
                        <?= $row['id'] ?>
                    </td>
                    <td>
                        <?= $row['user_id'] ?>
                    </td>
                    <td>
                        <?= $row['jasa_id'] ?>
                    </td>
                    <td>
                        <?= $row['status'] ?>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>