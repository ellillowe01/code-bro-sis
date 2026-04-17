<?php
session_start();
include '../koneksi.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND password='$password'");
    $data = mysqli_fetch_assoc($query);

    if (mysqli_num_rows($query) > 0) {
        $_SESSION['id_user'] = $data['id'];
        $_SESSION['nama'] = $data['name'];
        $_SESSION['role'] = $data['role']; 

        if ($data['role'] == 'penyedia') {
            header("location:penyedia_jasa/dashboard_pj.php"); 
        } else if ($data['role'] == 'admin') {
            header("location:admin/dashboard_admin.php");
        } else if ($data['role'] == 'user') {
            header("location:user/dashboard_user.php");
        }
        exit(); 

    } else {
        echo "<script>alert('Email atau Password Salah!'); window.location='login.php';</script>";
    }
}
?>