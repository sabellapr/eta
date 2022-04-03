<?php
include "cont.php";
    if($_POST['upload']){
        $nomor    = $_POST['nomor'];
        $ekstensi_diperbolehkan    = array('pdf','docx');
        $nama    = $_FILES['file_ijazah']['name'];
        $x        = explode('.', $nama);
        $ekstensi    = strtolower(end($x));
        $ukuran        = $_FILES['file_ijazah']['size'];
        $file_tmp    = $_FILES['file_ijazah']['tmp_name']; 
     
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
            if($ukuran < 1044070){ 
                move_uploaded_file($file_tmp, 'aset/'.$nama);
                $query    = mysql_query("INSERT INTO tb_ijazah VALUES(NULL, '$nomor', '$nama')");
                if($query){
                    echo 'FILE BERHASIL DI UPLOAD!';
                }
                else{
                    echo 'FILE GAGAL DI UPLOAD!';
                }
            }
            else{
                echo 'UKURAN FILE TERLALU BESAR!';
            }
        }
        else{
            echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN!';
        }
    }
    ?> 