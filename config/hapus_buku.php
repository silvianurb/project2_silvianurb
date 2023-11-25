<?php
require_once '../koneksi/koneksi.php';
$id = $_POST['id'];

try{
    $sql = 'DELETE FROM buku WHERE id = ?';
    $qonnect = $database_connection->prepare($sql);
    $qonnect->execute([$id]);
    echo "Data Berhasil Dihapus";
}catch (PDOException $err){
    die("Error deleting data: " . $err->getMessage());
}

?>
