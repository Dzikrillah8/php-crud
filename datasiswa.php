<?php 


session_start();
require 'config.php';
 
//ambil data dari tabel siswa
$siswa = query("SELECT id, nama, kelas, telepon, gambar FROM siswa");

//cek apakah user sudah login
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>

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

.containertable {
  background: #fff;
  
  
}
.container {
  width: 900px;
  min-height: 100px;
  border-radius: 10px;
  background: #fff;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
  padding: 20px 15px;
  margin: 0 auto;
  
}

         .header {
            width: 100%;
            /* height: 100px; */
            display: block;
            /* border-bottom: 45px solid #9DAD7F; */
            background-color: #A2B38B;
        }

        .header h1 {
            padding-top: 10px;
            padding-bottom: 1px;
            text-align: left;
            margin-left: 14px;
        }

        /* .header a button {
            float: right;
            margin-top: -48px;
            margin-right: 25px;
            font-size: 15px;
        } */

        .greet {
            color: #fff;
        }

        a {
            text-decoration: none;
        }

        .signout {
            display: block;
            padding: 2px 15px;
            text-align: center;
            border: none;
            background: #E6BA95;
            outline: none;
            border-radius: 30px;
            font-size: 16px;
            color: #fff;
            cursor: pointer;
            transition: 0.2s;
            width: 85px;
            height: 35px;
            float: right;
            margin-top: -48px;
            margin-right: 25px;
            font-size: 15px;
        }

        .signout:hover {
            background-color: #e9c2a3;
        }

        .judul {
            text-align: center;
            color: #000000;
            margin-left: 8px;
            /* margin-top: -40px; */
        }

        input[type=text] {
            /* float: right; */
            margin-top: -47px;
            width: 180px;
            height: 18px;
            margin-right: 50px;
        }

        .judul button {
            float: right;
            margin-top: -47px;
            height: 25px;
            margin-right: 6px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, td {
            border: 1px solid;
            text-align: center;
            padding-top: 8px;
            padding-bottom: 7px;
        }

        .add {
            /* margin-top: 15px;
            margin-left: 15px;
            margin-bottom; -6px; */
            margin-bottom: 10px;
            background-color: #E6BA95;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 20px;
            cursor: pointer;
        }

        .add:hover {
            background-color: #e9c2a3;
        }

        .detail {
            padding: 3px 10px;
            border: none;
            background: #E6BA95;
            outline: none;
            border-radius: 30px;
            font-size: 15px;
            color: #fff;
            cursor: pointer;
            transition: 0.2s;
        }

        .detail:hover {
            background-color: #e7ca98;
        }

        th {
            background-color: #A2B38B;
            color: black;
            border: 1px solid;
        }
        /* h2 {
            text-align: center;
        } */

    </style>
</head>
<body>
    
<div class="header">
    <h1 class="greet"> Welcome, <?= $_SESSION["username"]; ?>!</h1>

    <a href="logout.php">
        <button class="signout">Logout</button>
    </a> 
</div>



<br><br>

<div class="container">
    <div class="container-header">
        <div class="judul">
            <h2 class="judul">Data Siswa</h2>
        </div>
        <a href="tambahdata.php">
            <button class="add">Add</button>
        </a>
    </div>
    <div class="containertable">
<table align="center">
        <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Aksi</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach($siswa as $row) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $row["nama"]; ?></td>
                <td><?= $row["kelas"]; ?></td>
                
                <td> 
                    <a href="detaildata.php?id=<?= $row["id"]; ?>" style="text-decoration: none; color: black;">
                    <!-- <button class="detail1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg></button> -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
                    </a>    
                    <a href="ubahdata.php?id=<?= $row['id']; ?>" style="text-decoration: none; color: black; margin-left: 10px;">
                    <!-- <button class="ubah">edit</button> -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                    </a>
                    <a href="hapusdata.php?id=<?= $row['id']; ?>" style="text-decoration: none; color: red; margin-left: 10px;" onclick="return confirm('apakah anda ingin menghapus data ini, <?= $row['nama']; ?>?');">
                    <!-- <button class="hapus">delete</button> -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                    </a>
                </td>
            </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
    </table>
</div> 
</div>

</body>
</html>