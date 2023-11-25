<?php
require '../koneksi/koneksi.php';

$judulbuku = $_POST['jdlbuku'];
$penulis = $_POST['penuliss'];
$penerbit = $_POST['penerbitt'];
$kategori = $_POST['kategorii'];
$photo_name = $_FILES['filePhoto']['name'];
$photo_tmp = $_FILES['filePhoto']['tmp_name'];

if (!empty($_POST['id'])){
    //kalau id tidak kosong, update
    try {
        move_uploaded_file($photo_tmp, '../photo/' . $photo_name);
        $sql = 'UPDATE `buku` SET `judulbuku` = ?, `penulis` = ?, `penerbit` = ?, `kategori` = ?, `photo` = ? WHERE id = ?';
        $qonnect = $database_connection->prepare($sql);
        $qonnect->execute([$judulbuku, $penulis, $penerbit, $kategori, 'photo/' . $photo_name, $_POST['id']]);

        echo "Data Berhasil Diperbaharui!";
    } catch (PDOException $err) {
        die("Error updating data: " . $err->getMessage());
    }
} else {
    //kalau kosong, insert
    try {
        move_uploaded_file($photo_tmp, '../photo/' . $photo_name);
        $sql = 'INSERT INTO `buku` (`judulbuku`, `penulis`, `penerbit`, `kategori`, `photo`) VALUES (?, ?, ?, ?, ?)';
        $qonnect = $database_connection->prepare($sql);
        $qonnect->execute([$judulbuku, $penulis, $penerbit, $kategori, 'photo/' . $photo_name]);

        echo "Data Berhasil Ditambahkan!";
    } catch (PDOException $err) {
        die("Error inserting data: " . $err->getMessage());
    }
}
?>