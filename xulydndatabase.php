<?php 
// lấy dữ liệu từ form
$tk = $_POST['taikhoan'];
$mk = $_POST['matkhau'];

// kết nối
$conn = mysqli_connect("localhost","root","","login");
//xây dựng câu lệnh truy vấn
$strsql = "SELECT * FROM lg WHERE username = '".$tk."' and password = '".$mk."' ";
//thực hiện câu lệnh truy vấn
$kq = mysqli_query($conn, $strsql);
//lấy kết quả trả về
if($dn = mysqli_fetch_array($kq)) {
    echo "Đăng nhập thành công! <br> với tên đăng nhập là: ".$dn['username'];
}else{
    echo "Tài khoản hoặc mật khẩu không đúng!";
}
//đóng xử lý kết nối
mysqli_close($conn);
?>