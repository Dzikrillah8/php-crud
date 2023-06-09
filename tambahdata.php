<?php

session_start();

// menghubungkan ke file config.php
require 'config.php';

// cek apakah user sudah login
if( !isset($_SESSION["username"]) ) {
    header("Location: login.php");
    exit;
}

// cek apakah tombol submit sudah diklik atau belum
if(isset($_POST['submit'])) {

    // cek apakah data berhasil ditambahkan atau tidak
    if( tambah($_POST) > 0 ) {
        echo "<script>
                alert('Data berhasil ditambahkan'); 
                document.location.href = 'datasiswa.php';
              </script>";
    } else {
        echo "<script>
                alert('Data gagal ditambahkan'); 
                document.location.href = 'tambahdata.php';
              </script>";
    }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
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
            margin-bottom: 50px;
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

        label {
            margin-top: 10px;
            float: left;
            text-align: left;
            width: 100%;

        }

    

        /* div {
            width: 50%;
            border-radius: 10px;
            background-color: #fff;
            padding: 30px;
            margin: 0 auto;
        } */

        input {
            padding: 6px;
            width: 100%;
            box-sizing: border-box;
            border: 1px solid #a2b38b;
            border-radius: 4px;
            outline-color: #a2b38b;
        }

        .custom-file-input {
        color: #A2B38B;
        }
        .custom-file-input::-webkit-file-upload-button {
        visibility: hidden;
        }
        .custom-file-input::before {
        content: 'Select some files';
        color: #fff;
        display: inline-block;
        background: #A2B38B;
        border: 1px solid #999;
        border-radius: 10px;
        padding: 3px 8px;
        outline: none;
        white-space: nowrap;
        -webkit-user-select: none;
        cursor: pointer;
        /* text-shadow: 1px 1px #fff; */
        font-weight: 450;
        font-size: 10pt;
        }
        .custom-file-input:hover::before {
        border-color: #A4BC92;
        }
        .custom-file-input:active {
        outline: 0;
        }
        .custom-file-input:active::before {
        background: -webkit-linear-gradient(top, #e3e3e3, #f9f9f9); 
        }

        body {
        padding: 20px;
        }

        
    </style>
</head>
<body>
    
    <h1>Tambah Data Siswa</h1>

    <div class=container>
    <form action="" method="post" enctype="multipart/form-data">
    <!-- <table>
        <tr>
        <td width="130">Nama : </td>
        <td><input required type="text" name="nama" id="nama"></td>
        </tr>
        
        <tr>
        <td width="130">Kelas : </td>
        <td><input required type="text" name="kelas" id="kelas"></td>
        </tr>
        
        <tr>
        <td width="130">No. Telepon : </td>
        <td><input required type="text" name="telepon" id="telepon"></td>
        </tr>
        
        <tr>
        <td width="130">Alamat : </td>
        <td><input required type="text" name="alamat" id="alamat"></td>
        </tr>
        
        <tr>
        <td width="130">Gambar : </td>
        <td><input type="file" name="gambar" id="gambar"></td>
        </tr>
        
        
    </table> -->
    <div class=label>
        <label>Nama :</label>
        <input type="text" name="nama" autofocus="" required=""/>
    </div>
    <div>
        <label>Kelas :</label>
        <input type="text" name="kelas" autofocus="" required=""/>
    </div>
    <div>
        <label>No.Telepon :</label>
        <input type="text" name="telepon" autofocus="" required=""/>
    </div>
    <div>
        <label>Alamat :</label>
        <input type="text" name="alamat" autofocus="" required=""/>
    </div>
    <div>
        <label>Gambar :</label>
        <input type="file" class="custom-file-input" name="gambar" id="gambar"/>
    </div>
   <br>
    <button class="add" type="submit" name="submit">Save</button> 
    </form>
</div>

</body>
</html>