<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thi Thử Bằng Lái Xe</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background-color: #f0f0f0; }
        .container { max-width: 800px; margin: auto; background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        .question { margin-bottom: 20px; }
        .question p { font-weight: bold; }
        .question img { max-width: 100%; height: auto; }
        .options { margin-left: 20px; }
        .options label { display: block; margin-bottom: 10px; }
        .question-buttons { display: flex; justify-content: space-between; }
        .question-buttons button { padding: 10px 20px; background-color: #007BFF; color: white; border: none; border-radius: 5px; cursor: pointer; }
        .question-buttons button:disabled { background-color: #ccc; }
        .result { margin-top: 20px; font-weight: bold; }
        .question-list { display: grid; grid-template-columns: repeat(5, 1fr); gap: 10px; margin-bottom: 20px; }
        .question-list button { padding: 10px; background-color: #28a745; color: white; border: none; border-radius: 5px; cursor: pointer; }
        .question-list button.active { background-color: #007BFF; }
        .timer { font-weight: bold; text-align: center; margin-bottom: 20px; font-size: 1.2em; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Thi Thử Bằng Lái Xe A1</h1>
        <div id="timer" class="timer">Thời gian còn lại: <span id="timeRemaining">19:00</span></div>
        <div class="question-list" id="questionList">
            <!-- Question buttons will be inserted here by JavaScript -->
        </div>
        <div id="quizForm">
            <!-- Questions will be displayed here by JavaScript -->
        </div>
        <div class="question-buttons">
            <button id="prevBtn" onclick="prevQuestion()" disabled>Câu trước</button>
            <button id="nextBtn" onclick="nextQuestion()">Câu tiếp theo</button>
        </div>
        <button id="submitBtn" onclick="submitQuiz()" style="width: 100%; margin-top: 20px; padding: 15px; background-color: #dc3545; color: white; border: none; border-radius: 5px; cursor: pointer;">Kết thúc bài thi</button>
    </div>

    <script>
        const questions = [
    {
        question: "Trong các khái niệm dưới đây, “dải phân cách” được hiểu như thế nào là đúng?",
        options: ["Là bộ phận của đường để ngăn cách không cho các loại xe vào những nơi không được phép.", "Là bộ phận của đường để phân tách phần đường xe chạy và hành lang an toàn giao thông.", "Là bộ phận của đường để phân chia mặt đường thành hai chiều xe chạy riêng biệt hoặc để phân chia phần đường của xe cơ giới và xe thô sơ."],
        answer: "c"
    },
    {
        question: "“Người điều khiển phương tiện tham gia giao thông đường bộ” gồm những đối tượng nào dưới đây?",
        options: ["Người điều khiển xe cơ giới, người điều khiển xe thô sơ.", "Người điều khiển xe máy chuyên dùng tham gia giao thông đường bộ.", "Cả A và B."],
        answer: "c"
    },
    {
        question: "Hành vi điều khiển xe cơ giới chạy quá tốc độ quy định, giành đường, vượt ẩu có bị nghiêm cấm hay không?",
        options: ["Bị nghiêm cấm tùy từng trường hợp.", "Không bị nghiêm cấm.", "Bị nghiêm cấm."],
        answer: "c"
    },
    {
        question: "Khi điều khiển xe mô tô hai bánh, xe mô tô ba bánh, xe gắn máy, những hành vi buông cả hai tay; sử dụng xe để kéo, đẩy xe khác, vật khác; sử dụng chân chống của xe quệt xuống đường khi xe đang chạy có được phép hay không?",
        options: ["Được phép.", "Tuỳ trường hợp.", "Không được phép."],
        answer: "c"
    },
    {
        question: "Người đủ bao nhiêu tuổi trở trên thì được điều khiển xe theo mô tô hai bánh, xe mô tô ba bánh có dung tích xi lanh từ 50cm3 trở lên và các laoij xe có kết cấu tương tự: xe ô tô tải, máy kéo có trọng tải dưới 3.500kg; xe ô tô chở người đến 9 chỗ ngồi?",
        options: ["16 tuổi.", "18 tuổi.", "17 tuổi."],
        answer: "b"
    },
    {
        question: "Khi sử dụng giấy phép lái xe đã khai báo mất để điều khiển phương tiện cơ giới đường bộ, ngoài việc bị thu hồi giấy phép lái xe, chịu trách nhiệm trước pháp luật, người lái xe không được cấp giấy phép lái xe trong thời gian bao nhiêu năm?",
        options: ["02 năm.", "03 năm.", "05 năm.", "04 năm."],
        answer: "c"
    },
    {
        question: "Khi muốn chuyển hướng, người lái xe phải thực hiện như thế nào để đảm bảo an toàn giao thông?",
        options: ["Quan sát gương, ra tín hiệu, quan sát an toàn và chuyển hướng.", "Quan sát gương, giảm tốc độ, ra tín hiệu chuyển hướng, quan sát an toàn và chuyển hướng.", "Quan sát gương, tăng tốc độ, ra tín hiệu và chuyển hướng."],
        answer: "b"
    },
    {
        question: "Người điều khiển xe mô tô hai bánh, xe gắn máy được phép chở tối đa 2 người trong những trường hợp nào?",
        options: ["Chở người bệnh đi cấp cứu; trẻ em dưới 14 tuổi.", "Áp giải người có hành vi vi phạm pháp luật.", "Cả A và B."],
        answer: "c"
    },
    {
        question: "Trong các trường hợp dưới đây, để đảm bảo an toàn khi tham gia giao thông, người lái xe mô tô cần thực hiện như thế nào?",
        options: ["Phải đội mũ bảo hiểm đạt chuẩn, có cài quai đúng quy cách, mặc quần áo gọn gàng; không sử dụng ô, điện thoại di động, thiết bị âm thanh (trừ thiết bị trợ thính).", "Phải đội mũ bảo hiểm khi trời mưa gió hoặc trời quá nắng; có thể sử dụng ô, điện thoại di động, thiết bị âm thanh nhưng phải đảm bảo an toàn.", "Phải đội mũ bảo hiểm khi cảm thấy mất an toàn giao thông hoặc khi chuẩn bị di chuyển quãng đường xa."],
        answer: "a"
    },
    {
        question: "Các phương tiện tham gia giao thông đường bộ (kể cả những xe có quyền ưu tiên) đều phải dừng lại bên phải đường của mình và trước vạch 'dừng xe' tại các điểm giao cắt giữa đường bộ và đường sắt khi có báo hiệu dừng nào dưới đây?",
        options: ["Hiệu lệnh của nhân viên gác chắn.", "Đèn đỏ sáng nháy, cờ đỏ, biển đỏ.", "Còi, chuông kêu, chắn đã đóng.", "Tất cả các đáp án trên."],
        answer: "d"
    },
    {
        question: "Khi gập xe buýt đang dừng đón, trả khách, người điều khiển xe mô tô phải xử lý như thế nào để đảm bảo an toàn giao thông?",
        options: ["Tăng tốc độ để nhanh chóng vượt qua bến đỗ.", "Giảm tốc độ đến mức an toàn có thể và quan sát người qua đường và từ từ vượt qua xe buýt.", "Yêu cầu phải dừng lại phía sau xe buýt chở xe rời bến mới đi tiếp."],
        answer: "b"
    },
    {
        question: "Khi tránh nhau trên đường hẹp, người lái xe cần phải chú ý những điểm nào để đảm bảo an toàn giao thông?",
        options: ["Không nên đi có vào đường hẹp, xe đi ở phía sườn núi nên dừng lại trước để nhường đường,chờ đối diện đi qua; khi gặp nhau nên đi chậm, gần mép đường; không nên sử dụng còi, đèn để đánh dấu; chỉ nên đi sau khi đã quan sát thấu đáo, đảm bảo an toàn.", "Nếu gặp nhau trên đoạn đường hẹp, cả hai đều phải quan sát và nhường đường cho nhau; nếu xe nào gặp trở ngại, khó khăn thì cần chờ đối phương đi qua rồi mới tiếp tục đi."],
        answer: "a"
    },
    {
        question: "Để đảm bảo an toàn khi tham gia giao thông, người lái xe mô tô hai bánh cần điều khiển tay ga như thế nào trong các trường hợp dưới đây?",
        options: ["Tăng ga thật nhanh, giảm ga từ từ.", "Tăng ga thật nhanh, giảm ga thật nhanh.", "Tăng ga từ từ, giảm ga thật nhanh.", "Tăng ga từ từ, giảm ga từ từ."],
        answer: "c"
    },
    {
        question: "Biển nào cấm các phương tiện giao thông đường bộ rẽ phải?",
        options: ["Biển 1 và 2.", "Biển 1 và 3.", "Biển 2 và 3.", "Cả 3 biển."],
        answer: "a",
        image: "101-149/107.png"
    },
    {
        question: "Biển nào cấm tất cả các loại xe cơ giới và thô sơ đi lại trên đường, trừ xe ưu tiên theo luật định (nếu đường vẫn cho xe chạy được)?",
        options: ["Biển 1.", "Biển 2.", "Cả 2 biển."],
        answer: "a",
        image: "101-149/115.png"
    },
    {
        question: "Gặp biển nào người lái xe phải nhường đường cho người đi bộ?",
        options: ["Biển 1.", "Biển 2.", "Biển 3.", "Biển 1 và 3."],
        answer: "a",
        image: "101-149/123, 124.png"
    },
    {
        question: "Biển nào báo hiệu sắp đến chỗ giao nhau giữa đường bộ và đường sắt?",
        options: ["Biển 1.", "Biển 2.", "Biển 3.", "Biển 1 và 3"],
        answer: "a",
        image: "101-149/131.png"
    },
    {
        question: "Biển nào báo hiệu “Đường đôi”?",
        options: ["Biển 1.", "Biển 2.", "Biển 3."],
        answer: "c",
        image: "101-149/139.png"
    },
    {
        question: "Biển nào (đặt trước ngã ba, ngã tư) cho phép xe được rẽ sang hướng khác?",
        options: ["Biển 1.", "Biển 2.", "Không biển nào."],
        answer: "c",
        image: "101-149/147.png"
    },
    {
        question: "Biển nào chỉ dẫn cho người đi bộ sử dụng cầu vượt qua đường?",
        options: ["Biển 1.", "Biển 2.", "Cả 2 biển.", "Không biển nào."],
        answer: "a",
        image: "150-200/155.png"
    },
    {
        question: "Các vạch dưới đây có tác dụng gì?",
        options: ["Phân chia hai chiều xe chạy ngược chiều nhau.", "Phân chia các làn xe chạy cùng chiều nhau."],
        answer: "a",
        image: "150-200/163.png"
    },
    {
        question: "Các xe đi theo hướng mũi tên, xe nào vi phạm quy tắc giao thông?",
        options: ["Xe khách, xe tải, mô tô.", "Xe tải, xe con, mô tô.", "Xe khách, xe con, mô tô."],
        answer: "a",
        image: "150-200/171.png"
    },
    {
        question: "Thứ tự các xe đi như thế nào là đúng quy tắc giao thông?",
        options: ["Xe con (A), mô tô, xe con (B), xe đạp.", "Xe con (B), xe đạp, mô tô, xe con (A).", "Xe con (A), xe con (B), mô tô + xe đạp.", "Mô tô + xe đạp, xe con (A), xe con (B)."],
        answer: "d",
        image: "150-200/179.png"
    },
    {
        question: "Trong hình dưới, những xe nào vi phạm quy tắc giao thông?",
        options: ["Xe con (E), mô tô (C).", "Xe tải (A), mô tô (D).", "Xe khách (B), mô tô (C).", "Xe khách (B), mô tô (D)."],
        answer: "a",
        image: "150-200/187.png"
    },
    {
        question: "Các xe đi theo thứ tự nào là đúng quy tắc giao thông đường bộ?",
        options: ["Xe của bạn, mô tô, xe con.", "Xe con, xe của bạn, mô tô.", "Mô tô, xe con, xe của bạn."],
        answer: "c",
        image: "150-200/195.png"
    }
];

             let currentQuestion = 0;
        let totalTime = 1140; // Total time in seconds (10 minutes)

        function loadQuestion(questionIndex) {
            const questionContainer = document.getElementById('quizForm');
            const question = questions[questionIndex];
            const selectedAnswer = question.selectedAnswer;

            questionContainer.innerHTML = `
                <div class="question">
                    <p>${questionIndex + 1}. ${question.question}</p>
                    ${question.image ? `<img src="${question.image}" alt="Question Image">` : ''}
                    <div class="options">
                        ${question.options.map((option, index) => `
                            <label><input type="radio" name="q${questionIndex + 1}" value="${String.fromCharCode(97 + index)}" ${selectedAnswer === String.fromCharCode(97 + index) ? 'checked' : ''}> ${String.fromCharCode(97 + index).toUpperCase()}. ${option}</label>
                        `).join('')}
                    </div>
                </div>
            `;
        }

        function shuffleArray(array) {
            for (let i = array.length - 1; i > 0; i--) {
                const j = Math.floor(Math.random() * (i + 1));
                [array[i], array[j]] = [array[j], array[i]];
            }
            return array;
        }

        function loadShuffledQuestionList() {
            const questionListContainer = document.getElementById('questionList');
            questionListContainer.innerHTML = questions.map((_, index) => `
                <button onclick="selectQuestion(${index})">${index + 1}</button>
            `).join('');
        }

        function selectQuestion(index) {
            saveAnswer(); // Save the answer before changing the question
            currentQuestion = index;
            loadQuestion(currentQuestion);
            updateQuestionButtons();
        }

        function updateQuestionButtons() {
            const buttons = document.querySelectorAll('.question-list button');
            buttons.forEach((button, index) => {
                button.classList.toggle('active', index === currentQuestion);
            });
            document.getElementById('prevBtn').disabled = currentQuestion === 0;
            document.getElementById('nextBtn').disabled = currentQuestion === questions.length - 1;
        }

        function prevQuestion() {
            if (currentQuestion > 0) {
                selectQuestion(currentQuestion - 1);
            }
        }

        function nextQuestion() {
            if (currentQuestion < questions.length - 1) {
                selectQuestion(currentQuestion + 1);
            }
        }

        function submitQuiz() {
            saveAnswer(); // Save the answer before submitting the quiz
            let score = 0;

            for (let i = 0; i < questions.length; i++) {
                const selected = questions[i].selectedAnswer;
                if (selected !== null && selected === questions[i].answer) {
                    score++;
                }
            }

            const total = questions.length;
            // Chuyển hướng đến trang kết quả với điểm số
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = 'KetQua3.php';
            const scoreInput = document.createElement('input');
            scoreInput.type = 'hidden';
            scoreInput.name = 'score';
            scoreInput.value = score;
            const totalInput = document.createElement('input');
            totalInput.type = 'hidden';
            totalInput.name = 'total';
            totalInput.value = total;
            form.appendChild(scoreInput);
            form.appendChild(totalInput);
            document.body.appendChild(form);
            form.submit();
        }

        function saveAnswer() {
            const selected = document.querySelector(`input[name="q${currentQuestion + 1}"]:checked`);
            if (selected) {
                questions[currentQuestion].selectedAnswer = selected.value;
            } else {
                questions[currentQuestion].selectedAnswer = null;
            }
        }

        function startTimer(duration, display) {
            let timer = duration, minutes, seconds;
            const interval = setInterval(function () {
                minutes = parseInt(timer / 60, 10);
                seconds = parseInt(timer % 60, 10);

                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                display.textContent = minutes + ":" + seconds;

                if (--timer < 0) {
                    clearInterval(interval);
                    submitQuiz(); // Automatically submit the quiz when time is up
                }
            }, 1000);
        }

        window.onload = function () {
            shuffleArray(questions);
            loadShuffledQuestionList();
            loadQuestion(0);
            updateQuestionButtons(); // Ensure the first button is active when the page loads

            const timeRemaining = document.getElementById("timeRemaining");
            startTimer(totalTime, timeRemaining); // Start the timer
        };
    </script>
</body>
</html>
