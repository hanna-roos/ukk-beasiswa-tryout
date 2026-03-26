<?php
include "../koneksi/config.php";

if(isset($_POST['accept'])){
    $id_beasiswa = $_POST['id_beasiswa'];

    mysqli_query($koneksi, "UPDATE registrasi_beasiswa 
    SET status_ajuan='Sudah Diverifikasi' 
    WHERE id_beasiswa='$id_beasiswa'");
}

if(isset($_POST['decline'])){
    $id_beasiswa = $_POST['id_beasiswa'];

    mysqli_query($koneksi, "UPDATE registrasi_beasiswa 
    SET status_ajuan='Pendaftaran Ditolak' 
    WHERE id_beasiswa='$id_beasiswa'");
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
        width: 100%;
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

    button {
        padding: 6px 10px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    button[name="accept"] {
        background: #28a745;
        color: white;
    }

    button[name="decline"] {
        background: #dc3545;
        color: white;
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
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Nomor HP</th>
                <th>Semester</th>
                <th>IPK</th>
                <th>Beasiswa</th>
                <th>Berkas</th>
                <th>Status Ajuan</th>
                <th>Aksi</th>
            </tr>

            <?php
    $no = 1;
    while ($row = mysqli_fetch_array($data)){
    ?>

            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $row['id_beasiswa']; ?></td>
                <td><?php echo $row['nama']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['nomor_hp']; ?></td>
                <td><?php echo $row['semester']; ?></td>
                <td><?php echo $row['ipk']; ?></td>
                <td><?php echo $row['beasiswa']; ?></td>
                <td>
                    <a class="file-link" href="../upload/<?php echo $row['upload_berkas']; ?>" target="_blank">
                        Lihat Berkas
                    </a>
                </td>
                <td><?php echo $row['status_ajuan']; ?></td>
                <td>
                    <form method="POST">
                        <input type="hidden" name="id_beasiswa" value="<?php echo $row['id_beasiswa']; ?>">

                        <button type="submit" name="accept">Accept</button>
                        <button type="submit" name="decline">Decline</button>
                    </form>
                </td>
            </tr>

            <?php } ?>

        </table>

    </div>

</body>

</html>