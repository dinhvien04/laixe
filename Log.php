<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thi Bang Lai Xe</title>
    <link rel="stylesheet" href="Log.css">
</head>
<body>
    <header>
        <h2 class="logo">Luyện Thi Bằng Lái</h2>
        <nav class="navigation">
            <a href="gioithieu.php">Giới thiệu</a>
            <a href="dichvu.php">Dịch vụ</a>
            <a href="lienhe.php">Liên hệ</a>
            <button class="btnLogin-popup">Đăng nhập</button>
        </nav>
    </header>
 
    <div class="wrapper">
        <span class="icon-close">
        <ion-icon name="close"></ion-icon>
        </span>
        <div class="form-box login">
            <h2>Đăng nhập</h2>
            <form action="xulydndatabase.php" method="POST">
                <div class="input-box">
                    <span class="icon">
                    <ion-icon name="person"></ion-icon>
                    </span>
                    <input type="text" name="taikhoan" required>
                    <label>Tài khoản</label>
                </div>
                <div class="input-box">
                    <span class="icon">
                    <ion-icon name="lock-closed"></ion-icon>
                    </span>
                    <input type="password" name="matkhau" required>
                    <label>Mật khẩu</label>
                </div>
                <div class="remember-forgot">
                    <label><input type="checkbox">Lưu mật khẩu</label>
                    <a href="#">Quên mật khẩu?</a>
                </div>
                    <button type="submit" class="btn">Đăng nhập</button>
                    <div class="login-register">
                        <p>Bạn chưa có tài khoản? <a href="#" class="register-link">Đăng ký</a></p>
                    </div>
            </form>
        </div>

        <div class="form-box register">
            <h2>Đăng ký</h2>
            <form action="xulydkydatabase.php" method="POST">
            <div class="input-box">
                    <span class="icon">
                    <ion-icon name="mail"></ion-icon>
                    </span>
                    <input type="email" name="email" required>
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <span class="icon">
                    <ion-icon name="person"></ion-icon>
                    </span>
                    <input type="text" name="taikhoan" required>
                    <label>Tài khoản</label>
                </div>
                <div class="input-box">
                    <span class="icon">
                    <ion-icon name="lock-closed"></ion-icon>
                    </span>
                    <input type="password" name="matkhau" required>
                    <label>Mật khẩu</label>
                </div>
                <div class="remember-forgot">
                    <label><input type="checkbox">Tôi đồng ý với các điều khoản</label>
                </div>
                    <button type="submit" class="btn">Đăng ký</button>
                    <div class="login-register">
                        <p>Bạn đã có tài khoản? <a href="#" class="login-link">Đăng nhập</a></p>
                    </div>
            </form>
        </div>
    </div>

    <script src="Log.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>