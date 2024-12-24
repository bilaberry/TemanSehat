<?php
    require_once 'includes/koneksi.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    $username = stripcslashes($username);
    $password = stripcslashes($password);
    $username = mysqli_real_escape_string($koneksi, $username);
    $password = mysqli_real_escape_string($koneksi, $password);

    $sql = "select * from akun where username = '$username' and password = '$password'";
    $result = mysqli_query($koneksi, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);

    if($count==0){
        echo "<h1>Invalid Username Or Password</h1>";
    }else {
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $row['role'];
        $_SESSION['admin'] = $row;

        if ($row['role'] === 'admin') {
            header("Location:admin/index.php");
            exit();
        } elseif ($row['role'] === 'user') {
            header("Location:admin/index.php");
            exit();
        } else {
            echo "<h1>Role tidak dikenali.</h1>";
        }

    }
?>