<?php

//halaman login: validasi email dan pass untuk login
include 'config.php' ;
session_start();

//cek apakah user sudah login sebelumnya
if (isset($_SESSION['username'])) {
  header("Location: datasiswa.php");
}

if (isset($_POST['submit'])) {
    global $conn;

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user WHERE username= '$username'";
    $result = mysqli_query($conn, $sql );
    if($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);

    if(password_verify($password, $row['password'])) {
      $_SESSION['submit'] = true;
      $_SESSION["username"] = $username;

      //url (setelah login)
      echo "<script>alert('Berhasil Login'); document.location.href='datasiswa.php'; </script>" ;
      }
    } else {
        echo "<script>alert('Email atau Password salah. Silahkan coba lagi!')<script/>";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <title>Halaman Login</title>
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
            
        <p class="login-text" style="font-size: 2rem; font-weight: 800;">Your Account</p>
            <div class="input-group">
                <input type="username" placeholder="Username" name="username" >
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password" name="password" >
            </div>
            <div class="input-group">
                <button name="submit" class="btn">Log in</button> 
            </div>
            <p class="login-register-text"> belum punya akun? <a href="register.php">Sign up</a></p>
        </form>
    </div>

</body>
</html>