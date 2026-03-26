<?php
include "../koneksi/config.php";

if(isset($_POST['submit'])){
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $nomor_hp = $_POST['nomor_hp'];
    $semester = $_POST['semester'];
    $ipk = $_POST['ipk'];
    $beasiswa = isset($_POST['beasiswa']) ? $_POST['beasiswa'] : "";
    $nama_files = $_FILES['upload_berkas']['name'];
    $tmp = $_FILES['upload_berkas']['tmp_name'];

    move_uploaded_file($tmp,"../upload/".$nama_files);

    mysqli_query($koneksi, "INSERT INTO registrasi_beasiswa 
(nama,email,nomor_hp,semester,ipk,beasiswa,upload_berkas, status_ajuan) 
VALUES 
('$nama','$email','$nomor_hp','$semester','$ipk','$beasiswa','$nama_files', 'Belum Diverifikasi')");
}

$data = mysqli_query($koneksi, "SELECT * FROM registrasi_beasiswa");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pendaftaran</title>

    <style>
    body {
        font-family: Arial, sans-serif;
        background: #f4f6f9;
        margin: 0;
        padding: 0;
    }

    .container {
        width: 90%;
        max-width: 1000px;
        margin: 40px auto;
        background: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .nav {
        text-align: center;
        margin-bottom: 20px;
    }

    .nav a {
        margin: 0 15px;
        text-decoration: none;
        color: #007bff;
        font-weight: bold;
    }

    .nav a:hover {
        text-decoration: underline;
    }

    h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th {
        background: #007bff;
        color: white;
        padding: 10px;
    }

    td {
        padding: 10px;
        text-align: center;
    }

    tr:nth-child(even) {
        background: #f2f2f2;
    }

    tr:hover {
        background: #e9ecef;
    }

    a.file-link {
        color: #28a745;
        font-weight: bold;
        text-decoration: none;
    }

    a.file-link:hover {
        text-decoration: underline;
    }
    </style>
</head>

<body>

    <div class="container">

        <div class="nav">
            <a href="index.php">Daftar Beasiswa</a>
            <a href="hasil.php">Hasil</a>
        </div>

        <h2>Hasil Pendaftaran Beasiswa</h2>

        <table>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Nomor HP</th>
                <th>Semester</th>
                <th>IPK</th>
                <th>Beasiswa</th>
                <th>Berkas</th>
                <th>Status Ajuan</th>
            </tr>

            <?php
    $no = 1;
    while ($row = mysqli_fetch_array($data)){
    ?>

            <tr>
                <td><?= $no++; ?></td>
                <td><?= $row['nama']; ?></td>
                <td><?= $row['email']; ?></td>
                <td><?= $row['nomor_hp']; ?></td>
                <td><?= $row['semester']; ?></td>
                <td><?= $row['ipk']; ?></td>
                <td><?= $row['beasiswa']; ?></td>
                <td>
                    <a class="file-link" href="../upload/<?= $row['upload_berkas']; ?>" target="_blank">
                        Lihat Berkas
                    </a>
                </td>
                <td><?= $row['status_ajuan']; ?></td>
            </tr>

            <?php } ?>

        </table>

    </div>

</body>

</html>