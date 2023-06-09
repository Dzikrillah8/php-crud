<?php


$conn = mysqli_connect("localhost", "root", "", "datasiswa");

function query($query) {
    global $conn;

    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    };
    return $rows;
}

if (!$conn) {
    die("<script>alert('gagal tersambung dengan database')<scrip/>");
}

function tambah($data) {
    global $conn;

    // ambil data dari tiap elemen dalam form
    $nama = htmlspecialchars($data["nama"]);
    $kelas = htmlspecialchars($data["kelas"]);
    $telepon = htmlspecialchars($data["telepon"]);
    $alamat = htmlspecialchars($data["alamat"]);
    // $gambar = htmlspecialchars($data["gambar"]);


    //upload foto
    $gambar = upload();
    if( !$gambar ) {
        return false;
    }

    $query = "INSERT INTO siswa VALUES (NULL, '$nama', '$kelas', '$telepon', '$alamat','$gambar')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM siswa WHERE id=$id");

    return mysqli_affected_rows($conn);
}

function ubah($data) {
    global $conn;

    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $kelas = htmlspecialchars($data["kelas"]);
    $telepon = htmlspecialchars($data["telepon"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    if( $_FILES['gambar']['error'] === 4 ) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }

    $query = "UPDATE siswa
            SET nama = '$nama',
                kelas = '$kelas',
                telepon = '$telepon',
                alamat = '$alamat',
                gambar = '$gambar'
            WHERE id = $id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload() {
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    //cek apakah yang diupload adalah foto
    $ekstensiFotoValid = ['jpg', 'jpeg', 'png'];
    $ekstensiFoto = explode('.', $namaFile);
    $ekstensiFoto = strtolower(end($ekstensiFoto));
    if( !in_array($ekstensiFoto, $ekstensiFotoValid)) {
        echo "<script>
                alert('yang anda masukkan bukan foto');
                </script>";
        return false;
    }

    // cek jika ukuran foto terlalu besar
    if ($ukuranFile > 1000000) {
        echo "<script>
                alert('ukuran gambar terlalu besar');
            </script>";
        return false;
    }

    // generate nama foto baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiFoto;
    move_uploaded_file($tmpName, 'images/' . $namaFileBaru);

    // lolos pengecekan, foto diupload
    return $namaFileBaru;

}
?>