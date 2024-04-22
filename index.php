<?php
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_GET['register'])) {
  
  include"koneksi.php";

  $query = mysqli_query($con,"INSERT INTO Karyawan (Nama,Email,NIK,Alamat,Dapertemen,Tanggal Lahir, Tanggal Masuk,password) values ('$_POST[nim_alumni]','$_POST[nm_alumni]','$_POST[angkatan]','$_POST[prodi]','$_POST[email]','$_POST[alamat]','$_POST[gender]','$_POST[password]')");

  echo"<script language = 'JavaScript'>
       confirm('Data Berhasil Disimpan!');
       document.location='index.php?page=login'
  </script>";
}
else if ($_SERVER['REQUEST_METHOD'] == "POST") {
    include "koneksi.php";
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $sqluser = mysqli_query($con, "SELECT * FROM user WHERE username='$user' AND password='$pass'");
    $row = mysqli_num_rows($sqluser);

    $sqlalum = mysqli_query($con, "SELECT * FROM alumni where nim_alumni='$user' AND password='$pass'");
    $row1 = mysqli_num_rows($sqlalum);

    if ($row > 0) {
        $ruser = mysqli_fetch_assoc($sqluser);

        session_start();
        $_SESSION['namaadmin'] = $ruser['username'];
        $_SESSION['passadmin'] = $ruser['password'];

        echo"<script language = 'JavaScript'>
            confirm('Login Berhasil!');
            document.location='admin';
            </script>  ";
    }
    else if ($row1 > 0) {
        $ralum = mysqli_fetch_assoc($sqlalum);

        session_start();
        $_SESSION['namaalum'] = $ralum['nim_alumni'];
        $_SESSION['passalum'] = $ralum['password'];

        echo  "   <script language = 'JavaScript'>
                confirm('Login Berhasil!');
                document.location='alumni';
             </script>  ";
    }

  }
    ?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Real-Time Deteksi Orang Menggunakan CNN Berbasis Website - Login</title>
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="assets/css/ruang-admin.min.css" rel="stylesheet">


</head>
<?php
if (isset($_GET['register'])) {
  ?>
<body class="bg-gradient-login">
  <!-- Login Content -->
  <div class="container-login">
    <div class="row justify-content-center">
      <div class="col-xl-4 col-lg-8 col-md-8">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                  <img class="mb-1" src="logo.png" alt="" width="150" height="150">
                  <h4 class="mt-2 text-center">Real-Time Deteksi Orang Menggunakan CNN Berbasis Website</h4>
                  </div>

                  <form class="mt-4" action="" method="post">
                    <div class="form-group">
                      <label><b>Nama</b></label>
                      <input type="text" class="form-control" name="nm_alumni" placeholder="Masukkan Nama">
                    </div>
                    <div class="form-group">
                      <label><b>NIK</b></label>
                      <select class="form-control" name="NIK">
                      </select>
                   </div>
                    <div class="form-group">
                      <label><b>Password</b></label>
                      <input type="password" class="form-control" name="password" placeholder="Masukkan Password">
                    </div>
                    <div class="form-group">
                    <label><b>Jenis Kelamin</b></label><br>
                       <div class="form-check form-check-inline">
                       <div class="custom-control custom-radio">
                       <input type="radio" class="custom-control-input" id="custom1" value="Laki-Laki" name="gender">
                       <label class="custom-control-label" for="custom1">Laki-Laki</label>
                       </div>&nbsp;&nbsp;
                          
                       <div class="custom-control custom-radio">
                       <input type="radio" class="custom-control-input" id="custom2" value="Perempuan" name="gender">
                       <label class="custom-control-label" for="custom2">Perempuan</label>
                      </div>
                    </div>
                    <div class="form-group">
                    <label><b>Alamat</b></label>
                    <textarea class="form-control" name="alamat" rows="3" placeholder="Masukkan Alamat"></textarea>
                    </div>
                    <div class="form-group">
                      <input type="submit" class="btn btn-block btn-primary" value="Register">
                    </div>
                    <div class="form-group">
                      <a  href="index.php?register" class="btn btn-block btn-primary">Login</a>
                    </div>
                    <hr>
                  <div class="text-center">
                    <a class="font-weight-bold small" href="#"></a>
                  </div>
                  </form>

                  
                  <div class="text-center">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php
}else {
  ?>
  <body class="bg-gradient-login">
    <!-- Login Content -->
    <div class="container-login">
      <div class="row justify-content-center">
        <div class="col-xl-4 col-lg-8 col-md-8">
          <div class="card shadow-sm my-5">
            <div class="card-body p-0">
              <div class="row">
                <div class="col-lg-12">
                  <div class="login-form">
                    <div class="text-center">
                    <img class="mb-1" src="logo.png" alt="" width="150" height="150">
                    <h4 class="mt-2 text-center">Real-Time Deteksi Orang Menggunakan CNN Berbasis Website</h4>
                    </div>
  
                    <form class="mt-4" action="" method="post">
                      <div class="form-group">
                        <input type="text" class="form-control" name="username" placeholder="Username">
                      </div>
                      <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                      </div>
                      <div class="form-group">
                        <div class="custom-control custom-checkbox small" style="line-height: 1.5rem;">
                          <input type="checkbox" class="custom-control-input" id="customCheck">
                          <label class="custom-control-label" for="customCheck">Ingat Saya</label>
                        </div>
                      </div>
                      <div class="form-group">
                        <input type="submit" class="btn btn-block btn-primary" value="Login">
                      </div>
                      <div class="form-group">
                        <a  href="index.php?register" class="btn btn-block btn-primary">Register Alumni</a>
                      </div>
                      <hr>
                    <div class="text-center">
                      <a class="font-weight-bold small">Info:polibatam</a>
                      <a class="font-weight-bold small" href="#"></a>
                    </div>
                    </form>
  
                    
                    <div class="text-center">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php
  }
    ?>
  <!-- Login Content -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="assets/js/ruang-admin.min.js"></script>
</body>
</html>