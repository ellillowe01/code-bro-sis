<?php
include 'koneksi.php';

if (isset($_POST['register'])) {
    $name     = mysqli_real_escape_string($conn, $_POST['name']);
    $email    = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password']; // Disarankan pakai password_hash() untuk keamanan nyata
    $role     = $_POST['role'];

    // 1. Cek apakah email sudah terdaftar
    $cek_email = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    
    if (mysqli_num_rows($cek_email) > 0) {
        echo "<script>alert('Email sudah digunakan! Gunakan email lain.'); window.location='registrasi.php';</script>";
    } else {
        // 2. Insert ke database
        // (tidak di-hash)
        $query = mysqli_query($conn, "INSERT INTO users (name, email, password, role) VALUES ('$name', '$email', '$password', '$role')");

        if ($query) {
            echo "<script>alert('Registrasi Berhasil! Silakan Login.'); window.location='login.php';</script>";
        } else {
            echo "<script>alert('Gagal registrasi, coba lagi.'); window.location='registrasi.php';</script>";
        }
    }
}
?>