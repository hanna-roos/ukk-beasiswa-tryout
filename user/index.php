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

    <style>
    body {
        font-family: Arial, sans-serif;
        background: #f4f6f9;
    }

    .container {
        width: 450px;
        margin: 50px auto;
        background: #fff;
        padding: 25px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        text-align: center;
        margin-bottom: 20px;
    }

    .nav {
        text-align: center;
        margin-bottom: 20px;
    }

    .nav a {
        margin: 0 10px;
        text-decoration: none;
        color: #007bff;
        font-weight: bold;
    }

    .nav a:hover {
        text-decoration: underline;
    }

    .form-group {
        margin-bottom: 15px;
    }

    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    input,
    select {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    input[readonly] {
        background: #eee;
    }

    .buttons {
        display: flex;
        gap: 10px;
    }

    button {
        flex: 1;
        padding: 10px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .submit-btn {
        background: #28a745;
        color: white;
    }

    .submit-btn:hover {
        background: #218838;
    }

    .reset-btn {
        background: #dc3545;
        color: white;
    }

    .reset-btn:hover {
        background: #c82333;
    }

    .disabled-msg {
        color: red;
        text-align: center;
        margin-bottom: 10px;
    }
    </style>
</head>

<body>

    <div class="container">

        <div class="nav">
            <a href="index.php">Pilihan Beasiswa</a>
            <a href="#">Daftar</a>
            <a href="hasil.php">Hasil</a>
        </div>

        <h1>Daftar Beasiswa</h1>

        <?php
        if($ipk < 3){
            echo '<p class="disabled-msg">IPK Tidak Memenuhi Syarat</p>';
        }
        ?>

        <form action="hasil.php" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" required>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" required>
            </div>

            <div class="form-group">
                <label>Nomor HP</label>
                <input type="text" name="nomor_hp" pattern="[0-9]+" required>
            </div>

            <div class="form-group">
                <label>Semester</label>
                <select name="semester" required <?php echo $disabled?>>
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
            </div>

            <div class="form-group">
                <label>IPK</label>
                <input type="text" value="<?php echo $ipk?>" readonly name="ipk">
            </div>

            <div class="form-group">
                <label>Pilihan Beasiswa</label>
                <select name="beasiswa" <?php echo $disabled?> required>
                    <option value="">Pilih Beasiswa</option>
                    <option value="beasiswa_nasional">Beasiswa Nasional</option>
                    <option value="beasiswa_internasional">Beasiswa Internasional</option>
                </select>
            </div>

            <div class="form-group">
                <label>Upload Berkas</label>
                <input type="file" required <?php echo $disabled?>>
            </div>

            <div class="buttons">
                <button type="submit" class="submit-btn" <?php echo $disabled?>>Daftar</button>
                <button type="reset" class="reset-btn">Batal</button>
            </div>

        </form>

    </div>

</body>

</html>