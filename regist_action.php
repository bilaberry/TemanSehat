<?php
require_once 'includes/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $uname = htmlspecialchars(trim($_POST['uname']));
    $password = trim($_POST['password']);
    $role = htmlspecialchars(trim($_POST['role'])); // Sesuaikan dengan `name` dari radio button di HTML

    if (empty($name) || empty($email) || empty($uname) || empty($password) || empty($role)) {
        echo "Semua kolom wajib diisi!";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Alamat email tidak valid!";
        exit;
    }

    $sql = "INSERT INTO akun (username, password, nama, email, role)
            VALUES ('$uname', '$password', '$name', '$email', '$role')";

    if ($koneksi->query($sql) === TRUE) {
        header("Location: login.php");
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
        header("Location: register.php");
    }

    // Tutup koneksi
    $koneksi->close();
} else {
    echo "Akses tidak diizinkan!";
}
?>
