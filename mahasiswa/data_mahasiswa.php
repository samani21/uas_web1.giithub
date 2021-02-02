<?php
    @session_start();
    include "../asset/koneksi.php";
    if(@$_SESSION['mahasiswa']){
?>
<!DOCTYPE html>
<html>
    <head>
        <title>MAHASISWA</title>
        <link rel="stylesheet" href="../css/bootstrap.css">
        <script src="js/jquery-3.4.1.min.js"></script>
    </head>
    <body>
        <div class="container col-md-10">
        <div class="card">
        <div class="card-header bg-dark text-white">
            <h1 align="right">DATA MAHASISWA</h1>
            <div class="btn-group" role="group">
                <a href="profil.php" class="btn btn-secondary"><img src="../asset/person-fill.svg" width="25" height="25" class="d-inline-block align-top" alt=""> Profil</a>
                <a href="data_mahasiswa.php" class="btn btn-secondary"><img src="../asset/people-fill.svg" width="25" height="25" class="d-inline-block align-top" alt=""> Data mahasiswa</a>
                <a href="../logout.php" class="btn btn-secondary"><img src="../asset/box-arrow-right.svg" width="25" height="25" class="d-inline-block align-top" alt=""> Logout</a>
            </div>
        </div>
        <div class="card-body">
        <form action="" method="POST" class="input-group mb-3">
            <button type="submit" class="btn btn-outline-dark" name="submit"><img src="../asset/search.svg" width="20" height="20" class="d-inline-block align-top" alt=""></button>
            <input type="text" name="cari" placeholder="cari nama" class="form-control">
        </form>
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr align="center">
                        <th scope="col">No</th>
                        <th scope="col">NPM</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Tempat Lahir</th>
                        <th scope="col">Tanggal Lahir</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">kode Pos</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include "../asset/koneksi.php";
                        $no=1;
                        if(isset($_POST['submit'])){
                            $cari=$_POST['cari'];
                            $query = mysqli_query($koneksi,"SELECT * FROM tb_mahasiswa WHERE nama LIKE '$cari%'");                            
                        }else{
                            $query= mysqli_query($koneksi,"SELECT * FROM tb_mahasiswa ORDER BY npm desc");
                        }
                        while($data = mysqli_fetch_array($query))
                        {
                    ?>
                        <tr align="center">
                            <td scope="row"><?php echo $no++ ?></td>
                            <td scope="row"><?php echo $data['npm'] ?></td>
                            <td scope="row"><?php echo $data['nama'] ?></td>
                            <td scope="row"><?php echo $data['tempat_lahir'] ?></td>
                            <td scope="row"><?php echo $data['tanggal_lahir'] ?></td>
                            <td scope="row"><?php echo $data['jenis_kelamin'] ?></td>
                            <td scope="row"><?php echo $data['alamat'] ?></td>
                            <td scope="row"><?php echo $data['kode_pos'] ?></td>
                        </tr>
                    <?php
                        }
                    ?>   
                </tbody>
            </table>
        </div>
        </div>
    </body>
</html>
<?php
    }
?>