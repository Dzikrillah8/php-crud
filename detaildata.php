<?php

// menghubungkan ke file config.php
require 'config.php';

// ambil data dari URL
$id = $_GET['id'];

//query data siswa berdasarkan id
$siswa = query("SELECT * FROM siswa WHERE id = $id")[0];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Detail Data Siswa</title>

    <style>

@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}

        body {
  width: 100%;
  min-height: 100vh;
  background-color: #E4E9BE;
  background-position: center;
  background-size: cover;
  justify-content: center;
  align-items: center;
}

.container {
  width: 600px;
  min-height: 100px;
  background: #fff;
  border-radius: 10px;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
  padding: 20px 10px;
  margin: 0 auto;
  
}

     h1 {
      text-align: center;
     }

     .judul {
      margin-top:30px;
      margin-bottom: 15px;
     }

     .aksi {
      float: right;
      width: 50%;
      border-radius: 5px;
      padding: 20px;
      margin: 0 auto 30px;
     } 

     .ubah {
      background-color: #A2B38B;
      color: white;
      border: none;
      padding: 7px 11px;
      border-radius: 18px;
      cursor: pointer;
      margin-right: 20px 

     }

     .ubah:hover {
      background-color: #A4BC92;
     }

     .hapus {
      background-color: #E6BA95;
      color: white;
      border: none;
      padding: 7px 11px;
      border-radius: 18px;
      cursor: pointer;
      margin-right: 30px;
     }

     .hapus:hover {
      background-color: #e7ca98;
     }

     .formulir {
      width: 50%;
      border-radius: 5px;
      background-color: #e0e0e0;
      padding: 20px;
      margin: 0 auto;
     }

     input[type=text] {
      /* width: 65%;
      padding: 12px 20px;
      margin: 0px 0;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box; */
      padding: 10px 15px;
      width: 75%;
      box-sizing: border-box;
      border: 1px solid #a2b38b;
      border-radius: 4px;
      outline-color: #a2b38b;
     }

     form {
      display: grid;
      grid-template-columns: 200px 1fr;
     }

     label {
      margin: 12px 0 12px 85px;
      grid-column: 1 / 2;
     }

     input, img {
      grid-column: 2 / 3;
     }

     .gambar {
      width: 150px;
     }
</style>
</head>
<body>

<h1 class="judul"> Detail Data Siswa</h1>

<div class="container">
    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $siswa['id']; ?>">
        <label for="nama">Nama : </label>
        <input required type="text" name="nama" id="nama" value="<?= $siswa['nama']; ?>">
        <br>
        <label for="kelas">Kelas : </label>
        <input required type="text" name="kelas" id="kelas" value="<?= $siswa['kelas']; ?>">
        <br>
        <label for="telepon">Telepon : </label>
        <input required type="text" name="telepon" id="telepon" value="<?= $siswa['telepon']; ?>">
        <br>
        <label for="alamat">Alamat : </label>
        <input required type="text" name="alamat" id="alamat" value="<?= $siswa['alamat']; ?>">
        <br>
        <label for="gambar">Gambar : </label>
        <img src="images/<?= $siswa['gambar']; ?>" alt="" class="gambar">
        
        
        
    </form>
</div>
</body>
</html>