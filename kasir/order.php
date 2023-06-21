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
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    MM COFFEE
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
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
            <a class="navbar-brand" href="javascript:;">Payment</a>
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
        <?php

        if (isset($_GET['edit'])) {
            $editOrderID = $_GET['edit'];
            $_SESSION['orderID'] = $editOrderID;
            $sql = $dbh->query("SELECT * FROM `order` WHERE `order_id` = '$editOrderID'");
            $data = $sql->fetch(PDO::FETCH_ASSOC);
        }
        
        ?>
          <div class="row">
            <div class="col-md-6">
              <div class="card card-plain">
                <div class="card-header" style="display: flex; gap: 35px; align-items: center;">
                  <h4 class="card-title">Order ID</h4>
                  <?php if (isset($data['order_id'])): ?>
                    <input type="text" name="ORDER_ID" value="<?php echo $data['order_id']; ?>" readonly style="height: 30px; border: 0; box-shadow: rgba(0,0,0,0.1)">
                  <?php endif; ?>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card card-plain">
                <div class="card-header" style="display: flex; gap: 20px; align-items: center;">
                  <h4 class="card-title">Tanggal</h4>
                  <?php if (isset($data['date'])): ?>
                    <input type="text" name="tanggal" value="<?php echo $data['date']; ?>" readonly style="height: 30px; border: 0; box-shadow: rgba(0,0,0,0.1);">
                  <?php endif; ?>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card card-plain">
                <div class="card-header" style="display: flex; gap: 20px; align-items: center;">
                  <h4 class="card-title">Customer</h4>
                  <?php if (isset($data['customer'])): ?>
                    <input type="text" name="customer" value="<?php echo $data['customer']; ?>" readonly style="height: 30px; border: 0; box-shadow: rgba(0,0,0,0.1);">
                  <?php endif; ?>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card card-plain">
                <!-- Button trigger modal -->
                <div class="col-md-4">
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Tambah Order
                  </button>
                </div>
              </div>
              <!-- POP UP TAMBAH ORDER -->
              <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered d-flex align-items-center justify-content-center">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Order</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="order.php?edit=<?php echo $editOrderID; ?>">
                      <div class="modal-body">
                        <div class="mb-3">
                          <label for="orderID" class="form-label">Order ID</label>
                          <input type="text" name="order_id" class="form-control" value="<?php echo $_GET['edit']; ?>" readonly>
                        </div>
                        <div class="mb-3">
                          <label for="produk" class="form-label">Pilih Produk</label>
                          <script>
                            var hargaSatuanData = {
                              <?php
                                $getproduk = $dbh->query("SELECT * FROM `produk` WHERE `stok`>0");
                                while ($pr = $getproduk->fetch()) {
                                  $produk_id = $pr['produk_id'];
                                  $harga_satuan = $pr['harga_satuan'];
                                  echo $produk_id.':'.$harga_satuan.',';
                                }
                              ?>
                            }
                            function updateHargaSatuan(){
                              var selectedOption = document.getElementById('produk_id').value;
                              var hargaSatuan = hargaSatuanData[selectedOption];
                              document.getElementById('harga_satuan').value = hargaSatuan;
                              hitungSubTotal();
                            }
                          </script>
                          
                          <select name="produk_id" id="produk_id" onchange="updateHargaSatuan()">
                            <?php
                              $getproduk = $dbh->query("SELECT * FROM `produk` WHERE `stok`>0");
                              while($pr = $getproduk->fetch()){
                                $produk_id=$pr['produk_id'];
                                $nama_produk=$pr['nama_produk'];
                                echo '<option value="'.$produk_id.'">'.$produk_id.'-'.$nama_produk.'</option>';
                              }
                            ?>
                          </select>
                          <input type="number" name="harga_satuan" class="form-control" id="harga_satuan" placeholder="Harga Satuan" readonly>
                        </div>
                        <div class="mb-3">
                          <label for="quantity" class="form-label">Quantity</label>
                          <input type="number" name="quantity" class="form-control" id="quantity" placeholder="quantity" required onchange="validasiQuantity(event)">
                          <script>
                            function validasiQuantity(event) {
                              const input = event.target;
                              const quantity = parseInt(input.value);
                              if (quantity < 1) {
                                input.value = 1; // Mengatur nilai input menjadi 0 jika nilai negatif
                              }
                              hitungSubTotal();
                            }
                            function hitungSubTotal(){
                              var quantity = parseInt(document.getElementById('quantity').value);
                              var hargaSatuan = parseFloat(document.getElementById('harga_satuan').value);
                              var subtotal = quantity*hargaSatuan;
                              document.getElementById('subtotal').value = subtotal;
                            }
                          </script>
                        </div>
                        <div class="mb-3">
                          <label for="subtotal" class="form-label">Subtotal</label>
                          <input type="number" name="subtotal" class="form-control" id="subtotal" placeholder="Subtotal" readonly>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-success" name="tambahorder">Tambah</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- end pop up -->
            </div>
            <!-- INSERT DATA ORDER_DETAIL -->
            <?php
              if (isset($_POST['tambahorder'])) {
                // update auto increment order_detail
                $update=$dbh->query("ALTER TABLE `order_detail` AUTO_INCREMENT = 1;");
                // Mengambil nilai dari form
                $produk_id = $_POST['produk_id'];
                $order_id = $_POST['order_id'];
                $quantity = $_POST['quantity'];
                $harga_satuan = $_POST['harga_satuan'];
                $subtotal = $_POST['subtotal'];
                
                // Menjalankan query INSERT
                $insert_order = $dbh->prepare("INSERT INTO order_detail (produk_id, order_id, admin_id, quantity, harga_satuan, sub_total) 
                                              VALUES ('$produk_id', '$order_id', '$admin','$quantity','$harga_satuan','$subtotal')");                  
                if (!$insert_order->execute()) {
                  echo '<script>alert("Data gagal disimpan");</script>';
                }
              }
            ?>
          </div>
          <!-- TABEL -->
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Detail Order</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th class="text-center">No.</th>
                        <th class="text-center">Item</th>
                        <th class="text-center">Harga</th>
                        <th class="text-center">Qty</th>
                        <th class="text-center">Sub Total</th>
                        <th class="text-center">Aksi</th>
                      </thead>
                      <tbody>
                        <tr>
                          <?php
                            $no=1;
                            $editOrderID=$_SESSION['orderID'];
                            $view = $dbh->query("SELECT `od`.`orderDetail_id`,`p`.`nama_produk`,`od`.`harga_satuan`,`od`.`quantity`,`od`.`sub_total` 
                            FROM `order_detail` `od` 
                            JOIN `produk` `p` ON `od`.`produk_id`=`p`.`produk_id`
                            WHERE `od`.`order_id`=$editOrderID");
                            if($view->rowCount() > 0){
                              while($row = $view->fetch()){ 
                          ?>
                            <tr>
                              <td class="text-center"><?php echo $no++; ?></td>
                              <td class="text-center"><?php echo $row['nama_produk'];?></td>
                              <td class="text-center"><?php echo $row['harga_satuan'];?></td>
                              <td class="text-center"><?php echo $row['quantity'];?></td>
                              <td class="text-center"><?php echo $row['sub_total'];?></td>
                              <td class="text-center">
                                <a href="?orderDetail_id=<?php echo $row["orderDetail_id"]; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data?')">
                                  Delete
                                </a>
                              </td>
                            </tr>
                          <?php 
                              }
                            }
                          ?>
                          <!-- DELETE ORDER_DETAIL -->
                          <?php
                            if (isset($_GET['orderDetail_id'])) {
                              $editOrderID=$_SESSION['orderID'];
                              $deleteId = $_GET['orderDetail_id'];
                              $delete = $dbh->query("DELETE FROM `order_detail` WHERE `orderDetail_id` = '$deleteId'");
                              if ($delete) {
                                echo '<script>document.location="order.php?edit=' . $editOrderID . '";</script>';
                              }
                              else{
                                echo '<script>alert("Gagal menghapus data");</script>';
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

        <?php
        $editOrderID=$_SESSION['orderID'];
        ?>

        <form action="order.php?edit=<?php echo $editOrderID; ?>" method="POST" onsubmit="return validasiForm()">
          <input type="hidden" name="editOrderID" value="<?php echo $editOrderID; ?>">
          <div class="col-md-4">
            <table width = "430">
              <th style="vertical-align: middle; margin:0;"><h5 class="card-title"> Metode Pembayaran</h5> </th>
              <th><input type="text" name="metodePembayaran" id="metodePembayaran" style="height: 30px; border: 0; box-shadow: rgba(0,0,0,0.1)"> </th>
            </table>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="card card-plain">
                <div class="card-header">
                  <div class="mandiri" onclick="setMetodeValue('Mandiri')" style="width: 100%; background-color: white; height: 85px; display: flex; align-items: center; justify-content: center; border: 1.2px solid rgba(0, 0, 0, 0.105); cursor: pointer;">
                    <img src="../assets/img/logo/mandiri.webp" alt="" style="width: 150px; margin: 0 auto;">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-plain">
                <div class="card-header">
                <div class="BNI" onclick="setMetodeValue('BNI')" style="width: 100%; background-color: white; height: 85px; display: flex; align-items: center; justify-content: center; border: 1.2px solid rgba(0, 0, 0, 0.105); cursor: pointer;">
                    <img src="../assets/img/logo/BNI.png" alt="" style="width: 150px; margin: 0 auto;">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-plain">
                <div class="card-header">
                <div class="BRI" onclick="setMetodeValue('BRI')" style="width: 100%; background-color: white; height: 85px; display: flex; align-items: center; justify-content: center; border: 1.2px solid rgba(0, 0, 0, 0.105); cursor: pointer;">
                    <img src="../assets/img/logo/BRI.png" alt="" style="width: 150px; margin: 0 auto;">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-plain">
                <div class="card-header">
                  <div class="Dana" onclick="setMetodeValue('Dana')" style="width: 100%; background-color: white; height: 85px; display: flex; align-items: center; justify-content: center; border: 1.2px solid rgba(0, 0, 0, 0.105);">
                    <img src="../assets/img/logo/Dana.webp" alt="" style="width: 130px; margin: 0 auto; cursor: pointer;">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-plain">
                <div class="card-header">
                  <div class="OVO" onclick="setMetodeValue('OVO')" style="width: 100%; background-color: white; height: 85px; display: flex; align-items: center; justify-content: center; border: 1.2px solid rgba(0, 0, 0, 0.105);">
                    <img src="../assets/img/logo/OVO.png" alt="" style="width: 130px; margin: 0 auto; cursor: pointer;">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-plain">
                <div class="card-header">
                  <div class="BCA" onclick="setMetodeValue('BCA')" style="width: 100%; background-color: white; height: 85px; display: flex; align-items: center; justify-content: center; border: 1.2px solid rgba(0, 0, 0, 0.105);">
                    <img src="../assets/img/logo/BCA.png" alt="" style="width: 130px; margin: 0 auto; cursor: pointer;">
                  </div>
                </div>
              </div>
            </div>
            <script>
              function setMetodeValue(metode) {
                var metodePembayaran = document.getElementById('metodePembayaran');
                metodePembayaran.value = metode;
              }
            </script>
            <div class="col-md-12">
              <div class="card card-plain">
                <div class="card-header" style="display: flex; gap: 30px; align-items: center;">
                  <h4 class="card-title"> Harga Total</h4>
                  <?php
                    $editOrderID=$_SESSION['orderID'];
                    $view = $dbh->query("SELECT SUM(`sub_total`) AS total FROM `order_detail` WHERE `order_id`=$editOrderID;");
                    $row = $view->fetch();
                    $total = $row['total'];
                  ?>
                  <input type="number" name="total" id="total" value="<?php echo $total; ?>" readonly style="height: 30px; border: 0; box-shadow: rgba(0,0,0,0.1)">
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="card card-plain">
                <div class="card-header" style="display: flex; gap: 100px; align-items: center;">
                  <h4 class="card-title"> Bayar</h4>
                  <input type="number" name="bayar" id="bayar" placeholder="Bayar" onchange="hitungKembalian()" style="height: 30px; border: 0; box-shadow: rgba(0,0,0,0.1);">
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="card card-plain">
                <div class="card-header" style="display: flex; gap: 40px; align-items: center;">
                  <h4 class="card-title"> Kembalian</h4>
                  <script>
                    function hitungKembalian(){
                      var bayar = parseInt(document.getElementById('bayar').value);
                      var total = parseFloat(document.getElementById('total').value);
                      var kembalian = bayar-total;
                      document.getElementById('kembalian').value = kembalian;
                    }
                    function validasiForm(){
                      var kembalian = parseInt(document.getElementById('kembalian').value);
                      if (kembalian < 0) {
                        alert('Uang kurang!'); // Menampilkan notifikasi jika kembalian negatif
                        return false;
                      } else {
                        alert('Transaksi selesai!');
                        return true;
                      }
                    }
                  </script>
                  <input type="number" name="kembalian" id="kembalian" placeholder="Kembalian" readonly style="height: 30px; border: 0; box-shadow: rgba(0,0,0,0.1);">
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="card card-plain" style="float: left;">
                <div class="card-header" style="display: flex; gap: 30px; align-items: center;">
                    <button type="submit" class="btn btn-primary" name="payment">Selesai</button>
              </div>
            </div>
        </div>
          </div>
        </form>
        <!-- END FORM -->
        <!-- UPDATE DATA ORDER -->
        <?php
          if (isset($_POST['payment'])) {
            // Mengambil nilai dari form
            $ORDER_ID= $_POST['editOrderID'];
            $total=$_POST['total'];
            $metode_pembayaran=$_POST['metodePembayaran'];
            echo $metode_pembayaran;
            // Menjalankan query UPDATE
            $update_order = $dbh->query("UPDATE `order` SET `harga_total`='$total',`metode_pembayaran`='$metode_pembayaran' WHERE `order_id`='$ORDER_ID'");
            if ($update_order) {
              echo '<script>window.location.href = "transaction.php";</script>';
            } 
          }
        ?>
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
  <!-- Insert data pop up -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script><!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
</body>

</html>