<?php
  // Menghubungkan ke database
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
    MM Coffee
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
    <div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        <a href="https://www.creative-tim.com" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="../assets/img/logo-small.png">
          </div>
          <!-- <p>CT</p> -->
        </a>
        <a href="https://www.creative-tim.com" class="simple-text logo-normal">
          ADMIN
          <!-- <div class="logo-image-big">
            <img src="../assets/img/logo-big.png">
          </div> -->
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li >
            <a href="./index.php">
              <i class="nc-icon nc-box-2"></i>
              <p>Stok</p>
            </a>
          </li>
          <li class="active">
            <a href="./product.php">
              <i class="nc-icon nc-box"></i>
              <p>Produk</p>
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
              <a class="navbar-brand" href="javascript:;">Produk</a>
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
        <!--Form Input-->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahProduct">
          Tambah Produk
        </button>
        <!-- Modal -->
        <div class="modal fade" id="tambahProduct" tabindex="-1" aria-labelledby="tambahProductLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="tambahProductLabel">Tambah Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form method="POST" action="product.php">
                  <div class="mb-3">
                    <label for="namaProduk" class="form-label">Nama Produk</label>
                    <input type="text" class="form-control" id="namaProduk" name="nama_produk">
                  </div>
                  <div class="mb-3">
                    <label for="harga" class="form-label">Harga Satuan</label>
                    <input type="number" class="form-control" id="harga" name="harga_satuan">
                  </div>
                  <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <?php
                      date_default_timezone_set("Asia/Jakarta");
                    ?>
                    <input type="datetime-local" class="form-control" value="<?php echo date('Y-m-d H:i:s');?>" name="tanggal"  readonly>
                  </div>
                  <button type="submit" class="btn btn-primary" name="tambahProduk">Simpan</button>
                </form>
              </div>
            </div>
          </div>
          <!-- INSERT DATA TAMBAH PRODUK -->
          <?php
            if (isset($_POST['tambahProduk'])) {
              // Mengambil nilai dari form
              $namaProduk = $_POST['nama_produk'];
              $harga_Satuan = $_POST['harga_satuan'];
              $tanggal = $_POST['tanggal'];
              // Menjalankan query INSERT
              $insert_produk = $dbh->prepare("INSERT INTO `produk` (`nama_produk`, `harga_satuan`, `stok`, `tgl_update`, `link_gambar`) 
              VALUES ('$namaProduk', '$harga_Satuan', '0', '$tanggal','')");
              if (!$insert_produk ->execute()) {
                echo '<script>alert("Data gagal disimpan");</script>';
              }
            }
          ?>
        </div>
        <!--End Form Input-->

        <!--Form Update-->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ubahProduct">
          Ubah Produk
        </button>
        <!-- Modal -->
        <div class="modal fade" id="ubahProduct" tabindex="-1" aria-labelledby="ubahProductLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="ubahProductLabel">Ubah Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form method="POST" action="product.php">
                  <div class="mb-3">
                    <label for="namaProduk" class="form-label">Nama Produk</label>
                    <br>
                    <script>
                      var hargaSatuanData = {
                        <?php
                          $getproduk = $dbh->query("SELECT * FROM produk");
                          while ($pr = $getproduk->fetch()) {
                            $produk_id = $pr['produk_id'];
                            $harga_satuan = $pr['harga_satuan'];
                            echo $produk_id.':'.$harga_satuan.',';
                          }
                        ?>
                      };
                      function updateHargaSatuan(){
                        var selectedOption = document.getElementById('produk_id').value;
                        var hargaSatuan = hargaSatuanData[selectedOption];
                        document.getElementById('harga_satuan').value = hargaSatuan;
                        hitungSubTotal();
                      }
                    </script>
                    
                    <select name="produk_id" id="produk_id" onchange="updateHargaSatuan()">
                      <?php
                        $getproduk = $dbh->query("SELECT * FROM produk");
                        while($pr = $getproduk->fetch()){
                          $produk_id=$pr['produk_id'];
                          $nama_produk=$pr['nama_produk'];
                          echo '<option value="'.$produk_id.'">'.$produk_id.'-'.$nama_produk.'</option>';
                        }
                      ?>
                    </select>
                    <br>
                    <br>
                    <label for="harga" class="form-label">Harga Satuan</label>
                    <input type="number" name="harga_satuan" class="form-control" id="harga_satuan">             
                  </div>
                  <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <?php
                      date_default_timezone_set("Asia/Jakarta");
                    ?>
                    <input type="datetime-local" class="form-control" name="tanggal" value="<?php echo date('Y-m-d H:i:s');?>" readonly>
                  </div>
                  <button type="submit" class="btn btn-primary" name="updateProduk">Simpan</button>
                </form>
              </div>
            </div>
          </div>
          <!-- UPDATE DATA TAMBAH PRODUK -->
          <?php
            if (isset($_POST['updateProduk'])) {
              // Mengambil nilai dari form
              $produk_id = $_POST['produk_id'];
              $harga_Satuan = $_POST['harga_satuan'];
              $tanggal = $_POST['tanggal'];
              // Menjalankan query UPDATE
              $update_produk = $dbh->prepare("UPDATE produk SET harga_satuan = '$harga_Satuan',tgl_update='$tanggal' WHERE produk_id='$produk_id'");
              if (!$update_produk ->execute()) {
                echo '<script>alert("Data gagal disimpan");</script>';
              }
            }
          ?>
        </div>
        <!--End Form Update-->
        <!--Table-->
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Produk</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th class="text-center">No.</th>
                      <th class="text-center">ID Produk</th>
                      <th class="text-center">Nama Produk</th>
                      <th class="text-center">Harga Satuan</th>
                      <th class="text-center">Stok</th>
                      <th class="text-center">Tanggal Update</th>
                      <!-- <th class="text-center">Aksi</th> -->
                    </thead>
                    <tbody>
                      <tr>
                        <?php
                          $view = $dbh->query("SELECT * FROM `produk`;");
                          if($view->rowCount()>0){
                            $no=1;
                            while($data = $view->fetch()){
                        ?>
                          <tr>
                            <td class="text-center"><?php echo $no++; ?></td>
                            <td class="text-center"><?php echo $data['produk_id'];?></td>
                            <td class="text-center"><?php echo $data['nama_produk'];?></td>
                            <td class="text-center"><?php echo $data['harga_satuan'];?></td>
                            <td class="text-center"><?php echo $data['stok'];?></td>
                            <td class="text-center"><?php echo $data['tgl_update'];?></td>
                            <!-- <td class="text-center"><a href='?produk_id=<!?php echo $data["produk_id"]; ?>' class="btn btn-danger">Delete</a></td> -->
                          </tr>
                        <?php
                            }
                          }
                        ?>
                        <!-- DELETE PRODUK -->
                        <!--?php
                          if (isset($_GET['produk_id'])) {
                            $deleteId = $_GET['produk_id'];
                            $delete = $dbh->query("DELETE FROM `produk` WHERE `produk_id` = '$deleteId'");
                            if (!$delete) {
                              echo '<script>alert("Gagal menghapus data");</script>';
                            } 
                          }
                        ?-->
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--End Table-->
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