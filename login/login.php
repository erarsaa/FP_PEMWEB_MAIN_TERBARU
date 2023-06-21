<?php

include '../koneksi.php';

session_start();

if (isset($_POST['submit'])) {
    $username = ($_POST['username']);
    $password = ($_POST['password']);
    $usertype = ($_POST['usertype']);

    if ($usertype === 'kasir') {
        if ($username === 'adminKasir1' || $username === 'adminKasir2' ) {
            $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
            $result = mysqli_query($koneksi, $sql);
            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)){
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['admin'] = $row['admin_id'];
                };
                header("Location: ../kasir/index.php");
                exit(); // tambahkan exit() setelah header untuk menghentikan eksekusi skrip
            } else {
                echo "<script>alert('Username atau password Anda salah. Silahkan coba lagi!')</script>";
            }
        } else{
            echo "<script>alert('Tipe pengguna tidak valid')</script>";
        }
    } elseif ($usertype === 'barang') {
        if ($username === 'adminBarang1' || $username === 'adminBarang2' ) {
            $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
            $result = mysqli_query($koneksi, $sql);
            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)){
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['admin'] = $row['admin_id'];
                };
                header("Location: ../gudang/index.php");
                exit(); // tambahkan exit() setelah header untuk menghentikan eksekusi skrip
            } else {
                echo "<script>alert('Username atau password Anda salah. Silahkan coba lagi!')</script>";
            }
        } else{
            echo "<script>alert('Tipe pengguna tidak valid')</script>";
        }
    } elseif ($usertype === 'owner') {
        if ($username === 'ownerMM' ) {
            $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
            $result = mysqli_query($koneksi, $sql);
            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $_SESSION['username'] = $row['username'];
                header("Location: ../owner/dashboard.php");
                exit(); // tambahkan exit() setelah header untuk menghentikan eksekusi skrip
            } else {
                echo "<script>alert('Username atau password Anda salah. Silahkan coba lagi!')</script>";
            }
        } else{
            echo "<script>alert('Tipe pengguna tidak valid')</script>";
        }
    } else {
        echo "<script>alert('Tipe pengguna tidak valid')</script>";
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

    <title>Login</title>
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block"><img src="../assets/img/bgreg1.jpg"
                                    style="width: 100%; height: 100%" /></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="admin" method='POST' action="">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                placeholder="Username" name="username" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                placeholder="Password" name="password" required>
                                        </div>
                                        <div class="form-group">
                                        <select id="usertype" name="usertype" class="form-control form-control-user">
                                            <option value="kasir">Kasir</option>
                                            <option value="barang">Barang</option>
                                            <option value="owner">Owner</option>
                                        </select>
                                        </div>

                                        <button name="submit" class="btn btn-primary btn-user btn-block"
                                            type="submit">Login</button>
                                        <hr>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../assets/js/sb-admin-2.min.js"></script>

</body>

</html>
