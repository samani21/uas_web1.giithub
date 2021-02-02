<!DOCTYPE html>
<html>
    <head>
        <title>MAHASISWA</title>
        <link rel="stylesheet" href="css/bootstrap.css">
    </head>
    <body>
        <br>
        <br>
        <br>
        <br>
        <br>
        <div class="container col-md-4">
        <div class="card">
        <div class="card-header bg-dark text-white">
            <h1 align="center">LOGIN</h1>
        </div>
        <div class="card-body">
            <form action="" method="POST">
            <div class="form-group">
                <label for="form GroupEXampleInput">NPM</label>
                <input type="text" class="form-control" name="npm" placeholder="Masukkan NPM">
            </div>
            <div class="form-group">
                <label for="form GroupEXampleInput">Nama</label>
                <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama">
            </div>
            <div class="form-group">
                <label for="form GroupEXampleInput">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Masukkan password">
            </div>
            <div class="form-group">
                <label for="form GroupEXampleInput">Satatus</label>
                <input type="text" class="form-control" name="status" placeholder="Masukkan status" value="mahasiswa" readonly>
            </div>
            <button type="submit" class="btn btn-success" name="daftar">daftar</button>
            </form>
            </div>
        </div>
    </body>
</html>
<?php
    include "asset/koneksi.php";
    if(isset($_POST['daftar']))
    {
        $npm = $_POST['npm'];
        $nama = $_POST['nama'];
        $password = $_POST['password'];
        $status = $_POST['status'];

        mysqli_query($koneksi,"INSERT INTO tb_login VALUE('','$npm','$nama','$password','$status'
        )") or die (mysqli_error($koneksi));

       echo "<div align='center'><h3> SEDANG PROSES...</h3></div>";
       header("location:index.php");
    }
?>