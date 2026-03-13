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
    <title>Document</title>
</head>

<body>
    <table border="1" width="80%">
        <tr>
            <td colspan="3">Pilihan beasiswa</td>
            <td colspan="3">
                <a href="index.php">Daftar Beasiswa</a>
            </td>

            <td colspan="3">
                <a href="hasil.php">Hasil</a>
            </td>
        </tr>
        <td colspan="9">
            <h2 style="text-align:center;">Hasil Pendaftaran Beasiswa</h2>
        </td>
        <tr>
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
            <td><?php echo $no++; ?></td>
            <td><?php echo $row['nama']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['nomor_hp']; ?></td>
            <td><?php echo $row['semester']; ?></td>
            <td><?php echo $row['ipk']; ?></td>
            <td><?php echo $row['beasiswa']; ?></td>
            <td>
                <a href="../upload/<?php echo $row['upload_berkas']; ?>" target="_blank">
                    Lihat Berkas
                </a>
            </td>
            <td><?php echo $row['status_ajuan']; ?></td>
        </tr>

        <?php
              }
            ?>
    </table>
</body>

</html>