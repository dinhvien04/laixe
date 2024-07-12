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
    <style>
        
    </style>
</head>
<body>
<header>
    <h2 class="logo" style="color: black;">Luyện Thi Bằng Lái</h2>
    <nav class="navigation">
        <a href="gioithieu.php" style="color: black;">Giới thiệu</a>
        <a href="dichvu.php" style="color: black;">Dịch vụ</a>
        <a href="lienhe.php" style="color: black;">Liên hệ</a>
        <button class="btnLogin-popup" style="color: black;">Đăng nhập</button>
    </nav>
</header>
    <div class="main-content">
        <h2>BỘ ĐỀ THI THỬ BẰNG LÁI XE MÁY</h2>
        <p>Cấu trúc bộ đề thi sát hạch giấy phép lái xe hạng A1 sẽ bao gồm 25 câu hỏi, mỗi câu hỏi chỉ có duy nhất 1 đáp trả lời đúng phản ánh đúng bản chất của thi trắc nghiệm. Khác hẳn với bộ đề thi luật cũ là 2 đáp án. Mỗi đề thi chúng tôi sẽ bố trí từ 2 - 4 câu hỏi điểm liệt để học viên có thể làm quen và ghi nhớ, tránh việc làm sai câu hỏi liệt.</p>
        <ul>
            <li>Số lượng câu hỏi: <b>25 Câu</b>.</li>
            <li>Yêu cầu làm đúng: <b>21/25 Câu</b>.</li>
            <li>Thời gian: <b>19 Phút</b>.</li>
        </ul>
        <p><b>Lưu ý đặc biệt:</b> Tuyệt đối không được làm sai câu hỏi điểm liệt, vì trong kỳ thi thật nếu học viên làm sai "Câu Điểm Liệt" đồng nghĩa với việc "KHÔNG ĐẠT" dù cho các câu khác trả lời đúng!</p>
        <p>Thi thử 20 câu hỏi điểm liệt A1 trước là một ý rất hay - <b>NÀO TA CÙNG THI</b></p>
        <p>Học viên có gắng học theo phương pháp theo bên Thầy Trường hướng dẫn để đạt thành tích cao nhất. Nếu đã ghi danh đăng ký tại Trung Tâm Đào Tạo Lái Xe Quy Nhơn , các bạn có thể liên hệ với giáo viên để tham gia nhóm giải đáp câu hỏi trên Zalo và sẽ được hỗ trợ thêm hoặc <b>nhóm Zalo công cộng</b> của chúng tôi, mọi người đều có thể tham gia và không cần phải duyệt thành viên, vì một kỳ thi tốt đẹp!</p>
        <p><b>Chọn đề thi luyện: </b></p>

        <div class="btn-group">
            <a href="de1.php" class="de1">Đề 1</a>
            <a href="de2.php" class="de2">Đề 2</a>
            <a href="de3.php" class="de3">Đề 3</a>
            <a href="de4.php" class="de4">Đề 4</a>
            <a href="de5.php" class="de5">Đề 5</a>
            <a href="de6.php" class="de6">Đề 6</a>
            <a href="de7.php" class="de7">Đề 7</a>
            <a href="de8.php" class="de8">Đề 8</a>
            <a href="de200.php" class="de200">ĐỀ THI</a>
            <a href="deliet.php" class="deliet">ĐỀ LIỆT</a>
        </div>
    </div>

    <div class="wrapper">
        <span class="icon-close">
        <ion-icon name="close"></ion-icon>
        </span>
        <div class="form-box login active">
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
