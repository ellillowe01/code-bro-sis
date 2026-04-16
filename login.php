<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - ServConnect</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; font-family: 'Poppins', sans-serif; }
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }
        .login-container h2 {
            margin-bottom: 10px;
            color: #333;
            font-weight: 600;
        }
        .login-container p {
            color: #777;
            font-size: 14px;
            margin-bottom: 30px;
        }
        .input-group {
            text-align: left;
            margin-bottom: 20px;
        }
        .input-group label {
            display: block;
            font-size: 14px;
            margin-bottom: 5px;
            color: #555;
        }
        .input-group input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            outline: none;
            transition: 0.3s;
        }
        .input-group input:focus {
            border-color: #667eea;
            box-shadow: 0 0 8px rgba(102, 126, 234, 0.2);
        }
        button {
            width: 100%;
            padding: 12px;
            background: #667eea;
            border: none;
            color: white;
            font-size: 16px;
            font-weight: 600;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
        }
        button:hover { background: #5a6fd6; }
        .footer-text {
            margin-top: 25px;
            font-size: 13px;
            color: #888;
        }
        .footer-text a {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
        }
        /* Alert Styling */
        .alert {
            padding: 10px;
            background-color: #f44336;
            color: white;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 13px;
        }
    </style>
</head>
<body>

<div class="login-container">
    <h2>ServeConnect</h2>
    <p>Solusi Jasa Terpercaya di Tangan Anda</p>

    <?php if(isset($_GET['pesan']) && $_GET['pesan'] == 'gagal'): ?>
        <div class="alert">Email atau Password salah!</div>
    <?php endif; ?>

    <form action="proses_login.php" method="POST">
        <div class="input-group">
            <label>Email</label>
            <input type="email" name="email" placeholder="contoh@gmail.com" required>
        </div>
        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password" placeholder="Masukkan password" required>
        </div>
        <button type="submit" name="login">Masuk ke Akun</button>
    </form>

    <div class="footer-text">
        Belum punya akun? <a href="registrasi.php">Daftar Sekarang</a>
    </div>
</div>

</body>
</html>