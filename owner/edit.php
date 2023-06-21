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
      <?php
        if (isset($_GET['admin_id'])) {
          $editAdminID = $_GET['admin_id'];
          $_SESSION['admin_id'] = $editAdminID;
          $sql = $dbh->prepare("SELECT * FROM `admin` WHERE `admin_id` = :admin_id");
          $sql->bindParam(':admin_id', $editAdminID);
          $sql->execute();
          $data = $sql->fetch(PDO::FETCH_ASSOC);
        }
      ?>

      <div class="row">
            <div class="col-md-8">
              <div class="card card-user">
                <div class="card-header">
                  <h5 class="card-title text-center">Edit Admin</h5>
                </div>
                <div class="card-body">
                  <form action="user.php" method="post">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>ADMIN ID</label>
                          <?php if (isset($data['admin_id'])): ?>
                            <input type="text" name="ADMIN_ID" value="<?php echo $data['admin_id']; ?>" readonly style="height: 30px; border: 0; box-shadow: rgba(0,0,0,0.1)">
                          <?php endif; ?>
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
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>CONFIRM PASSWORD</label>
                          <input type="password" class="form-control" placeholder="Confirm Password" name="Cpass" />
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="update ml-auto mr-auto">
                        <input name="addAdmin" value="Edit Admin" type="submit" class="btn btn-primary btn-round"/>
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
