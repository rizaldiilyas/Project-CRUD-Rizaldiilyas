<?php
// koneksi ke database
require "functions.php";

// ambil data di url
$id = $_GET['id'];

// query data siswa berdasarkan id
$sql = "SELECT * FROM latihan WHERE id = $id";
$siswa = mysqli_query($conn,$sql);
$result = mysqli_fetch_array($siswa);
if (!$result)
{
    echo "
        <script>
            alert('Data tidak ditemukan');
            document.location.href='index.php';
        </script>
        ";
}

// var_dump($siswa);

// cek apakah tombol submit sudah dipencet atau belum
if(isset($_POST['submit']) ) {
   
    // cek apakah data berhasil di update atau gagal
    if(ubah($_POST) > 0 ) {
        echo "
        <script>
            alert('Data berhasil di ubah');
            document.location.href='index.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Data berhasil di ubah');
            document.location.href='index.php';
        </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<head>
    <title>Update Data Siswa</title>
    <style>
        body {
            background-color: saddlebrown;
        }

        div {
            width: 350px;
            height: 400px;
            border-radius: 10px;
            background-color: lightblue;
            position: relative;
            left: 510px;
        }
        h1 {
            color: cyan;
            text-align: center;
            font-family: cursive;
            text-shadow: 1px 1px 2px black, 0 0 25px greenyellow, 0 0 5px black;
            margin-top: 50px;
        }
        button {
            margin-left: 120px;
        }
        div ul li {
            margin-left: 10px;
        }
        div ul li input {
            width: 280px;
        }
    </style>
</head>

<body>
    <h1>Update Data Siswa</h1>
    <form action="" method="POST">
        <input type="hidden" name="id" value="<?= $result['id']; ?>">
        <div>
        <ul>
            <li>
                <label for="nik">ID : </label>
                <input type="text" name="id" id="id" required value="<?= $result["id"] ?>">
            </li>
            <li>
                <label for="nama">NAMA : </label>
                <input type="text" name="nama" id="nama" required value="<?= $result["nama"] ?>">
            </li>
            <li>
                <label for="kelas">NIM : </label>
                <input type="text" name="NIM" id="kelas" required value="<?= $result["NIM"] ?>">
            </li>
            <li>
                <label for="jurusan">JURUSAN : </label>
                <input type="text" name="jurusan" id="jurusan" required value="<?= $result["jurusan"] ?>">
            </li>
            
            <button type="submit" name="submit" class="btn btn-outline-success">Update Data</button>
        </div>
    </form>
</body>
</html>