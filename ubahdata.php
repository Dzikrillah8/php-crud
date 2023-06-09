<?php

session_start();

//menghubungkan ke file config.php
require 'config.php';

//cek apakah sudah pernah login
if(!isset ($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}

//ambil data dari url
$id = $_GET["id"];

//query data berdasarkan id
$siswa = query("SELECT * FROM siswa WHERE id = $id")[0];

//cek apakah tombol submit sudah diklik atau belum
if(isset($_POST['submit'])) {

    //cek apakah data berhasil diubah atau tidak
    if(ubah($_POST) > 0 ) {
        echo "<script> alert('Data Berhasil Diubah!'); document.location.href = 'datasiswa.php';
        </script>" ;
    } else {
        echo "<script> alert('Data Gagal Diubah!'); var id = '<?php echo $id ?>' </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Siswa</title>

    <style>

@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

* {
  margin: 10;
  padding: 10;
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
  width: 500px;
  min-height: 100px;
  background: #fff;
  border-radius: 10px;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
  padding: 25px 25px;
  margin: 0 auto;
  
}

        h1 {
            text-align: center;
        }

        .judul {
            margin-top: 30px;
            margin-bottom: 30px;
        }

        .add {
            background-color: #A2B38B;
            color: white;
            border: none;
            padding: 6px 15px;
            border-radius: 20px;
            cursor: pointer;
        }

        .add:hover {
            background-color: #A4BC92;
        }

        div {
            width: 60%;
            border-radius: 5px;
            background-color: #e0e0e0;
            padding: 20px;
            margin: 0 auto;
        }

        input[type=text], input[type=file] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #a2b38b;
            border-radius: 4px;
            box-sizing: border-box;
            outline-color: #a2b38b;
        }
        

    </style>
</head>
<body>
    
        <h1 class= "judul"> Ubah Data Siswa </h1>

        <div class= "container">
            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $siswa['id']; ?>">
                <input type="hidden" name="gambarLama" value="<?= $siswa['gambar']; ?>">
                <label for="nama"> Nama : </label>
                <input require type="text" name="nama" id="id" value="<?= $siswa['nama']; ?>">
                <br>
                <label for="nama"> Kleas : </label>
                <input require type="text" name="kelas" id="kelas" value="<?= $siswa['kelas']; ?>">
                <br>
                <label for="nama"> No. Telepon : </label>
                <input require type="text" name="telepon" id="telepon" value="<?= $siswa['telepon']; ?>">
                <br>
                <label for="nama"> Alamat : </label>
                <input require type="text" name="alamat" id="alamat" value="<?= $siswa['alamat']; ?>">
                <br>
                <label for="gambar"> Gambar: </label>
                <img src="img/<?= $siswa['gambar']; ?>" alt="" width="100px">
                <input type="file"class="custom-file-input" name="gambar" id="gambar">
                <br>
                <button class="add" type="submit" name="submit">Ubah</button>
            </form>
        </div>
</body>
</html>