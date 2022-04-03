<?php


include("conf.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['simpan'])){

    // ambil data dari formulir
    $nama = $_POST['nama'];
    $nrp = $_POST['nrp'];
    $kelamin = $_POST['jenis_kelamin'];
    $angkatan = $_POST['angkatan'];
    $judul = $_POST['judul'];

    // buat query
    $sql = "INSERT INTO judul (nama, nrp, kelamin, angkatan, judul) VALUE ('$nama', '$nrp', '$kelamin', '$angkatan', '$judul')";
    $query = mysqli_query($db, $sql);

    // apakah query simpan berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: judul.php?status=sukses');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        header('Location: judul.php?status=gagal');
    }


} else {
    die("Akses dilarang...");
}



?>
