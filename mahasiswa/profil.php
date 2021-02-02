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
            <h1 align="right">PROFIL DATA MAHASISWA</h1>
            <div class="btn-group" role="group">
                <a href="profil.php" class="btn btn-secondary"><img src="../asset/person-fill.svg" width="25" height="25" class="d-inline-block align-top" alt=""> Profil</a>
                <a href="data_mahasiswa.php" class="btn btn-secondary"><img src="../asset/people-fill.svg" width="25" height="25" class="d-inline-block align-top" alt=""> Data mahasiswa</a>
                <a href="../logout.php" class="btn btn-secondary"><img src="../asset/box-arrow-right.svg" width="25" height="25" class="d-inline-block align-top" alt=""> Logout</a>
            </div>
        </div>
        <div class="card-body">
            <?php
                if(@$_SESSION['mahasiswa']){
                    $user=@$_SESSION['mahasiswa'];
                }
            }
            $ambil = mysqli_query($koneksi,"SELECT * FROM tb_login WHERE npm='$user'");
            $dt = mysqli_fetch_array($ambil);

            $ambildata = mysqli_query($koneksi,"SELECT * FROM tb_mahasiswa WHERE npm='$user'");
            $data =mysqli_fetch_array($ambildata);
            ?>
            <form action="" method="POST">
                <div class="form-group">
                    <label for="form GroupEXampleInput">NPM</label>
                    <input type="text" class="form-control" name="npm" placeholder="Masukkan NPM" value="<?php echo $dt['npm']?>" readonly>
                </div>
                <div class="form-group">
                    <label for="form GroupEXampleInput">Nama</label>
                    <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama" value="<?php echo @$data['nama']?>">
                </div>
                <div class="form-group">
                    <label for="form GroupEXampleInput">Tempat Lahir</label>
                    <input type="text" class="form-control" name="tempat_lahir" placeholder="Masukkan tempat lahir" value="<?php echo @$data['tempat_lahir']?>">
                </div>
                <div class="form-group">
                    <label for="form GroupEXampleInput">Tanggal Lahir</label>
                    <input type="date" class="form-control" name="tanggal_lahir" placeholder="Masukkan tanggal lahir" value="<?php echo @$data['tanggal_lahir']?>">
                </div>
                <div class="form-group">
                    <label for="form GroupEXampleInput">Jenis Kelamin</label>
                    <select type="text" class="form-control" name="jenis_kelamin" value="<?php echo @$data['jenis_kelamin']?>">
                        <option selected> <?php echo @$data['jenis_kelamin']?></option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="form GroupEXampleInput">Alamat</label>
                    <input type="text" class="form-control" name="alamat" placeholder="Masukkan alamat" value="<?php echo @$data['alamat']?>">
                </div>
                <div class="form-group">
                    <label for="form GroupEXampleInput">Kode Pos</label>
                    <input type="text" class="form-control" name="kode_pos" placeholder="Masukkan kode_pos" value="<?php echo @$data['kode_pos']?>">
                </div>
                <button type="submit" class="btn btn-secondary" name="simpan">Simpan</button>
            </form>
        </div>
        </div>
    </body>
</html>
<?php
    include "../asset/koneksi.php";
    if(isset($_POST['simpan']))
    {
        $npm = $_POST['npm'];
        $nama = $_POST['nama'];
        $tempat_lahir = $_POST['tempat_lahir'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $alamat = $_POST['alamat'];
        $kode_pos = $_POST['kode_pos'];

        mysqli_query($koneksi,"UPDATE  tb_mahasiswa SET nama='$nama',tempat_lahir='$tempat_lahir',tanggal_lahir='$tanggal_lahir',jenis_kelamin='$jenis_kelamin',alamat='$alamat',kode_pos='$kode_pos' WHERE npm='$user'") or die (mysqli_error($koneksi));
        echo "<div align='center'><h3> SEDANG PROSES...</h3></div>";
       echo "<meta http-equiv='refresh'content='1;url=http://localhost/mahasiswa/mahasiswa/data_mahasiswa.php'>";
    }
?>