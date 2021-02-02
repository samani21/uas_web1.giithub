<?php
    @session_start();
    include "asset/koneksi.php";
    if(@$_SESSION['mahasiswa']||@$_SESSION['operator']){
        header("location:index.php");
    }else{
?>
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
                <label for="form GroupEXampleInput">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Masukkan password">
            </div>
            <input type="submit" class="btn btn-success" name="login" value="Login" >
            <input type="submit" class="btn btn-success" name="daftar" value="Daftar">
            </form>
            <?php
                include "asset/koneksi.php";
                $npm= @$_POST['npm'];
                $password = @$_POST['password'];
                $login = @$_POST['login'];
                $daftar = @$_POST['daftar'];

                if($daftar){
                    header("location:daftar.php");
                }
                

                if($login){
                    if($npm =="" || $password ==""){
                        echo"NPM/PASWORD kosong";
                        ?><script type="text/javascript">alert('NPM/PASSOWRD tidak boleh kosong');</script><?php
                    }else{
                        $query =mysqli_query($koneksi,"SELECT * FROM tb_login WHERE npm='$npm' AND password =('$password')");
                        $data = mysqli_fetch_array($query);
                        $cek = mysqli_num_rows($query);

                            if($cek >= 1){
                                if($data['status']== "mahasiswa"){
                                    @$_SESSION['mahasiswa'] =$data['npm'];
                                    header("location:mahasiswa/input.php");
                                }
                            }
                            if($cek >= 1){
                                if($data['status']== "operator"){
                                    @$_SESSION['operator'] =$data['npm'];
                                    header("location:operator/data_mahasiswa.php");
                                }
                            }
                            else{
                                ?>
                                    <script type="text/javascript">alert('NPM/PASSWORD salah');</script>
                                <?php
                                echo "NPM/PASSWORD salah";
                            }
                        
                    }
                }
            ?>
        </div>
        </div>
    </body>
</html>
<?php
    }
?>
<script>
    alert('Selamat datang Mahasiswa/i')
</script>