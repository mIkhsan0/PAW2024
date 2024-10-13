<?php
include 'session.php';
require 'config.php';

if (isset($_GET['id'])) {
    $id     = intval($_GET['id']);
    $stmt = $conn->prepare("SELECT * FROM barang WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $barang = $result->fetch_assoc();

    if (!$barang) {
        echo "Barang tidak ditemukan.";
        exit();
    }
} else {
    header("Location: list_barang.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Detail Barang</title>
</head>
<body>
<h2><?php echo $barang['nama_barang']; ?></h2>
<p>Deskripsi: <?php echo $barang['deskripsi']; ?></p>
<p>Harga: Rp <?php echo number_format($barang['harga'], 2, ',', '.'); ?></p>
<a href="list_barang.php">Kembali ke Daftar Barang</a> | <a href="logout.php">Logout</a>
</body>
</html>
