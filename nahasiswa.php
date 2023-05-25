<?php
$host      = "localhost";
$user      = "root";
$pass      = "";
$db        = "mahasiswa";

$query = "SELECT * FROM students";
$koneksi   = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) {
    die("gagal");
}
$id ="";
$nama     = "";
$nim    = "";
$jurusan  = "";

if (isset($_POST['simpan'])) {
    $id = $_POST['id'];
    $nama      = $_POST['nama'];
    $nim     = $_POST['nim'];
    $jurusan   = $_POST['jurusan'];

    if ($id && $nama && $niml && $jurusan) {
        $sqli = "insert into kontak(id,nama,nim,jurusan) values ('#id', '$nama', '$nim', '$jurusan')";
        $sq1  = mysqli_query($koneksi, $sqli);
        if ($sq1) {
            $sukses   = "berhasil memasukan data";
        } else {
            $error    = "gagal memasukan data";
        }
    } else {
        $error = "Silahkan masukan semua data";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .mx-auto {
            width: 800px;
        }

        .card {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="mx-auto">
        <!-- untuk memasukan data -->
        <div class="card">
            <div class="card-header">
                Creat / Edit data
            </div>
            <div class="card-body">
                <?php
                if ($error) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error ?>
                    </div>
                <?php
                }
                ?>
                <?php
                if ($sukses) {
                ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $sukses ?>
                    </div>
                <?php
                }
                ?>
                <form action="" method="POST">
                    <div class="mb-3 row">
                        <label for="id" class="col-sm-2 col-form-label">id</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id" name="id" value="<?= $id ?>">
                        </div>

                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $nama ?>">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="nim" class="col-sm-2 col-form-label">nim</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="email" name="nim" value="<?= $nim ?>">
                        </div>
                    
                
                    <div class="mb-3 row">
                            <label for="jurusan" class="col-sm-2 col-form-label">jurusan</label>
                            <div class="col-sm-10">
                                <select name="jurusan" class="form-control ms-1 mt-3" id="jurusan">
                                    <option value="">->Pilih jurusan<-< /option>
                                    <option value="RPL" <?php if ($jurusan == "Informatika") echo "selected" ?>>Informatika</option>
                                    <option value="RPL" <?php if ($jurusan == "Tekhnik Mesin") echo "selected" ?>>Tekhnik Mesin</option>
                                    <option value="RPL" <?php if ($jurusan == "Tekhnik Industri") echo "selected" ?>>Tekhnik Industri</option>
                                    <option value="RPL" <?php if ($jurusan == "Tekhnik Elektro") echo "selected" ?>>Tekhnik Elektro</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <input type="submit" name="simpan" value="simpan data" id="" class="btn btn-primary">
                        </div>
                </form>
            </div>
        </div>

        <!-- untuk mengeluarkan data -->
        <div class="card">
            <div class="card-header text-white bg-secondary">
                Data Mahasiswa
            </div>
            <div class="card-body">
                    
            </div>
        </div>
    </div>
</body>

</html>