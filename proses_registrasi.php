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
        
        // Validasi tambahan
        if (empty($whatsapp) || empty($detail_lokasi)) {
            echo "<script>alert('WA dan Alamat wajib diisi untuk Pengguna!'); window.history.back();</script>";
            exit();
        }
    } elseif ($role == 'penyedia') {
        $bisnis   = mysqli_real_escape_string($conn, $_POST['bisnis']);
        $kategori = mysqli_real_escape_string($conn, $_POST['kategori']);
        
        // Validasi tambahan
        if (empty($bisnis) || empty($kategori)) {
            echo "<script>alert('Nama Bisnis dan Kategori wajib diisi untuk Mitra!'); window.history.back();</script>";
            exit();
        }
    }

    // 3. Cek Email
    $cek_email = mysqli_query($conn, "SELECT email FROM users WHERE email='$email'");
    if (mysqli_num_rows($cek_email) > 0) {
        echo "<script>alert('Email sudah digunakan!'); window.history.back();</script>";
        exit();
    }

    // 4. Query Insert
    $sql = "INSERT INTO users (name, email, password, role, whatsapp, alamat, nama_bisnis, kategori) 
            VALUES ('$name', '$email', '$password', '$role', '$whatsapp', '$detail_lokasi', '$bisnis', '$kategori')";
    
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Registrasi Berhasil!'); window.location='login.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>