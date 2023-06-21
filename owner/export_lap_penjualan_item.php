<!DOCTYPE html>
<html>

<head>
    <title>Export Data Laporan Penjualan Per Item</title>
</head>

<body>
    <style type="text/css">
        body {
            font-family: sans-serif;
        }

        table {
            margin: 20px auto;
            border-collapse: collapse;
        }

        table th,
        table td {
            border: 1px solid #3c3c3c;
            padding: 3px 8px;

        }

        a {
            background: blue;
            color: #fff;
            padding: 8px 10px;
            text-decoration: none;
            border-radius: 2px;
        }
    </style>

    <?php
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=Laporan Penjualan Per Item.xls");
    ?>

    <center>
        <h1>Laporan Penjualan Per Item</h1>
    </center>

    <table border="1">
        <tr>
            <th>Action</th>
            <th>Order ID</th>
            <th>Barang</th>
            <th>Pelanggan</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Subtotal</th>
        </tr>
        <?php
        // koneksi database
        include "../koneksi.php";
        $query = "SELECT od.order_id,p.nama_produk,o.customer,od.quantity,od.harga_satuan,od.sub_total FROM order_detail od JOIN `order` o ON od.order_id=o.order_id JOIN produk p ON od.produk_id = p.produk_id;";
        $result = mysqli_query($koneksi, $query);
        $no = 1;
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $row['order_id']; ?></td>
                <td><?php echo $row['nama_produk']; ?></td>
                <td><?php echo $row['customer']; ?></td>
                <td><?php echo $row['quantity']; ?></td>
                <td><?php echo number_format($row['harga_satuan'], 0, ',', '.'); ?></td>
                <td><?php echo number_format($row['sub_total'], 0, ',', '.'); ?></td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>