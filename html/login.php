<?php
session_start();
include '../config/connection.php';

if (isset($_POST['post'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

   
    $sql = "SELECT * FROM users WHERE user_name='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $username;
            header("Location: D:\xampp\htdocs\web\hethongquanly.php"); 
            exit();
        } else {
            echo "Mật khẩu không đúng.";
        }
    } else {
        echo "Tên người dùng không tồn tại.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="bootstraps css/bootstrap.min.css">
    <style>
        body {
            background: url('assets/img/dai-hoc-mo-dia-chat.jpg') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .center {
            background-color: #FFFFFF;
            padding: 20px;
            border-radius: 8px;
            
        }
        input[type="text"], input[type="password"]{
            width: 244px;
        }
        input[type="submit"]{
            width: 120px;
        }
        input[type="password"]{
            margin-bottom: 8px;
        }
       
    </style>
</head>

<body>
    <div class="center" id="login_div">
        <h3 align="center">Dang nhap</h3>
        <form  action="hethongquanly.php" method="post">
            <label for="username">Username:</label><br>
            <input type="text"  name="username"><br>

            <label for="password">Password:</label><br>
            <input type="password"  name="password"><br>

            <input type="submit" name="submit" value="Đăng nhập">
            
        </form>
    </div>
</body>

</html>