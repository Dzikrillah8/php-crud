<?php

include 'config.php';
session_start();

if (isset($_SESSION['username'])) {
  header("Location: datasiswa.php");
}

if (isset($_POST['submit'])) {
    global $conn;

    $username = $_POST['username'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    if ($password == $cpassword) {
        $sql = "SELECT * FROM user WHERE username='$username'";
        $result = mysqli_query($conn, $sql);
        if (!$result -> num_rows > 0) {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `user` (username, password) VALUES ('$username', '$password')";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                echo "<script>alert('Registrasi berhasil dilakukan!')<script/>";
                $username = "";
                $password = "";
                $_POST['password'] = "";
                $_POST['cpassword'] = "";
            } else {
                echo "<script>alert('Terjadi kesalahan')</script>";
            }
        } else {
            echo "<script>alert('Akun telah terdaftar')</script>";
        }
    }  else {
        echo "<script>alert('Password incorrect')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Halaman Register</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}

body {
  width: 100%;
  min-height: 100vh;
  background-color: #E4E9BE;
  background-position: center;
  background-size: cover;
  display: flex;
  justify-content: center;
  align-items: center;
}

.container {
  width: 400px;
  min-height: 400px;
  background: #fff;
  border-radius: 15px;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
  padding: 40px 30px;
}

.container .login-text {
  color: #111;
  font-weight: 500;
  font-size: 1.1rem;
  text-align: center;
  margin-bottom: 20px;
  display: block;
  text-transform: capitalize;
}

.container .login-email .input-group {
  width: 100%;
  height: 50px;
  margin-bottom: 25px;
}

.container .login-email .input-group input {
  width: 100%;
  height: 100%;
  border: 2px solid #e7e7e7;
  padding: 15px 20px;
  font-size: 1rem;
  border-radius: 30px;
  background: transparent;
  outline: none;
  transition: 0.2s;
}

.container .login-email .input-group input:focus,
.container .login-email .input-group input:valid {
  border-color: #a2b38b;
}

.container .login-email .input-group .btn {
  display: block;
  width: 100%;
  padding: 15px 20px;
  text-align: center;
  border: none;
  background: #a2b38b;
  outline: none;
  border-radius: 30px;
  font-size: 1.2rem;
  color: #fff;
  cursor: pointer;
  transition: 0.2s;
}

.container .login-email .input-group .btn:hover {
  transform: translateY(-5px);
  background: #a2b38b;
}

.login-register-text {
  color: #111;
  font-weight: 600;
}

.login-register-text a {
  text-decoration: none;
  color: #75865d;
}

.container-logout {
  width: 500px;
  min-height: 200px;
  background: #fff;
  border-radius: 5px;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
  padding: 40px 30px;
}

.container-logout .login-email .input-group .btn {
  display: block;
  width: 100%;
  padding: 15px 20px;
  text-align: center;
  border: none;
  background: #a2b38b;
  outline: none;
  border-radius: 30px;
  font-size: 1.2rem;
  color: #fff;
  cursor: pointer;
  transition: 0.3s;
  margin-top: 20px;
}

.container-logout .login-email .input-group .btn:hover {
  transform: translateY(-5px);
  background: #a2b38b;
}

@media (max-width: 430px) {
  .container {
    width: 300px;
  }
}
    </style>
</head>
<body>
    <div class="container">
        <form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;" >New Account</p>
            <div class="input-group">
                <input type="text" placeholder="Username" name="username" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password" name="password" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Confirm Password" name="cpassword" required>
            </div>
            <div class="input-group">
                <button name="submit" class="btn">Create</button>
            </div>
            <p class="login-register-text">sudah punya akun? <a href="login.php"> Log in </a></p>         
</form>
</div>
</body>
</html>