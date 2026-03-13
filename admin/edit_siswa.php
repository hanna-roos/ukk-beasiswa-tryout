<?php
include "../koneksi/config.php";

if(isset($_POST['edit'])){
    $id_beasiswa = $_POST['id_beasiswa'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $nomor_hp = $_POST['nomor_hp'];
    $semester = $_POST['semester'];
    $ipk = $_POST['ipk'];
    $beasiswa = isset($_POST['beasiswa']) ? $_POST['beasiswa'] : "";
    $nama_files = $_FILES['upload_berkas']['name'];
    $tmp = $_FILES['upload_berkas']['tmp_name'];

    move_uploaded_file($tmp,"../upload/".$nama_files);
    mysqli_query($koneksi, "UPDATE registrasi_beasiswa SET 
        nama = '$nama', 
         email = '$email', 
         nomor_hp = '$nomor_hp', 
         semester = '$semester', 
         ipk = '$ipk', 
        beasiswa = '$beasiswa', 
         upload_berkas = '$nama_files' WHERE id_beasiswa = '$id_beasiswa'");

}

$data = mysqli_query($koneksi, "SELECT * FROM registrasi_beasiswa");
$row = mysqli_fetch_array($data);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Beasiswa</title>
</head>

<body>
    <form action="" method="post" enctype="multipart/form-data">
        <table style="border : 1px solid black; width : 50%;">
            <th>
            <td style="border : 1px solid black">Pilihan Beasiswa</td>
            <td style="border : 1px solid black">
                <a href="index.php?aksi=daftar-beasiswa">
                    Daftar
                </a>
            </td>
            <td style="border : 1px solid black">
                <a href="dashboard_admin.php">Hasil</a>
            </td>
            </th>

            <tr>
                <td colspan="3">
                    <h1 style="text-align : center;">Edit Beasiswa</h1>
                </td>
            </tr>
            <tr>
                <td colspan="2">Masukkan Nama</td>
                <td>
                    <input type="text" name="nama" style="width: 100%;" value="<?php echo $row['nama']; ?>">
                </td>
            </tr>
            <tr>
                <td colspan="2">Masukkan Email</td>
                <td>
                    <input type="text" name="email" style="width: 100%;" value="<?php echo $row['email']; ?>">
                </td>
            </tr>
            <tr>
                <td colspan="2">Nomor HP</td>
                <td>
                    <input type="text" name="nomor_hp" style="width: 100%;" value="<?php echo $row['nomor_hp']; ?>">
                </td>
            </tr>
            <tr>
                <td colspan="2">Semester Saat Ini</td>
                <td>
                    <select name="semester" id="semester" style="width: 100%;" value="<?php echo $row['semester']; ?>">
                        <option value="">Pilih Semester</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2">IPK</td>
                <td>
                    <input type="text" value="<?php echo $row['ipk']; ?>" readonly name="ipk" style="width: 100%;"">
                </td>
            </tr>
            <tr>
                <td colspan="2">Pilihan Beasiswa</td>
                <td>
                    <select name="beasiswa" id="beasiswa" style="width: 100%;" value="<?php echo $row['beasiswa']; ?>">
                    <?php
                     if($row['beasiswa'] == 'beasiswa_nasional'){
                        echo "<option value =".$row['beasiswa']." selected> beasiswa nasional </option>";
                        echo "<option value = 'beasiswa_internasional'> beasiswa internasional </option>";
                     } else if($row['beasiswa'] == 'beasiswa_internasional') {
                        echo "<option value =".$row['beasiswa']." selected> beasiswa internasional </option>";
                        echo "<option value ='beasiswa_nasional'> beasiswa nasional </option>";
                      
                     }
                     ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2">Upload Berkas</td>
                <td>
                    <img src="<?php echo $row['upload_berkas'] ?>" alt="" style="width: 100px";>
                    <input type="hidden" name="upload_berkas"/>
                </td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td>
                    <button type="submit" name="edit">Edit</button>
                </td>
                <td>
                    <button type="reset">Batal</button>
                </td>
            </tr>
        </table>
    </form>
</body>

</html>