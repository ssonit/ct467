
<?php 
    session_start();
    require_once './config/database.php';;
    if (!isset($_SESSION['dangnhap'])){
        echo'<div style="width: 35rem; height:100rem;">
        <p>Bạn chưa đăng nhập !</p>
        <a class="btn btn-primary" href="login.php">Đăng Nhập</a>
        <a class="btn btn-primary" href="register.php">Đăng Kí</a>
    </div>';
    }
    else  
        if(isset($_GET['id']) && ($_GET['id'])){
        try{
            $query="call add_order('1','{$_GET["id"]}','1')";
            $sth = $pdo->exec($query);
        }
        catch(Exception $ex){
            $error_msg =  $ex->getMessage();
            echo "Thông báo lỗi  ".$error_msg."";

        }
}  
?>