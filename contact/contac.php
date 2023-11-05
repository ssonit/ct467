<?php
session_start();
include_once('./config/database.php');
if (isset($_POST['login'])) {
    
   // session_destroy();
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql_login = "SELECT * FROM taikhoan WHERE username=? AND password=?";
    $stmt = $pdo->prepare($sql_login);
    $stmt -> execute([$username,$password]);
    $result_login = $stmt->fetch();
    $count = $stmt ->rowCount();
    if ($count > 0) {
        $row_data = $result_login;
        $_SESSION['dangnhap'] = $row_data['username'];
        if ($row_data['admin'] > 0) {
            echo '<script>alert("Đăng nhập thành công tài khoản Admin")</script>';
            echo '<script>window.open("#","_self")</script>';
        } elseif ($row_data['admin'] == 0)
            echo '<script>alert("Đăng nhập thành công")</script>';
                echo '<script>window.open("#","_self")</script>';
    } else {
        echo '<script>alert("Tài khoản hoặc mật khẩu không đúng")</script>';
        echo '<script>window.open("#","_self")</script>';
    }
}
