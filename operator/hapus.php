<?php
     @session_start();
    include "../asset/koneksi.php";
    if(@$_SESSION['operator']){
    $id = $_GET['npm'];
    $ambil = mysqli_query($koneksi,"DELETE FROM tb_mahasiswa WHERE npm='$id'");

    echo "<meta http-equiv='refresh'content='1;url=http://localhost/mahasiswa/operator/data_mahasiswa.php'>";
    }
?>