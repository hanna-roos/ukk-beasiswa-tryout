<?php
include "../koneksi/config.php";

$ipk = rand(29,34)/10;
$disabled = "";

if($ipk<3){
    $disabled = "disabled";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Beasiswa</title>
</head>

<body>
    <form action="hasil.php" method="post" enctype="multipart/form-data">
        <table style="border : 1px solid black; width : 50%;">
            <th>
            <td style="border : 1px solid black">Pilihan Beasiswa</td>
            <td style="border : 1px solid black">
                <a href="index.php?aksi=daftar-beasiswa">
                    Daftar
                </a>
            </td>
            <td style="border : 1px solid black">
                <a href="hasil.php">Hasil</a>
            </td>
            </th>

            <tr>
                <td colspan="3">
                    <h1 style="text-align : center;">Daftar Beasiswa</h1>
                </td>
            </tr>
            <tr>
                <td colspan="2">Masukkan Nama</td>
                <td>
                    <input type="text" name="nama" style="width: 100%;">
                </td>
            </tr>
            <tr>
                <td colspan="2">Masukkan Email</td>
                <td>
                    <input type="text" name="email" style="width: 100%;">
                </td>
            </tr>
            <tr>
                <td colspan="2">Nomor HP</td>
                <td>
                    <input type="text" name="nomor_hp" style="width: 100%;">
                </td>
            </tr>
            <tr>
                <td colspan="2">Semester Saat Ini</td>
                <td>
                    <select name="semester" id="semester" style="width: 100%;">
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
                    <input type="text" value="<?php echo $ipk; ?>" readonly name="ipk" style="width: 100%;">
                </td>
            </tr>
            <tr>
                <td colspan="2">Pilihan Beasiswa</td>
                <td>
                    <select name="beasiswa" id="beasiswa" style="width: 100%;" <?php echo $disabled?>>
                        <option value="">Pilih Beasiswa</option>
                        <option value="beasiswa_nasional">beasiswa nasional</option>
                        <option value="beasiswa_internasional">beasiswa internasional</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2">Upload Berkas</td>
                <td>
                    <input type="file" name="upload_berkas" style="width: 100%;" <?php echo $disabled?>>
                </td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td>
                    <button type="submit" name="submit" value="<?php echo $ipk; ?>">Daftar</button>
                </td>
                <td>
                    <button type="reset">Batal</button>
                </td>
            </tr>
        </table>
    </form>
</body>

</html>