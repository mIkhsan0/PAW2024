<?php
include 'session.php';
include 'config.php';

$stmt = $conn->prepare("SELECT username FROM users WHERE id = ?");
$stmt->bind_param("i", $_SESSION['user_id']);
$stmt->execute();
$stmt->bind_result($username);
$stmt->fetch();
$stmt->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
</head>
<body>
<h2>Selamat Datang, <?php echo $username; ?></h2>
<a href="list_barang.php">Lihat Daftar Barang</a><br><br>
<a href="logout.php">Logout</a>
</body>
</html>
