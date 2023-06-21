<?php
  include  '../koneksi.php';
  session_start();
  $admin=$_SESSION['admin'];
?>

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>MM Coffe</title>
    <meta
      content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no"
      name="viewport"
    />
    <!--     Fonts and icons     -->
    <link
      href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200"
      rel="stylesheet"
    />
    <link
      href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css"
      rel="stylesheet"
    />
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
          <a href="index.php" class="simple-text logo-mini">
            <div class="logo-image-small">
              <img src="../assets/img/logo-small.png" />
            </div>
            <!-- <p>CT</p> -->
          </a>
          <a
            href="index.php"
            class="simple-text logo-normal"
          >
            MM Coffe
          </a>
        </div>
        <div class="sidebar-wrapper">
          <ul class="nav">
            <li class="active">
              <a href="./index.php">
                <i class="nc-icon nc-bank"></i>
                <p>Dashboard</p>
              </a>
            </li>
            <li>
              <a href="./transaction.php">
                <i class="nc-icon nc-cart-simple"></i>
                <p>Transaction</p>
              </a>
            </li>
            <li>
              <a href="./history.php">
                <i class="nc-icon nc-tile-56"></i>
                <p>History Transaction</p>
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
              <a class="navbar-brand" href="javascript:;">Dashboard</a>
            </div>
            <button
              class="navbar-toggler"
              type="button"
              data-toggle="collapse"
              data-target="#navigation"
              aria-controls="navigation-index"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class="navbar-toggler-bar navbar-kebab"></span>
              <span class="navbar-toggler-bar navbar-kebab"></span>
              <span class="navbar-toggler-bar navbar-kebab"></span>
            </button>
            <div
              class="collapse navbar-collapse justify-content-end"
              id="navigation"
            >
              <form>
                <div class="input-group no-border">
                  <input
                    type="text"
                    value=""
                    class="form-control"
                    placeholder="Search..."
                  />
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <i class="nc-icon nc-zoom-split"></i>
                    </div>
                  </div>
                </div>
              </form>
              <ul class="navbar-nav">
                <li class="nav-item btn-rotate dropdown">
                  <a
                    class="nav-link dropdown-toggle"
                    href="http://example.com"
                    id="navbarDropdownMenuLink"
                    data-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                  >
                    <i class="nc-icon nc-bell-55"></i>
                    <p>
                      <span class="d-lg-none d-md-block">Some Actions</span>
                    </p>
                  </a>
                  <div
                    class="dropdown-menu dropdown-menu-right"
                    aria-labelledby="navbarDropdownMenuLink"
                  >
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

        <!-- content -->
        <div class="content">
        <div class="row">
          <div class="col-md-6 mt-4 mb-5">
            <div class="card" style="height: 20rem;">
              <div class="card-header">
                <h3 class="card-title">Items Terjual</h3>
                <hr />
                <!-- <p class="card-category">Today</p> -->
              </div>
              <div class="card-body numbers">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning mt-3" style="font-size: 5rem;">
                      <i class="nc-icon nc-bag-16 text-danger"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8 text-right">
                    <?php
                    $view = $dbh->query("SELECT SUM(quantity) AS qty_terjual
                                        FROM order_detail;");
                    if ($view->rowCount() > 0) {
                      $data = $view->fetch();
                      $total_terjual = $data['qty_terjual'];
                    ?>
                      <h3 class="mt-5"><?php echo $total_terjual; ?> Produk</h3>
                    <?php
                    }
                    ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end col -->
          <div class="col-md-6 mt-4 mb-5">
            <div class="card" style="height: 20rem";>
              <div class="card-header">
                <h3 class="card-title">Total Pembeli</h3>
                <hr />
              </div>
              <div class="card-body numbers">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning mt-3" style="font-size: 5rem;">
                      <i class="nc-icon nc-single-02 text-primary"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8 text-right">
                  <?php
                    $view = $dbh->query("SELECT COUNT(DISTINCT customer) AS jumlah_pembeli
                                        FROM `order`;");
                    if ($view->rowCount() > 0) {
                      $data = $view->fetch();
                      $jumlah_pembeli = $data['jumlah_pembeli'];
                  ?>
                      <h3 class="mt-5"><?php echo $jumlah_pembeli;?> Orang</h3>
                  <?php
                    }
                  ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end col -->
        </div>
        <!-- end row -->
        <div class="row">
          <div class="col-md-6">
            <div class="card" style="height: 20rem";>
              <div class="card-header">
                <h3 class="card-title">Total Pendapatan</h3>
                <hr />
              </div>
              <div class="card-body numbers">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning mt-3" style="font-size: 5rem;">
                      <i class="nc-icon nc-money-coins text-success"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8 text-right">
                  <?php
                    $view = $dbh->query("SELECT SUM(harga_total) AS total_pendapatan
                                        FROM `order`;");
                    if ($view->rowCount() > 0) {
                      $data = $view->fetch();
                      $total_pendapatan = $data['total_pendapatan'];
                  ?>
                      <h3 class="mt-5">Rp<?php echo $total_pendapatan; ?></h3>
                  <?php
                    }
                  ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <!-- end col -->
        <div class="col-md-6">
          <div class="card" style="height: 20rem";>
            <div class="card-header">
              <h3 class="card-title">3 Produk Best Seller</h3>
              <hr />
            </div>
            <div class="card-body">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning mt-3" style="font-size: 5rem;">
                      <i class="nc-icon nc-trophy text-warning"></i>
                    </div>
                  </div>
                    <div class="col-7 col-md-8 text-right">
                    <?php
                      $query = $dbh->query("SELECT produk_id, SUM(quantity) AS total_quantity
                                            FROM order_detail
                                            GROUP BY produk_id
                                            ORDER BY total_quantity DESC
                                            LIMIT 3;");

                      if ($query->rowCount() > 0) {
                        while ($data = $query->fetch()) {
                          $produk_id = $data['produk_id'];
                          $total_quantity = $data['total_quantity'];

                          // Mendapatkan informasi produk dari tabel produk
                          $produk_query = $dbh->query("SELECT nama_produk FROM produk WHERE produk_id = $produk_id");
                          $produk_data = $produk_query->fetch();
                          $nama_produk = $produk_data['nama_produk'];

                          ?><h3><?php echo $nama_produk?></h3>
                        <?php
                        }
                      }
                      ?>
                    </div>
                </div>
              </div>
          </div>
        </div>
        <!-- end col -->
        </div>
        <!-- akhir row -->
      </div>
        <!-- akhir content -->
        <footer class="footer footer-black footer-white">
          <div class="container-fluid">
            <div class="row">
              <nav class="footer-nav">
                <ul>
                  <li>
                    Creative Tim
                  </li>
                  <li>
                    Blog
                  </li>
                  <li>
                    Licenses
                  </li>
                </ul>
              </nav>
              <div class="credits ml-auto">
                <span class="copyright">
                  ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  , made with <i class="fa fa-heart heart"></i> by Creative Tim
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
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> -->
    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>
    <!-- Chart JS -->
    <script src="../assets/js/plugins/chartjs.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="../assets/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script
      src="../assets/js/paper-dashboard.min.js?v=2.0.1"
      type="text/javascript"
    ></script>
    <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
    <script src="../assets/demo/demo.js"></script>
    <script>
      $(document).ready(function () {
        // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
        demo.initChartsPages();
      });
    </script>
  </body>
</html>
