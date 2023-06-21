<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    MM Coffee
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        <a href="dashboard.php" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="../assets/img/logo-small.png">
          </div>
          <!-- <p>CT</p> -->
        </a>
        <a href="dashboard.php" class="simple-text logo-normal">
          MM COFFEE
          <!-- <div class="logo-image-big">
            <img src="../assets/img/logo-big.png">
          </div> -->
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
        <li class="active">
            <a href="./dashboard.php">
              <i class="nc-icon nc-bank"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li>
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
            <a class="navbar-brand" href="javascript:;">Dashboard</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form>
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
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-2">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-app text-warning"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-10">
                    <div class="numbers">
                      <p class="card-category">Produk terjual</p>
                      <p class="card-title"><?php
                                            include "../koneksi.php";
                                            $query = "SELECT SUM(quantity) as Jumlah FROM order_detail;";
                                            $result = mysqli_query($koneksi, $query);
                                            $row = mysqli_fetch_array($result);
                                            echo $row["Jumlah"];
                                            ?>
                      <p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-2">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-money-coins text-success"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-10">
                    <div class="numbers">
                      <p class="card-category">Total Pemasukan</p>
                      <p class="card-title"><?php
                                            include "../koneksi.php";
                                            $query = "SELECT SUM(harga_total) as Jumlah FROM `order`;";
                                            $result = mysqli_query($koneksi, $query);
                                            $row = mysqli_fetch_array($result);
                                            echo number_format($row['Jumlah'], 0, ',', '.');
                                            ?>
                      <p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-2">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-money-coins text-danger"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-10">
                    <div class="numbers">
                      <p class="card-category">Total Pengeluaran</p>
                      <p class="card-title"><?php
                                            include "../koneksi.php";
                                            $query = "SELECT SUM(harga_beli) as Jumlah FROM stok_brg;";
                                            $result = mysqli_query($koneksi, $query);
                                            $row = mysqli_fetch_array($result);
                                            echo number_format($row['Jumlah'], 0, ',', '.');
                                            ?>
                      <p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-2">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-chart-bar-32 text-primary"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-10">
                    <div class="numbers">
                      <p class="card-category">Laba/Rugi</p>
                      <p class="card-title"><?php
                                            include "../koneksi.php";
                                            $query = "SELECT ((SELECT SUM(harga_total) FROM `order`) - (SELECT SUM(harga_beli) FROM stok_brg)) AS total;";
                                            $result = mysqli_query($koneksi, $query);
                                            $row = mysqli_fetch_array($result);
                                            echo number_format($row['total'], 0, ',', '.');
                                            ?>
                      <p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-title">GRAFIK PENJUALAN VS PEMBELIAN</h5>
                <p class="card-category">PERIODE TAHUN <?php
                                                        if (isset($_GET['tahun'])) {
                                                          $tahun = $_GET['tahun'];
                                                          // Lakukan sesuatu dengan nilai tahun yang didapatkan
                                                          echo $tahun;
                                                        }
                                                        ?></p>
              </div>
              <div class="card-body">
                <canvas id="speedChart" width="400" height="100"></canvas>
              </div>
              <div class="card-footer">
                <div class="chart-legend">
                  <i class="fa fa-circle text-info"></i> Penjualan
                  <i class="fa fa-circle text-warning"></i> Pembelian
                </div>
                <hr />
                <div class="card-stats">
                  <form method="GET">
                    <div class="row">
                      <div class="col-3">
                        <select class="form-control" id="tahun" name="tahun">
                          <option value="">Pilih Tahun</option>
                          <?php
                          include "../koneksi.php";
                          $tahun = "SELECT DISTINCT YEAR(date_update) as year FROM stok_brg;";
                          $query_tahun = mysqli_query($koneksi, $tahun);
                          while ($row = mysqli_fetch_array($query_tahun)) {
                            $selected = ($row['year'] == '2023') ? 'selected' : '';
                            echo '<option value="' . $row['year'] . '" ' . $selected . '>' . $row['year'] . '</option>';
                          }
                          ?>
                        </select>
                      </div>
                      <div class="col-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </div>
                  </form>
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
                <li>Creative Tim</li>
                <li>Blog</li>
                <li>Licenses</li>
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
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script><!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      <?php
      include "../koneksi.php";
      $year = $_GET['tahun'];
      $bulan = "SELECT DISTINCT MONTHNAME(`date`) AS nama_bulan FROM `order`  WHERE YEAR(`date`) = '$year';";
      $i = 0;
      $query_bulan = mysqli_query($koneksi, $bulan);
      $jumlah_bulan = mysqli_num_rows($query_bulan);
      $chart_bulan = "";
      while ($row = mysqli_fetch_array($query_bulan)) {
        if ($i < $jumlah_bulan) {
          $chart_bulan .= '"';
          $chart_bulan .= $row['nama_bulan'];
          $chart_bulan .= '",';
          $i++;
        } else {
          $chart_bulan .= '"';
          $chart_bulan .= $row['nama_bulan'];
          $chart_bulan .= '"';
        }
      }

      $amount = "SELECT SUM(harga_total) AS total, MONTHNAME(`date`) AS nama_bulan FROM `order` WHERE YEAR(`date`) = '$year' GROUP BY MONTH(`date`) ORDER BY MONTH(`date`);";
      $a1 = 1;
      $query_amount = mysqli_query($koneksi, $amount);
      $jumlah_amount = mysqli_num_rows($query_amount);
      $chart_amount = "";
      while ($row1 = mysqli_fetch_array($query_amount)) {
        if ($a1 < $jumlah_amount) {
          $chart_amount .= $row1['total'];
          $chart_amount .= ',';
          $a1++;
        } else {
          $chart_amount .= $row1['total'];
        }
      }

      $amount1 = "SELECT SUM(harga_beli) AS total, MONTHNAME(`date_update`) AS nama_bulan FROM `stok_brg` WHERE YEAR(`date_update`) = '$year' GROUP BY MONTH(`date_update`) ORDER BY MONTH(`date_update`);";
      $a2 = 1;
      $query_amount1 = mysqli_query($koneksi, $amount1);
      $jumlah_amount1 = mysqli_num_rows($query_amount1);
      $chart_amount1 = "";
      while ($row2 = mysqli_fetch_array($query_amount1)) {
        if ($a2 < $jumlah_amount1) {
          $chart_amount1 .= $row2['total'];
          $chart_amount1 .= ',';
          $a2++;
        } else {
          $chart_amount1 .= $row2['total'];
        }
      }
      ?>
      var objek = {
        initChartsPages: function() {
          var chartColor = "#FFFFFF";

          var speedCanvas = document.getElementById("speedChart");

          var dataFirst = {
            data: [<?php echo $chart_amount1; ?>],
            fill: false,
            borderColor: '#fbc658',
            backgroundColor: 'transparent',
            pointBorderColor: '#fbc658',
            pointRadius: 4,
            pointHoverRadius: 4,
            pointBorderWidth: 8,
          };

          var dataSecond = {
            data: [<?php echo $chart_amount; ?>],
            fill: false,
            borderColor: '#51CACF',
            backgroundColor: 'transparent',
            pointBorderColor: '#51CACF',
            pointRadius: 4,
            pointHoverRadius: 4,
            pointBorderWidth: 8
          };

          var speedData = {
            labels: [<?php echo $chart_bulan; ?>],
            datasets: [dataFirst, dataSecond]
          };

          var chartOptions = {
            legend: {
              display: false,
              position: 'top'
            }
          };

          var lineChart = new Chart(speedCanvas, {
            type: 'line',
            hover: false,
            data: speedData,
            options: chartOptions
          });
        }
      };

      objek.initChartsPages();
    });
  </script>
</body>

</html>