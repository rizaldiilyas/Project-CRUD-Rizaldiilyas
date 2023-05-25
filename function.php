<?php
// koneksi
$host      = "localhost";
$user      = "root";
$pass      = "";
$db        = "crud";

$conn   = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    die("gagal");
}

// function query
function query ($query) {
    global $conn;
    $result = mysqli_query($conn,$query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    } 
    return $rows;
}

// function tambah data
function tambah ($data){
    global $conn;
     $id     = htmlspecialchars($data['nik']);
     $nama    = htmlspecialchars($data['nama']);
     $nim  = htmlspecialchars($data['kelas']);
     $jurusan = htmlspecialchars($data['jurusan']);

     
    $query = "INSERT INTO latihan VALUES ('', '$nik', '$nama', '$kelas', '$jurusan', '$email', '$gambar')";
    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}

// function hapus data
function hapus($id) {
    global $conn; 
    mysqli_query($conn, "DELETE FROM latihan WHERE id = $id");

    return mysqli_affected_rows($conn);
}

// function ubah data
function ubah($data) {
    global $conn;
     $id      = $data['id'];
     $nama    = htmlspecialchars($data['nama']);
     $nim   = htmlspecialchars($data['nim']);
     $jurusan = htmlspecialchars($data['jurusan']);
     
     $query = "UPDATE latihan SET 
                id      = '$nik',
                nama     = '$nama',
                nim    = '$kelas',
                jurusan  = '$jurusan',
                WHERE id = $id  
            ";
    mysqli_query($conn,$query);
    
    return mysqli_affected_rows($conn);
}

?>