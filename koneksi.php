<?php
$host = 'localhost'; // nama host database
$dbname = 'coffee_shop'; // nama database
$username = 'root'; // nama pengguna database
$password = ''; // kata sandi database
$koneksi = mysqli_connect("localhost", "root", "", "coffee_shop");

try {
    // membuat koneksi ke database
    $dsn = "mysql:host=$host;dbname=$dbname";
    $dbh = new PDO($dsn, $username, $password);

    // Set error mode to exception
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // echo "Koneksi ke database berhasil ->" .;
} catch (PDOException $e) {
    echo "Koneksi ke database gagal: " . $e->getMessage();
}
?>
