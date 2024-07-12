<?php 
session_start();
$email = $_POST['email'];
$tk = $_POST['taikhoan'];
$mk = $_POST['matkhau'];

$kn = mysqli_connect("localhost", "root", "", "login");

$strlenh = "INSERT INTO lg(username, password, email) VALUES ('".$tk."', '".$mk."', '".$email."')";
$strcheck = "SELECT COUNT(*) AS count FROM lg WHERE username = '$tk' ";

$kqcheck = mysqli_query($kn, $strcheck);

if($dn = mysqli_fetch_array($kqcheck)) {
    if($dn['count'] == 0) {
        $kq = mysqli_query($kn, $strlenh);
        header("Location: Log.php");
    }else{
        echo "Tài khoản đã tồn tại!";
    }
}

mysqli_close($kn);
?>