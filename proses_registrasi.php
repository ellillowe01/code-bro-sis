<?php
include 'config/koneksi.php';

if (isset($_POST['register'])) {
    $name     = mysqli_real_escape_string($conn, $_POST['name']);
    $email    = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password']; // Disarankan pakai password_hash() seperti saran sebelumnya
    $role     = mysqli_real_escape_string($conn, $_POST['role']);

    // Inisialisasi semua dengan string kosong agar tidak NULL di database jika tidak diisi
    $whatsapp = "";
    $detail_lokasi = "";
    $bisnis = "";
    $kategori = "";

    // 2. Tangkap data BERDASARKAN ROLE
    if ($role == 'user') {
        $whatsapp      = mysqli_real_escape_string($conn, $_POST['whatsapp']);
        $detail_lokasi = mysqli_real_escape_string($conn, $_POST['detail_lokasi']);
        // Validasi 
        if (empty($whatsapp) || empty($detail_lokasi)) {
            echo "<script>alert('WA dan Alamat wajib diisi untuk Pengguna!'); window.history.back();</script>";
            exit();
        }
    } elseif ($role == 'penyedia') {
        $bisnis   = mysqli_real_escape_string($conn, $_POST['bisnis']);
        $kategori = mysqli_real_escape_string($conn, $_POST['kategori']);        
        // Validasi 
        if (empty($bisnis) || empty($kategori)) {
            echo "<script>alert('Nama Bisnis dan Kategori wajib diisi untuk Mitra!'); window.history.back();</script>";
            exit();
        }
    }

    // 3. Cek Email (Cek apakah user perlu login untuk upgrade role)
    $cek_email = mysqli_query($conn, "SELECT id, role FROM users WHERE email = '$email'");
    if (mysqli_num_rows($cek_email) > 0) {
        $data_user = mysqli_fetch_assoc($cek_email);
        $role_lama = $data_user['role'];
        // Jika dia mencoba daftar dengan role yang BERBEDA dari yang sudah ada di DB
        if ($role != $role_lama) {
            echo "<script>
                alert('Email ini sudah terdaftar sebagai " . ucfirst($role_lama) . ". Silakan login ke akun Anda dan aktifkan fitur " . ucfirst($role) . " melalui Dashboard.'); 
                window.location='login.php';
            </script>";
        } else {
            // Jika dia daftar dengan role yang SAMA (benar-benar duplikat)
            echo "<script>
                alert('Email ini sudah terdaftar. Silakan login untuk masuk ke akun Anda.'); 
                window.location='login.php';
            </script>";
        }
        exit();
    } else {
        // 4. Query Insert (Hanya jalan jika email benar-benar tidak ada)
        $sql = "INSERT INTO users (name, email, password, role, whatsapp, alamat, nama_bisnis, kategori) 
                VALUES ('$name', '$email', '$password', '$role', '$whatsapp', '$detail_lokasi', '$bisnis', '$kategori')";
        
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Registrasi Berhasil!'); window.location='login.php';</script>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}
?>