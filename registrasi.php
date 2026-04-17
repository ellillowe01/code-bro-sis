<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - ServConnect</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; font-family: 'Poppins', sans-serif; }
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
        }
        .register-container {
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            width: 100%;
            max-width: 450px;
            text-align: center;
        }
        .register-container h2 { margin-bottom: 10px; color: #333; font-weight: 600; }
        .register-container p { color: #777; font-size: 14px; margin-bottom: 30px; }
        .input-group { text-align: left; margin-bottom: 15px; }
        .input-group label { display: block; font-size: 14px; margin-bottom: 5px; color: #555; }
        .input-group input, .input-group select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            outline: none;
            transition: 0.3s;
        }
        .input-group input:focus, .input-group select:focus {
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
            margin-top: 10px;
        }
        button:hover { background: #5a6fd6; }
        .footer-text { margin-top: 25px; font-size: 13px; color: #888; }
        .footer-text a { color: #667eea; text-decoration: none; font-weight: 600; }
    </style>
</head>
<body>

<div class="register-container">
    <h2>Daftar Akun</h2>
    <p>Bergabunglah dengan ServConnect</p>

    <form action="proses_registrasi.php" method="POST">
        <div class="input-group">
            <label>Nama Lengkap</label>
            <input type="text" name="name" placeholder="Masukkan nama lengkap" required>
        </div>
        <div class="input-group">
            <label>Email</label>
            <input type="email" name="email" placeholder="contoh@gmail.com" required>
        </div>
        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password" placeholder="Minimal 6 karakter" required>
        </div>
        <div class="input-group">
            <label>Mendaftar Sebagai</label>
            <select name="role" required>
                <option value="user">Pelanggan (User)</option>
                <option value="penyedia">Penyedia Jasa</option>
            </select>
        </div>
        <button type="submit" name="register">Daftar Akun</button>
    </form>

    <div class="footer-text">
        Sudah punya akun? <a href="login.php">Masuk di sini</a>
    </div>
</div>

</body>
</html>