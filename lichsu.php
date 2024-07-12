<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lịch sử</title>
    <link rel="stylesheet" href="Log.css"> <!-- Your CSS file -->
</head>
<body>
<header>
    <h2 class="logo" style="color: black;">Luyện Thi Bằng Lái</h2>
    <nav class="navigation">
        <a href="gioithieu.php" style="color: black;">Giới thiệu</a>
        <a href="dichvu.php" style="color: black;">Dịch vụ</a>
        <a href="lienhe.php" style="color: black;">Liên hệ</a>
        <a href="lichsu.html" style="color: black;">Lịch sử</a>
        <button class="btnLogin-popup" style="color: black;">Đăng nhập</button>
    </nav>
</header>
<style>
        header {
            background-color: #4CAF50;
            color: white;
            padding: 10px 0;
            text-align: center;
        }
        .logo {
            font-size: 24px;
            margin: 0;
        }
        .navigation {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 10px;
        }
        .navigation a, .btnLogin-popup {
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            background-color: #45a049;
            border-radius: 5px;
        }
        .navigation a:hover, .btnLogin-popup:hover {
            background-color: #3e8e41;
        }
        .main-content {
            padding: 20px;
            background-color: white;
            margin: 80px auto 20px auto;
            max-width: 800px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .main-content h2 {
            color: #4CAF50;
            text-align: center;
        }
        .main-content p {
            line-height: 1.6;
        }
        .main-content ul {
            list-style-type: none;
            padding: 0;
        }
        .main-content ul li {
            background-color: #e7f3e7;
            margin: 5px 0;
            padding: 10px;
            border-left: 5px solid #4CAF50;
        }
        .btn-group {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 20px;
        }
        .btn-group a {
            padding: 10px 20px;
            margin: 5px;
            text-decoration: none;
            font-size: 16px;
            border-radius: 5px;
            text-align: center;
        }
        .btn-group a.de1 {
            background-color: #f44336; /* Red */
            color: white;
        }
        .btn-group a.de2 {
            background-color: #e91e63; /* Pink */
            color: white;
        }
        .btn-group a.de3 {
            background-color: #9c27b0; /* Purple */
            color: white;
        }
        .btn-group a.de4 {
            background-color: #673ab7; /* Deep Purple */
            color: white;
        }
        .btn-group a.de5 {
            background-color: #3f51b5; /* Indigo */
            color: white;
        }
        .btn-group a.de6 {
            background-color: #2196f3; /* Blue */
            color: white;
        }
        .btn-group a.de7 {
            background-color: #03a9f4; /* Light Blue */
            color: white;
        }
        .btn-group a.de8 {
            background-color: #00bcd4; /* Cyan */
            color: white;
        }
        .btn-group a.de200
        {
            background-color: #4CAF50; /* Green */
            color: white;
        }
        .btn-group a:hover {
            opacity: 0.8;
        }
        .wrapper {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            background: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        .wrapper .form-box {
            display: none;
        }
        .wrapper .form-box.active {
            display: block;
        }
        .form-box h2 {
            margin: 0 0 20px;
            padding: 0;
            color: #4CAF50;
            text-align: center;
        }
        .form-box .input-box {
            position: relative;
            margin-bottom: 20px;
        }
        .form-box .input-box span.icon {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #4CAF50;
        }
        .form-box .input-box input {
            width: 100%;
            padding: 10px 10px 10px 40px;
            background: #f4f4f4;
            border: none;
            outline: none;
            border-radius: 5px;
        }
        .form-box .input-box label {
            position: absolute;
            top: 50%;
            left: 40px;
            transform: translateY(-50%);
            color: #aaa;
            pointer-events: none;
            transition: 0.5s;
        }
        .form-box .input-box input:focus ~ label,
        .form-box .input-box input:valid ~ label {
            top: -5px;
            left: 40px;
            color: #4CAF50;
            font-size: 12px;
        }
        .form-box .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .form-box .remember-forgot label {
            display: flex;
            align-items: center;
            font-size: 14px;
        }
        .form-box .remember-forgot a {
            color: #4CAF50;
            text-decoration: none;
            font-size: 14px;
        }
        .form-box .btn {
            width: 100%;
            background: #4CAF50;
            border: none;
            padding: 10px;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }
        .form-box .btn:hover {
            background: #45a049;
        }
        .form-box .login-register {
            text-align: center;
            margin-top: 20px;
        }
        .form-box .login-register p {
            font-size: 14px;
            color: #333;
        }
        .form-box .login-register a {
            color: #4CAF50;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
<div class="main-content">
    <h2>Lịch sử làm bài</h2>
    <table>
        <thead>
            <tr>
                <th>Quiz ID</th>
                <th>Score</th>
                <th>Date Taken</th>
            </tr>
        </thead>
        <tbody id="quiz-history">
            <!-- JavaScript will populate this -->
        </tbody>
    </table>
</div>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const quizResults = JSON.parse(localStorage.getItem('quizResults')) || [];
    const quizHistory = document.getElementById('quiz-history');

    quizResults.forEach(result => {
        const row = document.createElement('tr');

        const quizIdCell = document.createElement('td');
        quizIdCell.textContent = result.quizId;
        row.appendChild(quizIdCell);

        const scoreCell = document.createElement('td');
        scoreCell.textContent = result.score;
        row.appendChild(scoreCell);

        const dateTakenCell = document.createElement('td');
        dateTakenCell.textContent = result.dateTaken;
        row.appendChild(dateTakenCell);

        quizHistory.appendChild(row);
    });
});
</script>
</body>
</html>
