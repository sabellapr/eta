<?php


include("cont.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['simpan'])){

    // ambil data dari formulir
    $nama = $_POST['nama'];
    $nrp = $_POST['nrp'];
    $angkatan = $_POST['angkatan'];
    $berkas = $_POST['upload'];
    if($upload['eror'] == 0){
        $filetype = pathinfo($upload['name'], PATHINFO_EXTENSION);
        if($filetype == 'pdf' || $filetype == 'docx'){
            $namaBaru = md5(uniqid()) . '.' . $filetype;
            move_uploaded_file($upload['tmp_name'], './uploads/' . $namaBaru);
            $berkas = 'uploads/' . $namaBaru;

        }
    }


    // buat query
    $sql = "INSERT INTO ajuan (nama, nrp, angkatan, upload) VALUE ('$nama', '$nrp', '$angkatan', '$up')";
    $query = mysqli_query($db, $sql);
    // apakah query simpan berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: ta.php?status=sukses');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        header('Location: ta.php?status=gagal');
    }


} else {
    die("Akses dilarang...");
}



?>

