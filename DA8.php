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
        question: "Khái niệm “phương tiện giao thông thô sơ đường bộ” được hiểu như thế nào là đúng?",
        options: ["Gồm xe đạp (kể cả xe đạp máy, xe đạp điện), xe xích lô, xe lăn dùng cho người khuyết tật, xe súc vật kéo và các loại xe tương tự.", "Gồm xe đạp (kể cả xe đạp máy, xe đạp điện), xe gắn máy, xe cơ giới dùng cho người khuyết tật, xe súc vật kéo và các loại xe tương tự.", "Gồm xe ô tô, máy kéo, rơ moóc hoặc sơ mi rơ moóc được kéo bởi xe ô tô, máy kéo."],
        answer: "a"
    },
{
        question: "Người điều khiển phương tiện giao thông đường bộ mà trong cơ thể có chất ma túy có bị nghiêm cấm hay không?",
        options: ["Bị nghiêm cấm.", "Không bị nghiêm cấm.", "Không bị nghiêm cấm, nếu có chất ma túy ở mức nhẹ, có thể điều khiển phương tiện tham gia giao thông."],
        answer: "a"
    },
{
        question: "Bạn đang lái xe, phía trước có một xe cảnh sát giao thông không phát tín hiệu ưu tiên bạn có được phép vượt hay không?",
        options: ["Không được vượt.", "Được vượt khi đang trên cầu.", "Được phép vượt khi đi qua nơi giao thông có ít phương tiện cùng tham gia giao thông.", "Được vượt khi đảm bảo an toàn."],
        answer: "d"
    },
{
        question: "Khi đang lên dốc người ngồi trên xe mô tô có được kéo theo người đang điều khiển xe đạp hay không? (Câu hỏi điểm liệt)",
        options: ["Chỉ được phép nếu cả hai đội mũ bảo hiểm.", "Không được phép.", "Chỉ được thực hiện trên đường thật vắng.", "Chỉ được phép khi người đi xe đạp đã quá mệt."],
        answer: "b"
    },
{
        question: "Biển báo hiệu có dạng hình tam giác đều, viền đỏ, nền màu vàng, trên có hình vẽ màu đen là loại biển gì dưới đây?",
        options: ["Biển báo nguy hiểm.", "Biển báo cấm.", "Biển báo hiệu lệnh.", "Biển báo chỉ dẫn."],
        answer: "a"
    },
{
        question: "Trên đường một chiều có vạch kẻ phân làn đường, xe thô sơ và xe cơ giới phải đi như thế nào là đúng quy tắc giao thông?",
        options: ["Xe thô sơ phải đi trên làn đường bên trái ngoài cùng, xe cơ giới, xe máy chuyên dùng đi bên làn đường bên phải.", "Xe thô sơ phải đi trên làn đường bên phải trong cùng; xe cơ giới, xe máy chuyên dùng đi trên làn đường bên trái.", "Xe thô sơ đi trên làn đường phù hợp không gây cản trở giao thông, xe cơ giới, xe máy chuyên dùng đi trên làn đường bên phải."],
        answer: "b"
    }, 
{
    question: "Tại nơi đường bộ giao nhau cùng mức với đường sắt chỉ có đèn tín hiệu hoặc chuông báo hiệu, khi đèn tín hiệu màu đỏ đã bật hoặc có tiếng chuông báo hiệu, người tham gia giao thông phải dừng lại ngay và giữ khoảng cách tối thiểu bao nhiêu mét tính từ ray gần nhất?",
    options: ["5 mét.", "3 mét.", "4 mét."],
    answer: "a"
},
{
    question: "Khi điều khiển xe cơ giới, người lái xe phải bật đèn tín hiệu báo rẽ trong trường hợp nào sau đây?",
    options: ["Khi cho xe chạy thẳng.", "Trước khi thay đổi làn đường.", "Sau khi thay đổi làn đường."],
    answer: "b"
},
{
    question: "Trên đường bộ (trừ đường cao tốc) trong khu vực đông dân cư, đường hai chiều hoặc đường một chiều có một làn xe cơ giới, loại xe nào dưới đây được tham gia giao thông với tốc độ tối đa cho phép là 50 km/h?",
    options: ["Ô tô con, ô tô tải, ô tô chở người trên 30 chỗ.", "Xe gắn máy, xe máy chuyên dùng.", "Cả ý 1 và ý 2."],
    answer: "a"
},
{
        question: "Tại nơi đường giao nhau, khi đèn điều khiển giao thông có tín hiệu màu vàng, người điều khiển giao thông phải chấp hành như thế nào là đúng quy tắc giao thông?",
        options: ["Phải cho xe dừng lại trước vạch dừng, trường hợp đã đi quá vạch dừng hoặc đã quá gần vạch dừng nếu dừng lại thấy nguy hiểm thì được đi tiếp.", "Trong trường hợp tín hiệu vàng nhấp nháy là được đi nhưng phải giảm tốc độ, chú ý quan sát nhường đường cho người đi bộ qua đường.", "Cả A và B."],
        answer: "d"
    },
{
        question: "Trên đường đang xảy ra ùn tắc những hành vi nào sau đây là thiếu văn hóa khi tham gia giao thông?",
        options: ["Bắm còi liên tục thúc giục các phương tiện phía trước nhường đường.", "Đi lên vỉa hè, tận dụng mọi khoảng trống để nhanh chóng thoát khỏi nơi ùn tắc.", "Lần sang trái đường cố gắng vượt lên xe khác.", "Tất cả các ý nêu trên."],
        answer: "d"
    },
{
        question: "Khi điều khiển xe mô tô quay đầu người lái xe cần thực hiện như thế nào để đảm bảo an toàn?",
        options: ["Bật tín hiệu báo rẽ trước khi quay đầu, từ từ giảm tốc độ đến mức có thể dừng lại.", "Chỉ quay đầu xe tại những nơi được phép quay đầu.", "Quan sát an toàn các phương tiện tới từ phía trước, phía sau, hai bên đồng thời nhường đường cho xe từ bên phải và phía trước đi tới.", "Tất cả đáp án nêu trên."],
        answer:"d"
    },
 {
            question: "Biển nào cấm quay đầu xe?",
            options: ["Biển 1", "Biển 2", "Không biển nào.", "Cả 2 biển."],
            answer: "b",
            image: "101-149/104, 105, 106.png"
},
{
            question: "Biển nào là biển “Cấm đi ngược chiều”?",
            options: ["Biển 1.", "Biển 2.", "Cả 3 biển."],
            answer: "b",
            image:"101-149/112, 113.png"
        },
{
            question: "Biển nào xe mô tô hai bánh được đi vào?",
            options: ["Biển 1 và 2.", "Biển 1 và 3.", "Biển 2 và 3."],
            answer: "b",
            image:"101-149/120, 121.png"
        },
{
            question: "Biển nào báo hiệu “Giao nhau có tín hiệu đèn”?",
            options: ["Biển 1.", "Biển 2.", "Biển 3.", "Cả 3 biển."],
            answer: "c",
            image:"101-149/126, 127, 128.png"
        },
{
            question: "Khi gặp biển nào, người lái xe phải giảm tốc độ, chú ý xe đi ngược chiều, xe đi ở phải đường bị hẹp phải nhường đường cho xe đi ngược chiều?",
            options: ["Biển 1.", "Biển 1 và 3.", "Biển 2 và 3.", "Cả 3 biển."],
            answer: "c",
            image:"101-149/136.png"
        },
{
            question: "Gặp biển nào người tham gia giao thông phải đi chậm và thận trọng để phòng khả năng xuất hiện và di chuyển bất ngờ của trẻ em trên mặt đường?",
            options: ["Biển 1.", "Biển 2."],
            answer: "b",
            image:"101-149/144.png"
        },
{
            question: "Trong các biển dưới đây biển nào là biển “Hết hạn chế tốc độ tối thiểu”?",
            options: ["Biển 1.", "Biển 2.", "Biển 3.", "Cả 3 biển."],
            answer: "c",
            image:"150-200/150, 151, 152.png"
        },
{
            question: "Vạch kẻ đường nào dưới đây là vạch phân chia các làn xe cùng chiều?",
            options: ["Vạch 1.", "Vạch 2.", "Vạch 3.", "Vạch 1 và 2."],
            answer: "d",
            image:"150-200/160.png"
        },
{
            question: "Trường hợp này xe nào được quyền đi trước?",
            options: ["Mô tô.", "Xe con."],
            answer: "b",
            image:"150-200/168.png"
        },
 {
            question: "Xe nào đỗ vi phạm quy tắc giao thông?",
            options: ["Chỉ mô tô.", "Chỉ xe tải.", "Cả 3 xe.", "Chỉ mô tô và xe tải."],
            answer: "c",
            image:"150-200/176.png"
        },
{
        question: "Trong hình dưới đây, xe nào chấp hành đúng quy tắc giao thông?",
        options: ["Chỉ xe khách, mô tô.", "Tất cả các loại xe trên.", "Không xe nào chấp hành đúng quy tắc giao thông."],
        answer: "b",
        image:"150-200/184.png"
    },
{
        question: "Các xe đi theo hướng mũi tên, xe nào vi phạm quy tắc giao thông?",
        options: ["Xe tải, xe con,", "Xe khách, xe con.", "Xe khách, xe tải."],
        answer: "c",
        image:"150-200/192.png"
    },
{
        question: "Trong tình huống dưới đây, xe đầu kéo kéo rơ moóc (xe container) đang rẽ phải, xe con màu xanh và xe máy phía sau xe container đi như thế nào để đảm bảo an toàn?",
        options: ["Vượt về phía bên phải để đi tiếp.", "Giảm tốc độ chờ xe container rẽ xong rồi tiếp tục đi.", "Vượt về phía bên trái để đi tiếp."],
        answer: "b",
        image:"150-200/200.png"
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
            form.action = 'result.php';
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
