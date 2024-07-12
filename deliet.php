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
            <div id="timer" class="timer">Thời gian còn lại: <span id="timeRemaining">20:00</span></div>
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
        question: "Cuộc đua xe chỉ được thực hiện khi nào?",
        options: [
            "Diễn ra trên đường phố không có người qua lại",
            "Được người dân ủng hộ",
            "Được cơ quan có thẩm quyền cấp phép"
        ],
        answer: "c"
    },
    {
        question: "Người điều khiển phương tiện giao thông đường bộ mà trong cơ thể có chất ma tuý có bị nghiêm cấm hay không?",
        options: [
            "Bị nghiêm cấm",
            "Không bị nghiêm cấm",
            "Không bị nghiêm cấm, nếu có chất ma tuý ở mức nhẹ, có thể điều khiển phương tiện tham gia giao thông"
        ],
        answer: "a"
    },
    {
        question: "Sử dụng rượu bia khi lái xe, nếu bị phát hiện thì bị xử lý như thế nào?",
        options: [
            "Chỉ bị nhắc nhở",
            "Bị xử phạt hành chính hoặc có thể bị xử lý hình sự tùy theo mức độ vi phạm",
            "Không bị xử lý hình sự"
        ],
        answer: "b"
    },
    {
        question: "Theo Luật phòng chống tác hại của rượu, bia, đối tượng nào dưới đây bị cấm sử dụng rượu bia khi tham gia giao thông?",
        options: [
            "Người điều khiển: Xe ô tô, xe mô tô, xe đạp, xe gắn máy",
            "Người ngồi phía sau người điều khiển xe cơ giới, người đi bộ",
            "Cả ý 1 và ý 2"
        ],
        answer: "c"
    },
    {
        question: "Hành vi điều khiển xe cơ giới chạy quá tốc độ quy định, giành đường, vượt ẩu có bị nghiêm cấm hay không?",
        options: [
            "Bị nghiêm cấm tùy từng trường hợp",
            "Không bị nghiêm cấm",
            "Bị nghiêm cấm"
        ],
        answer: "c"
    },
    {
        question: "Ở phần đường dành cho người đi bộ qua đường, trên cầu, đầu cầu, đường cao tốc, đường hẹp, đường dốc, tại nơi đường bộ giao nhau cùng mức với đường sắt có được quay đầu xe hay không?",
        options: [
            "Được phép",
            "Không được phép",
            "Tùy từng trường hợp"
        ],
        answer: "b"
    },
    {
        question: "Người điều khiển xe mô tô hai bánh, ba bánh, xe gắn máy có được phép sử dụng xe để kéo hoặc đẩy các phương tiện khác khi tham gia giao thông không?",
        options: [
            "Được phép",
            "Nếu phương tiện được kéo, đẩy có khối lượng nhỏ hơn phương tiện của mình",
            "Tuỳ trường hợp",
            "Không được phép"
        ],
        answer: "d"
    },
    {
        question: "Khi điều khiển xe mô tô hai bánh, xe mô tô ba bánh, xe gắn máy, những hành vi buông cả hai tay; sử dụng xe để kéo, đẩy xe khác, vật khác; sử dụng chân chống của xe quệt xuống đường khi xe đang chạy có được phép hay không?",
        options: [
            "Được phép",
            "Tuỳ trường hợp",
            "Không được phép"
        ],
        answer: "c"
    },
    {
        question: "Khi điều khiển xe mô tô hai bánh, xe mô tô ba bánh, xe gắn máy, những hành vi nào không được phép?",
        options: [
            "Buông cả hai tay; sử dụng xe để kéo, đẩy xe khác, vật khác; sử dụng chân chống của xe quệt xuống đường khi xe đang chạy",
            "Buông một tay; sử dụng xe để chở người hoặc hàng hoá; để chân chạm xuống đất khi khởi hành",
            "Đội mũ bảo hiểm; chạy xe đúng tốc độ quy định và chấp hành đúng quy tắc giao thông đường bộ"
        ],
        answer: "a"
    },
    {
        question: "Người ngồi trên xe mô tô hai bánh, ba bánh, xe gắn máy khi tham gia giao thông có được mang, vác vật cồng kềnh hay không?",
        options: [
            "Được mang, vác, tuỳ trường hợp cụ thể",
            "Không được mang, vác",
            "Được mang, vác nhưng phải đảm bảo an toàn",
            "Được mang vác tùy theo sức khỏe của bản thân"
        ],
        answer: "b"
    },
    {
        question: "Người ngồi trên xe mô tô hai bánh, xe mô tô ba bánh, xe gắn máy khi tham gia giao thông có được bám, kéo hoặc đẩy các phương tiện khác không?",
        options: [
            "Được phép",
            "Được bám trong trường hợp phương tiện của mình bị hỏng",
            "Được kéo, đẩy trong trường hợp phương tiện khác bị hỏng",
            "Không được phép"
        ],
        answer: "d"
    },
    {
        question: "Người ngồi trên xe mô tô hai bánh, xe mô tô ba bánh, xe gắn máy khi tham gia giao thông có được sử dụng ô khi trời mưa hay không?",
        options: [
            "Được sử dụng",
            "Chỉ người ngồi sau được sử dụng",
            "Không được sử dụng",
            "Được sử dụng nếu không có áo mưa"
        ],
        answer: "c"
    },
    {
        question: "Khi đang lên dốc người ngồi trên xe mô tô có được phép kéo theo người đang điều khiển xe đạp hay không?",
        options: [
            "Chỉ được phép nếu cả hai đội mũ bảo hiểm",
            "Không được phép",
            "Chỉ được phép thực hiện trên đường thật vắng",
            "Chỉ được phép khi người đi xe đạp đã quá mệt"
        ],
        answer: "b"
    },
    {
        question: "Hành vi sử dụng xe mô tô để kéo, đẩy xe mô tô khác bị hết xăng đến trạm mua xăng có được phép hay không?",
        options: [
            "Chỉ được kéo nếu đã nhìn thấy trạm xăng",
            "Chỉ được thực hiện trên đường vắng phương tiện cùng tham gia giao thông",
            "Không được phép"
        ],
        answer: "c"
    },
    {
        question: "Hành vi vận chuyển đồ vật cồng kềnh bằng xe mô tô, xe gắn máy khi tham gia giao thông có được phép hay không?",
        options: [
            "Không được vận chuyển",
            "Chỉ được vận chuyển khi đã chằng buộc cẩn thận",
            "Chỉ được vận chuyển vật cồng kềnh trên xe máy nếu khoảng cách về nhà ngắn hơn 2 km"
        ],
        answer: "a"
    },
    {
        question: "Người ngồi trên xe mô tô 2 bánh, xe gắn máy phải đội mũ bảo hiểm có cài quai đúng quy cách khi nào?",
        options: [
            "Khi tham gia giao thông đường bộ",
            "Chỉ khi đi trên đường chuyên dùng; đường cao tốc",
            "Khi tham gia giao thông trên đường tỉnh lộ hoặc quốc lộ"
        ],
        answer: "a"
    },
    {
        question: "Người điều khiển xe mô tô hai bánh, xe gắn máy có được đi xe dàn hàng ngang; đi xe vào phần đường dành cho người đi bộ và phương tiện khác; sử dụng ô, điện thoại di động, thiết bị âm thanh (trừ thiết bị trợ thính) hay không?",
        options: [
            "Được phép nhưng phải đảm bảo an toàn",
            "Không được phép",
            "Được phép tùy từng hoàn cảnh, điều kiện cụ thể"
        ],
        answer: "b"
    },
    {
        question: "Người lái xe phải xử lý như thế nào khi quan sát phía trước thấy người đi bộ đang sang đường tại nơi có vạch đường dành cho người đi bộ để đảm bảo an toàn?",
        options: [
            "Giảm tốc độ, đi từ từ để vượt qua trước người đi bộ",
            "Giảm tốc độ, có thể dừng lại nếu cần thiết trước vạch dừng xe để nhường đường cho người đi bộ qua đường",
            "Tăng tốc độ để vượt qua trước người đi bộ"
        ],
        answer: "b"
    },
    {   
        question: "Khi điều khiển xe mô tô tay ga xuống đường dốc dài, độ dốc cao, người lái xe cần thực hiện các thao tác nào dưới đây để đảm bảo an toàn?",
        options: [
            "Giữ tay ga ở mức độ phù hợp, sử dụng phanh trước và phanh sau để giảm tốc độ",
            "Nhả hết tay ga, tắt động cơ, sử dụng phanh trước và phanh sau để giảm tốc độ",
            "Sử dụng phanh trước để giảm tốc độ kết hợp với tắt chìa khóa điện của xe"
        ],
        answer: "a"
    },
    {
        question: "Khi đang lái xe mô tô và ô tô, nếu có nhu cầu sử dụng điện thoại để nhắn tin hoặc gọi điện, người lái xe phải thực hiện như thế nào trong các tình huống nêu dưới đây?",
        options: [
            "Giảm tốc độ để đảm bảo an toàn với xe phía trước và sử dụng điện thoại để liên lạc",
            "Giảm tốc độ để dừng xe ở nơi cho phép dừng xe sau đó sử dụng điện thoại để liên lạc",
            "Tăng tốc độ để cách xa xe phía sau và sử dụng điện thoại để liên lạc"
        ],
        answer: "b"
    }
];

let currentQuestion = 0;
        let totalTime = 1200; // Total time in seconds (20 minutes)

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
