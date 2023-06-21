<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <link
      rel="apple-touch-icon"
      sizes="76x76"
      href="../assets/img/apple-icon.png"
    />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>MM Coffee</title>
    <meta
      content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no"
      name="viewport"
    />
    <!--     Fonts and icons     -->
    <link
      href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
    <link
      href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css"
      rel="stylesheet"
    />
    <!-- POP UP TAMBAH ORDER -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../assets/demo/demo.css" rel="stylesheet" />
  </head>

  <body class="">
    <div class="wrapper">
      <div class="sidebar" data-color="white" data-active-color="danger">
        <div class="logo">
          <a href="user.php" class="simple-text logo-mini">
            <div class="logo-image-small">
              <img src="../assets/img/logo-small.png" />
            </div>
            <!-- <p>CT</p> -->
          </a>
          <a
            href="user.php"
            class="simple-text logo-normal"
          >
            MM COFFEE
            <!-- <div class="logo-image-big">
            <img src="../assets/img/logo-big.png">
          </div> -->
          </a>
        </div>
        <div class="sidebar-wrapper">
        <ul class="nav">
          <li>
            <a href="./dashboard.php">
              <i class="nc-icon nc-bank"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="active">
            <a href="./user.php">
              <i class="nc-icon nc-single-02"></i>
              <p>Add Admin</p>
            </a>
          </li>
          <li>
            <a href="./tables.php">
              <i class="nc-icon nc-tile-56"></i>
              <p>Laporan Penjualan</p>
            </a>
          </li>
        </ul>
      </div>
      </div>
      <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="javascript:;">Add Dashboard</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form action="user.php" method="post">
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="nc-icon nc-zoom-split"></i>
                  </div>
                </div>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="nc-icon nc-bell-55"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </li>
              <li class="nav-item-door">
                    <a href="../login/logout.php">
                      <i class="bi bi-door-open-fill"></i>
                    </a>
                    <p>
                      <span class="d-lg-none d-md-block">Stats</span>
                    </p>
                  </a>
                </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
      <div class="row">
            <div class="col-md-4">
              <div class="card card-user">
                <div class="image">
                  <img src="../assets/img/login2.jpg" alt="..." />
                </div>
                <div class="card-body">
                  <div class="author">
                    <a href="#">
                      <img
                        class="avatar border-gray"
                        src="../assets/img/faces/perdi1.jpg"
                        alt="..."
                      />
                      <h5 class="title">Owner</h5>
                    </a>
                  </div>
                  <p class="description text-center">
                  "MM COFFEE!!!"
                  <br>
                  <br>
                  "Menemani Perjalanan Nikmatmu dalam Secangkir Kopi"
                  </p>
                </div>
                <div class="card-footer">
                  <hr />
                  <div class="button-container">
                    <div class="row">
                      <div class="col-lg-3 col-md-6 col-6 ml-auto">
                        <h5>
                          <?php
                              include "../koneksi.php";
                              $query = "SELECT COUNT(produk_id) as Jumlah FROM produk";
                              $result = mysqli_query($koneksi, $query);
                              $row = mysqli_fetch_array($result); 
                              echo $row["Jumlah"];
                          ?>
                            <br /><small>Produk</small></h5>
                      </div>
                      <div class="col-lg-4 col-md-6 col-6 ml-auto mr-auto">
                        <h5>
                        <?php
                              $query = "SELECT COUNT(admin_id) as Jumlah FROM admin where admin_id <5";
                              $result = mysqli_query($koneksi, $query);
                              $row = mysqli_fetch_array($result); 
                              echo $row["Jumlah"];
                          ?>
                        <br /><small>Karyawan</small></h5>
                      </div>
                      <div class="col-lg-3 mr-auto">
                        <h7>
                        <?php
                              $query = "SELECT SUM(harga_total) as Jumlah FROM `order`";
                              $result = mysqli_query($koneksi, $query);
                              $row = mysqli_fetch_array($result); 
                              echo $row["Jumlah"];
                          ?>  
                        <br /><small>Penghasilan</small></h7>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card card-user">
                <div class="card-header">
                  <h5 class="card-title text-center">Add Admin</h5>
                </div>
                <div class="card-body">
                  <form action="user.php" method="post">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>ADMIN ID</label>
                          <input type="text" class="form-control" placeholder="Admin ID" name="admin" />
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>USERNAME</label>
                          <input type="text" class="form-control" placeholder="Username" name="username" />
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>PASSWORD</label>
                          <input type="password" class="form-control" placeholder="Password" name="pass" />
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="update ml-auto mr-auto">
                        <input name="addAdmin" value="Add Admin" type="submit" class="btn btn-primary btn-round"/>
                        <?php
                          if (isset($_POST['addAdmin'])) {
                            $adminId = $_POST['admin'];
                            $username = $_POST['username'];
                            $password = $_POST['pass'];

                            $query = "INSERT INTO `admin` (admin_id, username, password) VALUES ('$adminId', '$username', '$password')";
                            $simpan = mysqli_query($koneksi, $query);

                            if ($simpan) {
                              echo "<script>alert('Data Admin Tersimpan');</script>";
                            } else {
                              echo "<script>alert('Data Admin Gagal Tersimpan');</script>";
                            }
                          }
                        ?>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Tabel Admin</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class="text-primary">
                        <th class="text-center">Admin ID</th>
                        <th class="text-center">Username</th>
                        <th class="text-center">Aksi</th>
                      </thead>
                      <tbody>
                      <tr>
                        <?php
                        $view = $dbh->query("SELECT admin_id, username FROM `admin` ORDER BY `admin_id` ASC;");
                        if ($view->rowCount() > 0) {
                          $no = 1;
                          while ($data = $view->fetch()) {
                        ?>
                          <tr>
                            <td class="text-center"><?php echo $data['admin_id']; ?></td>
                            <td class="text-center"><?php echo $data['username']; ?></td>
                            <td class="text-center">
                              <a href="?admin_id=<?php echo $data["admin_id"]; ?>" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ubahProduct">Edit</a>
                              <!-- <a href='edit.php?edit=<?php echo $data["admin_id"]; ?>' class="btn btn-success">Edit</a> -->
                              <a href="?admin_id=<?php echo $data["admin_id"]; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data?')">Delete</a>
                            </td>
                          </tr>
                        <?php
                          }
                        }
                        ?>
                      </tr>

                      <!-- DELETE ADMIN -->
                      <?php
                      if (isset($_GET['admin_id'])) {
                        $deleteId = $_GET['admin_id'];
                        $delete = $dbh->query("DELETE FROM `admin` WHERE `admin_id` = '$deleteId'");
                        if ($delete) {
                          echo "<script>document.location='user.php'</script>";
                        } else {
                          echo '<script>alert("Gagal menghapus data");</script>';
                        }
                      }
                      ?>

                      <!-- Modal -->
                      <div class="modal fade" id="ubahProduct" tabindex="-1" aria-labelledby="ubahProductLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="ubahProductLabel">Edit Admin</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <form method="POST" action="user.php">
                                <?php
                                if (isset($_POST['editAdmin'])) {
                                  $admin_id = $_GET['admin_id'];
                                  $view_admin = $dbh->query("SELECT admin_id, username FROM `admin` WHERE admin_id = '$admin_id'");
                                  if ($view_admin->rowCount() > 0) {
                                    $data_admin = $view_admin->fetch();
                                  }
                                }
                                ?>
                                <!-- EDIT INPUT  -->
                                <?php
                                  if (isset($_GET['admin_id'])) {
                                    $deleteId = $_GET['admin_id'];
                                    $view_admin = $dbh->query("SELECT admin_id, username FROM `admin` WHERE admin_id = '$deleteId'");
                                    if ($view_admin->rowCount() > 0) {
                                      $data_admin = $view_admin->fetch();
                                    }
                                  }
                                ?>
                                <div class="mb-3">
                                  <label for="adminI" class="form-label">Admin ID</label>
                                  <input type="text" value="<?php echo isset($data_admin['admin_id']) ? $data_admin['admin_id'] : ''; ?>" name="adminI" class="form-control" id="adminI">
                                </div>
                                <div class="mb-3">
                                  <label for="userName" class="form-label">Username</label>
                                  <input type="text" value="<?php echo isset($data_admin['username']) ? $data_admin['username'] : ''; ?>" name="userName" class="form-control" id="userName">
                                </div>
                                <div class="mb-3">
                                  <label for="passWord" class="form-label">Password</label>
                                  <input type="password" name="passWord" class="form-control" id="passWord">
                                </div>
                                <div class="mb-3">
                                  <label for="CpassWord" class="form-label">Confirm Password</label>
                                  <input type="password" name="CpassWord" class="form-control" id="CpassWord">
                                </div>
                                <input name="updateProduk" value="Simpan" type="submit" class="btn btn-primary btn-round" data-bs-dismiss="modal"/>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>

                      <?php
                      if (isset($_POST['updateProduk'])) {
                        // Mengambil nilai dari form
                        $admin_id = $_POST['adminI'];
                        $username = $_POST['userName'];
                        $password = $_POST['passWord'];

                        // Menjalankan query UPDATE
                        $update_admin = $dbh->prepare("UPDATE admin SET username = '$username', password = '$password' WHERE admin_id = '$admin_id'");
                        if ($update_admin->execute()) {
                          echo "<script>alert('Data Admin Telah Diubah');</script>";
                        } else {
                          echo "<script>alert('Data Admin Gagal Diubah');</script>";
                        }
                      }
                      ?>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
      <footer class="footer footer-black  footer-white ">
        <div class="container-fluid">
          <div class="row">
            <nav class="footer-nav">
              <ul>
                <li><a href="https://www.creative-tim.com" target="_blank">Creative Tim</a></li>
                <li><a href="https://www.creative-tim.com/blog" target="_blank">Blog</a></li>
                <li><a href="https://www.creative-tim.com/license" target="_blank">Licenses</a></li>
              </ul>
            </nav>
            <div class="credits ml-auto">
              <span class="copyright">
                © <script>
                  document.write(new Date().getFullYear())
                </script>, made with <i class="fa fa-heart heart"></i> by Creative Tim
              </span>
            </div>
          </div>
        </div>
      </footer>
    </div>
    </div>
    <!--   Core JS Files   -->
    <script src="../assets/js/core/jquery.min.js"></script>
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Chart JS -->
    <script src="../assets/js/plugins/chartjs.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="../assets/js/plugins/bootstrap-notify.js"></script>
    <!-- Insert data pop up -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script
      src="../assets/js/paper-dashboard.min.js?v=2.0.1"
      type="text/javascript"
    ></script>
    <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
    <script src="../assets/demo/demo.js"></script>
  </body>
</html>
