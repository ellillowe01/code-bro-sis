<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - ServeConnect</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    
    <style>
        :root { --primary: #667eea; }
        * { box-sizing: border-box; font-family: 'Poppins', sans-serif; }
        body { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; padding: 20px; }
        
        .register-container { background: white; padding: 30px; border-radius: 20px; box-shadow: 0 10px 25px rgba(0,0,0,0.2); width: 100%; max-width: 700px; text-align: center; }
        
        .tabs { display: flex; margin-bottom: 25px; border-bottom: 2px solid #eee; }
        .tab { flex: 1; padding: 12px; cursor: pointer; font-weight: 600; color: #777; transition: 0.3s; }
        .tab.active { color: var(--primary); border-bottom: 2px solid var(--primary); }

        .form-grid { display: flex; flex-wrap: wrap; gap: 15px; text-align: left; }
        .input-group { flex: 1 1 calc(50% - 15px); min-width: 250px; display: flex; flex-direction: column; margin-bottom: 10px; position: relative; }
        .input-group.full { flex: 1 1 100%; } 

        .input-group label { font-size: 13px; font-weight: 600; margin-bottom: 5px; color: #555; }
        .input-group input, .input-group select, .input-group textarea { padding: 10px; border: 1px solid #ddd; border-radius: 8px; outline: none; transition: 0.3s; width: 100%; }
        .input-group input:focus { border-color: var(--primary); }

        /* Style untuk Ikon Mata Material Icons */
        .password-wrapper { position: relative; width: 100%; }
        .toggle-password { 
            position: absolute; 
            right: 12px; 
            top: 50%; 
            transform: translateY(-50%); 
            cursor: pointer; 
            user-select: none;
            color: #888;
            font-size: 20px;
        }
        
        .hidden { display: none; }
        .btn-regis { width: 100%; padding: 14px; background: var(--primary); border: none; color: white; font-size: 16px; font-weight: 600; border-radius: 10px; cursor: pointer; margin-top: 20px; }
        .footer-text { margin-top: 20px; font-size: 13px; color: #888; }
    </style>
</head>
<body>

<div class="register-container">
    <h2>Registrasi Akun</h2>
    <p>Bergabunglah dengan ServeConnect</p>

    <div class="tabs">
        <div class="tab active" id="btn-user" onclick="switchForm('user')">Sebagai Pengguna</div>
        <div class="tab" id="btn-penyedia" onclick="switchForm('penyedia')">Sebagai Mitra</div>
    </div>

    <form action="proses_registrasi.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="role" id="role-input" value="user">
        
        <div class="form-grid">
            <div class="input-group full">
                <label id="label-nama-utama">Nama Lengkap</label>
                <input type="text" name="name" placeholder="Nama sesuai KTP" required>
            </div>
            <div class="input-group">
                <label>Email</label>
                <input type="email" name="email" placeholder="email@gmail.com" required>
            </div>
            
            <div class="input-group">
                <label>Password <span style="color: #888; font-weight: normal; font-size: 11px;">(Min. 8 Karakter)</span></label>
                <div class="password-wrapper">
                    <input type="password" name="password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                    <span class="material-icons toggle-password" onclick="togglePassword()">visibility_off</span>
                </div>
            </div>

            <div id="form-user" class="form-grid" style="width: 100%;">
            <div class="input-group full">
                <label>No. Telp</label>
                <input type="text" name="whatsapp" id="wa-user" placeholder="08xxxx" required maxlength="20">
            </div>
            <div class="input-group full">
                <label>Detail Alamat (No. Rumah/Blok)</label>
                <input type="text" name="detail_lokasi" id="alamat-user" placeholder="Contoh: Blok A No. 12" required>
            </div>
        </div>

        <div id="form-penyedia" class="form-grid hidden" style="width: 100%;">
            <div class="input-group">
                <label>Nama Bisnis / Mitra</label>
                <input type="text" name="bisnis" id="bisnis-mitra" placeholder="Contoh: Service AC Jaya Putra">
            </div>
            <!-- <div class="input-group">
                <label>Tahun Lahir</label>
                <input type="number" name="tahun_lahir" id="lahir-mitra" placeholder="Contoh: 1998">
            </div> -->
            <div class="input-group">
                <label>Kategori</label>
                <select name="kategori" id="kategori-mitra">
                    <option value="">-- Pilih Kategori --</option>
                    <option value="Teknisi">Teknisi Elektronik</option>
                    <option value="Kebersihan">Jasa Kebersihan</option>
                    <option value="homecare">Perawatan Rumah</option> 
                </select>
            </div>
        </div>
                <!-- <div class="input-group">
                    <label>Link Google Maps</label>
                    <input type="url" name="link_maps" placeholder="https://maps.google.com/...">
                </div>
                <div class="input-group full">
                    <label>Sertifikasi Keahlian (PDF, JPG, JPEG - Maks. 2MB)</label>
                    <input type="file" name="sertifikat" accept=".pdf,.jpg,.jpeg">
                </div> -->
        </div>

        <button type="submit" name="register" class="btn-regis">Daftar Sekarang</button>
    </form>

    <div class="footer-text">Sudah punya akun? <a href="login.php" style="color:var(--primary); font-weight:600; text-decoration:none;">Masuk</a></div>
</div>

<script>
    // Fungsi Lihat/Sembunyi Password dengan Material Icons
    function togglePassword() {
        const passwordField = document.getElementById("password");
        const toggleIcon = document.querySelector(".toggle-password");
        
        if (passwordField.type === "password") {
            passwordField.type = "text";
            toggleIcon.innerText = "visibility"; // Ikon mata terbuka
        } else {
            passwordField.type = "password";
            toggleIcon.innerText = "visibility_off"; // Ikon mata tertutup garis
        }
    }

    function switchForm(type) {
    const fUser = document.getElementById('form-user');
    const fPenyedia = document.getElementById('form-penyedia');
    const roleInput = document.getElementById('role-input');
    const labelNama = document.getElementById('label-nama-utama');
    const btnU = document.getElementById('btn-user');
    const btnP = document.getElementById('btn-penyedia');

    // Ambil element input tambahan
    const waInput = document.getElementById('wa-user');
    const alamatInput = document.getElementById('alamat-user');
    const bisnisInput = document.getElementById('bisnis-mitra');
    const kategoriInput = document.getElementById('kategori-mitra');

    if(type === 'penyedia') {
        fPenyedia.classList.remove('hidden');
        fUser.classList.add('hidden');
        roleInput.value = 'penyedia';
        labelNama.innerText = 'Nama Pemilik';
        btnP.classList.add('active');
        btnU.classList.remove('active');

        // Wajibkan input mitra, bebaskan input user
        bisnisInput.required = true;
        kategoriInput.required = true;
        waInput.required = false;
        alamatInput.required = false;
    } else {
        fUser.classList.remove('hidden');
        fPenyedia.classList.add('hidden');
        roleInput.value = 'user';
        labelNama.innerText = 'Nama Lengkap';
        btnU.classList.add('active');
        btnP.classList.remove('active');

        // Wajibkan input user, bebaskan input mitra
        waInput.required = true;
        alamatInput.required = true;
        bisnisInput.required = false;
        kategoriInput.required = false;
    }
 }
</script>

</body>
</html>