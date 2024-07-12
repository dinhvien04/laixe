<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Kết Quả Thi Thử</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; padding: 50px; background-color: #f0f0f0; }
        .container { display: inline-block; padding: 20px; background: #fff; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        h1 { color: #28a745; }
        .result { font-size: 24px; font-weight: bold; margin-top: 20px; }
        .buttons { margin-top: 20px; }
        .buttons button { padding: 10px 20px; margin: 5px; color: white; border: none; border-radius: 5px; cursor: pointer; }
        .buttons button.primary { background-color: #007BFF; }
        .buttons button.secondary { background-color: #dc3545; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Kết Quả Thi Thử Bằng Lái Xe A1</h1>
        <?php
            $score = isset($_POST['score']) ? (int)$_POST['score'] : 0;
            $total = isset($_POST['total']) ? (int)$_POST['total'] : 0;
            echo "<div class='result'>Bạn đã trả lời đúng $score/$total câu.</div>";
        ?>
        <div class="buttons">
            <button class="primary" onclick="window.location.href='bay.php'">Trở về trang Chủ</button>
            <button class="secondary" onclick="window.location.href='DA7.php'">Xem Đáp Án</button>
        </div>
    </div>
</body>
</html>
