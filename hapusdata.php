<?php

session_start();

require 'config.php';

if(!isset($_SESSION["username"]) ) {
    header("Location: login.php");
    exit;
}

$id = $_GET['id'];

if(hapus($id) > 0) {
    echo "<script>alert('Data Telah Dihapus'); document.location.href = 'datasiswa.php';
    </script>";
} else {
    echo "<script>alert('Data Gagal Dihapus!'); document.location.href = 'tambahdata.php';
    </script>";
}

?>