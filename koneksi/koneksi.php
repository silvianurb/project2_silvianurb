<?php
    $database_hostname = 'localhost';
    $database_username = 'root';
    $database_password = '';
    $database_name = 'db_buku';    
    $database_port = 3306;

    try{
        $database_connection = new PDO("mysql:host=$database_hostname;port=$database_port;dbname=$database_name",
        $database_username, $database_password);
        $cek = "Koneksi Berhasil";
        echo $cek;
    }catch(PDOException $x){
        die($x ->getMessage());
    }
?>