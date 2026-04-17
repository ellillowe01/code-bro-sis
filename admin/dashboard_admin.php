<?php
session_start();
if(!isset($_SESSION['role'])){
    header("location:../login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - ServConnect AI</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #6366f1;
            --primary-grad: linear-gradient(135deg, #6366f1 0%, #a855f7 100%);
            --bg-light: #f9fafb;
            --text-dark: #111827;
            --text-gray: #6b7280;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Plus Jakarta Sans', sans-serif; }
        body { background-color: var(--bg-light); color: var(--text-dark); display: flex; }

        /* Sidebar Modern */
        .sidebar {
            width: 280px;
            height: 100vh;
            background: white;
            border-right: 1px solid #f3f4f6;
            padding: 30px;
            position: fixed;
        }
        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 20px;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 40px;
        }
        .brand i { color: var(--primary); }
        
        .nav-menu { list-style: none; }
        .nav-item { margin-bottom: 8px; }
        .nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px;
            color: var(--text-gray);
            text-decoration: none;
            border-radius: 12px;
            font-weight: 600;
            transition: 0.3s;
        }
        .nav-link:hover, .nav-link.active {
            background: #f5f3ff;
            color: var(--primary);
        }

        /* Main Area */
        .main-content { margin-left: 280px; width: 100%; padding: 40px; }
        
        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
        }
        .header-title h1 { font-size: 24px; font-weight: 700; }
        .header-title p { color: var(--text-gray); font-size: 14px; }

        /* AI Floating Search Bar (Mirip Referensi) */
        .ai-search {
            background: white;
            padding: 15px 25px;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 40px;
            border: 1px solid #f3f4f6;
        }
        .ai-search input { border: none; outline: none; flex: 1; font-size: 15px; }
        .btn-ai {
            background: var(--primary-grad);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 12px;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
        }
        .stat-card {
            background: white;
            padding: 24px;
            border-radius: 24px;
            border: 1px solid #f3f4f6;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.02);
        }
        .stat-card .icon {
            width: 48px;
            height: 48px;
            border-radius: 14px;
            background: #f5f3ff;
            color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 16px;
        }
        .stat-card h3 { font-size: 28px; font-weight: 700; margin-bottom: 4px; }
        .stat-card p { color: var(--text-gray); font-size: 14px; font-weight: 600; }
    </style>
</head>
<body>

    <aside class="sidebar">
        <div class="brand">
            <i class="fas fa-brain"></i>
            <span>ServConnect AI</span>
        </div>
        <ul class="nav-menu">
            <li class="nav-item"><a href="#" class="nav-link active"><i class="fas fa-home"></i> Beranda</a></li>
            <li class="nav-item"><a href="#" class="nav-link"><i class="fas fa-th-large"></i> Kategori Jasa</a></li>
            <li class="nav-item"><a href="#" class="nav-link"><i class="fas fa-history"></i> Riwayat Pesanan</a></li>
            <li class="nav-item" style="margin-top: 40px;">
                <a href="../logout.php" class="nav-link" style="color: #ef4444;"><i class="fas fa-sign-out-alt"></i> Keluar</a>
            </li>
        </ul>
    </aside>

    <main class="main-content">
        <header class="top-bar">
            <div class="header-title">
                <h1>Halo, <?php echo $_SESSION['nama']; ?>!</h1>
                <p>Akses fitur cerdas ServConnect sesuai role Anda (<?php echo $_SESSION['role']; ?>).</p>
            </div>
            <img src="https://ui-avatars.com/api/?name=<?php echo $_SESSION['nama']; ?>&background=6366f1&color=fff" style="width: 48px; border-radius: 16px;">
        </header>

        <div class="ai-search">
            <i class="fas fa-sparkles" style="color: var(--primary);"></i>
            <input type="text" placeholder="Tanyakan sesuatu pada AI ServConnect...">
            <button class="btn-ai"><i class="fas fa-search"></i> Cari Cerdas</button>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="icon"><i class="fas fa-briefcase"></i></div>
                <h3>12</h3>
                <p>Jasa Aktif</p>
            </div>
            <div class="stat-card">
                <div class="icon"><i class="fas fa-user-check"></i></div>
                <h3>256</h3>
                <p>Penyedia Talenta</p>
            </div>
            <div class="stat-card">
                <div class="icon"><i class="fas fa-star" style="color: #f59e0b;"></i></div>
                <h3>4.8</h3>
                <p>Rating Rata-rata</p>
            </div>
        </div>
    </main>

</body>
</html>