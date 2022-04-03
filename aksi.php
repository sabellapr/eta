<?php


include("config.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['tambah'])){

    // ambil data dari formulir
    $dosen1 = $_POST['dos1'];
    $dosen2 = $_POST['dos2'];

    // buat query
    $sql = "INSERT INTO dosen (dosen1, dosen2) VALUE ('$dosen1', '$dosen2')";
    $query = mysqli_query($db, $sql);

    // apakah query simpan berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: dospem.php?status=sukses');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        header('Location: .php?status=gagal');
    }


} else {
    die("Akses dilarang...");
}



?>