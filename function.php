<?php

include 'koneksi.php';
if (isset($_POST["login"])){
    //punya akun
    $email = $_POST['email'];
    $password = $_POST['password'];

    $login = mysqli_query($con, "select * from data where email = '$email' and password= '$password'");
    $cek = mysqli_num_rows($login);

    if($cek > 0){
        session_start();

        $_SESSION['email'] = $email;
        header('Location:homeuser.php');
    }else{
        header("location:login.php?pesan=gagal");
    }
}else if(isset($_POST['signup'])){
    $nama = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $query = "INSERT INTO data (nama, email, password) VALUES ('$nama', '$email','$password')";
    if(mysqli_query($con, $query)){
        echo "<h1>Email $email berhasil terdaftar</h1>
        <a href= 'login.php'> Login</h1>
        ";
    }else{
        echo "Gagal: : ".mysqli_error($koneksi);
    }
}

?>