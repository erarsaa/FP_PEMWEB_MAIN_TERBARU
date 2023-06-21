<?php
  include  '../koneksi.php';
  session_start();
  $admin=$_SESSION['admin'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    MM COFFEE
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- POP UP TAMBAH ORDER -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <!-- SIDEBAR -->
    <div class="sidebar" data-color="white" data-active-color="danger">
      <!-- HEADER SIDEBAR -->  
      <div class="logo">
        <a href="transaction.php" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="../assets/img/logo-small.png">
          </div>
          <!-- <p>CT</p> -->
        </a>
        <a href="transaction.php" class="simple-text logo-normal">
          MM COFFEE
        </a>
      </div>

      <div class="sidebar-wrapper">
          <ul class="nav">
            <li>
              <a href="./index.php">
                <i class="nc-icon nc-bank"></i>
                <p>Dashboard</p>
              </a>
            </li>
            <li class="active">
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
      
      <div class="content">
        <div class="row"> 
            <div class="col-lg-3 col-md-5 col-sm-5">
              <!-- Button trigger modal -->
              <div class="col-md-12">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createOrder">
                  Create Order
                </button>
              </div>

              <!-- POP UP CREATE ORDER -->
              <div class="modal fade" id="createOrder" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered d-flex align-items-center justify-content-center">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="createOrderLabel">Create Order</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <?php
                      $update=$dbh->query("ALTER TABLE `order` AUTO_INCREMENT = 1;");
                    ?>
                    <form method="POST" action="transaction.php">
                      <div class="modal-body">
                        <div class="mb-3">
                          <label for="orderID" class="form-label">Order ID</label>
                          <?php
                            $result = $dbh->query("SELECT * FROM `order` ORDER BY `order_id` DESC LIMIT 1");
                            if ($result->rowCount() > 0) {
                              while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                $OrderId = ($row["order_id"]+1);
                          ?>
                          <input type="text" name="order_id" class="form-control" value="<?php echo $OrderId; ?>" readonly>
                          <?php
                              }
                            }
                          ?>
                        </div>
                        <div class="mb-3">
                          <label for="customerName" class="form-label">Nama Pelanggan</label>
                          <input type="text" name="customerName" class="form-control" id="customerName" placeholder="Nama Pelanggan">
                        </div>
                        <div>
                          <label for="tanggal" class="form-label">Tanggal</label>
                          <input type="datetime-local" name="tanggal">
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" name="createorder">Create</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- end pop up -->
              <!-- INSERT DATA ORDER (CUSTOMER) -->
              <?php
                if (isset($_POST['createorder'])) {
                  // Mengambil nilai dari form
                  $customer = $_POST['customerName'];
                  $tanggal = $_POST['tanggal'];
                  // Menjalankan query INSERT
                  $insert_customer = $dbh->prepare("INSERT INTO `order` (`date`, `harga_total`,`customer`,`metode_pembayaran`) 
                                                VALUES ('$tanggal','0','$customer','-')");
                  if (!$insert_customer->execute()) {
                    echo '<script>alert("Customer gagal ditambahkan");</script>';
                  } 
                }
              ?>
            </div>
        </div>

        <!-- TABEL -->
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">DAFTAR ORDER</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th class="text-center">No</th>
                      <th class="text-center">Tanggal</th>
                      <th class="text-center">Order ID</th>
                      <th class="text-center">Customer</th>
                      <th class="text-center">Harga Total</th>
                      <th class="text-center">Metode Pembayaran</th>
                      <th class="text-center">Aksi</th>
                    </thead>
                    <tbody>
                      <tr>
                        <?php
                          $view = $dbh->query("SELECT * FROM `order` ORDER BY `order_id` DESC;");
                          if($view->rowCount()>0){
                            $no=1;
                            while($data = $view->fetch()){
                        ?>
                          <tr>
                            <td class="text-center"><?php echo $no++; ?></td>
                            <td class="text-center"><?php echo $data['date'];?></td>
                            <td class="text-center"><?php echo $data['order_id'];?></td>
                            <td class="text-center"><?php echo $data['customer'];?></td>
                            <td class="text-center"><?php echo $data['harga_total'];?></td>
                            <td class="text-center"><?php echo $data['metode_pembayaran'];?></td>
                            <td class="text-center">
                              <a href='order.php?edit=<?php echo $data["order_id"]; ?>' class="btn btn-success">Edit</a>
                              <a href='invoiceView.php?order_id=<?php echo $data['order_id']; ?>&ACTION=VIEW' class="btn btn-warning" target="_blank">Print</a> &nbsp;&nbsp; 
                            </td>
                          </tr>
                        <?php
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
        <!-- end tabel tampil -->
      </div>
      <!-- akhir content -->
      <footer class="footer footer-black footer-white">
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
  <!-- Insert data pop up -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/demo/demo.js"></script>
  <script src="../assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script><!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  

</body>



</html>