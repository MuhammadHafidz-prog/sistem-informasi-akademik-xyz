<?php
session_start();

require 'config/koneksi.php';

$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

$query = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' AND password='$password'");

if(mysqli_num_rows($query) == 1){

    $data = mysqli_fetch_assoc($query);

    $_SESSION['login'] = true;
    $_SESSION['id_user'] = $data['id_user'];
    $_SESSION['username'] = $data['username'];
    $_SESSION['nama'] = $data['nama'];
    $_SESSION['level'] = $data['level'];

    header("Location: dashboard.php");
    exit;

}else{

    echo "<script>
        alert('Username atau Password salah!');
        window.location='login.php';
    </script>";

}
?>