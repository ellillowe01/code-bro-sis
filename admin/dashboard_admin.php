<?php
session_start();

// CEK LOGIN
if (!isset($_SESSION['role'])) {
    header("location:../login.php");
    exit();
}

// CEK ADMIN
if ($_SESSION['role'] != 'admin') {
    echo "Akses ditolak!";
    exit();
}

$current_page = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - ServConnect</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --primary: #4f46e5;
            --bg: #f8fafc;
            --dark: #0f172a;
            --gray: #64748b;
        }

        /* RESET */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            display: flex;
            background: var(--bg);
        }

        /* SIDEBAR */
        .sidebar {
            width: 260px;
            height: 100vh;
            background: #fff;
            padding: 25px;
            border-right: 1px solid #e5e7eb;
            position: fixed;
        }

        .brand {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 40px;
            color: var(--dark);
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px;
            margin-bottom: 10px;
            border-radius: 10px;
            color: var(--gray);
            text-decoration: none;
            transition: 0.3s;
        }

        .nav-link:hover,
        .nav-link.active {
            background: #eef2ff;
            color: var(--primary);
        }

        /* MAIN */
        .main {
            margin-left: 260px;
            width: 100%;
            padding: 30px;
        }

        /* TOPBAR */
        .topbar {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
        }

        .topbar h1 {
            font-size: 22px;
        }

        .profile {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* CARD */
        .cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .card {
            background: white;
            padding: 20px;
            border-radius: 15px;
            border: 1px solid #e5e7eb;
        }

        .card h3 {
            font-size: 26px;
        }

        .card p {
            color: var(--gray);
        }

        /* TABLE */
        .table-box {
            margin-top: 30px;
            background: white;
            border-radius: 15px;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            text-align: left;
            padding: 12px;
        }

        th {
            color: var(--gray);
        }

        tr {
            border-bottom: 1px solid #eee;
        }
    </style>

</head>

<body>

    <!-- SIDEBAR -->
    <div class="sidebar">
        <div class="brand">
            <i class="fas fa-brain"></i> Admin Panel
        </div>

        <a href="dashboard.php" class="nav-link <?= ($current_page == 'dashboard.php') ? 'active' : '' ?>">
            <i class="fas fa-home"></i> Dashboard
        </a>

        <a href="kategori.php" class="nav-link">
            <i class="fas fa-th-large"></i> Kategori
        </a>

        <a href="user.php" class="nav-link">
            <i class="fas fa-users"></i> User
        </a>

        <a href="pesanan.php" class="nav-link">
            <i class="fas fa-receipt"></i> Pesanan
        </a>

        <a href="../logout.php" class="nav-link" style="color:red;">
            <i class="fas fa-sign-out-alt"></i> Logout
        </a>
    </div>

    <!-- MAIN -->
    <div class="main">

        <!-- TOPBAR -->
        <div class="topbar">
            <div>
                <h1>Dashboard Admin</h1>
                <p>Selamat datang,
                    <?= $_SESSION['nama']; ?>
                </p>
            </div>

            <div class="profile">
                <img src="https://ui-avatars.com/api/?name=<?= $_SESSION['nama']; ?>&background=4f46e5&color=fff"
                    width="40" style="border-radius:10px;">
            </div>
        </div>

        <!-- CARDS -->
        <div class="cards">
            <div class="card">
                <h3>120</h3>
                <p>Total User</p>
            </div>

            <div class="card">
                <h3>45</h3>
                <p>Total Jasa</p>
            </div>

            <div class="card">
                <h3>89</h3>
                <p>Total Pesanan</p>
            </div>
        </div>

        <!-- TABLE -->
        <div class="table-box">
            <h3>Data User Terbaru</h3>
            <br>

            <table>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                </tr>

                <tr>
                    <td>Ahmad</td>
                    <td>ahmad@email.com</td>
                    <td>User</td>
                </tr>

                <tr>
                    <td>Budi</td>
                    <td>budi@email.com</td>
                    <td>Admin</td>
                </tr>

            </table>
        </div>

    </div>

</body>

</html>