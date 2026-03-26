<?php
include 'koneksi/config.php';
session_start();

if(isset($_POST['submit'])){

    $username = $_POST['username'];
    $pass = $_POST['password'];
    $role = $_POST['role'];

    $query = "SELECT * FROM users 
              WHERE username='$username' AND password='$pass' AND role='$role'";

    $result = mysqli_query($koneksi, $query);

    if(mysqli_num_rows($result) > 0){

        $row = mysqli_fetch_assoc($result);

        // simpan session
        $_SESSION['username'] = $row['username'];
        $_SESSION['role'] = $row['role'];

        // redirect based on role
        if($row['role'] == 'admin'){
            header("Location: admin/dashboard_admin.php");
        } else {
            header("Location: user/index.php");
        }

        exit();

    } else {
        $error[] = 'Incorrect username or password';
    }
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

        <h1>Login</h1>

        <form method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" required>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>

            <div class="form-group">
                <label>Semester</label>
                <select name="role" required>
                    <option value="">Pilih Role</option>
                    <option value="siswa">Siswa</option>
                    <option value="admin">Admin</option>
                </select>
            </div>

            <div class="buttons">
                <button type="submit" name="submit" class="submit-btn">Login</button>
                <button type="reset" class="reset-btn">Batal</button>
            </div>

        </form>

    </div>

</body>

</html>