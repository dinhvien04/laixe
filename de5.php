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
        question: "Người lái xe được hiểu như nào trong các khái niệm dưới đây?",
        options: ["Là người điều khiển xe cơ giới.", "Là người điều khiển xe thô sơ.", "Là người điều khiển xe có súc vật kéo."],
        answer: "a"
    },
    {
        question: "Trong các khái niệm dưới đây khái niệm “dừng xe” được hiểu như thế nào là đúng?",
        options: ["Là trạng thái đứng yên của phương tiện giao thông không giới hạn thời gian để cho người lên, xuống phương tiện, xếp dỡ hàng hóa hoặc thực hiện công việc khác.", "Là trạng thái đứng yên tạm thời của phương tiện giao thông trong một khoảng thời gian cần thiết đủ để cho người lên, xuống phương tiện, xếp dỡ hàng hóa hoặc thực hiện công việc khác.", "Là trạng thái đứng yên của phương tiện giao thông không giới hạn thời gian giữa 02 lần vận chuyển hàng hóa hoặc hành khách."],
        answer: "b"
    },
    {
        question: "Người lái xe sử dụng đèn như thế nào khi lái xe trong khu đô thị và đông dân cư vào ban đêm?",
        options: ["Bất cứ đèn nào miễn là nhìn rõ phía trước.", "Chỉ bật đèn chiếu xa (đèn pha) khi không nhìn rõ đường.", "Đèn chiếu xa (đèn pha) khi đường vắng, đèn pha chiếu gần (đèn cốt) khi có xe đi ngược chiều.", "Đèn chiếu gần (đèn cốt)."],
        answer: "d"
    },
    {
        question: "Người ngồi trên xe mô tô hai bánh, ba bánh, xe gắn máy khi tham gia giao thông có được mang, vác cồng kềnh hay không? (Câu hỏi điểm liệt)",
        options: ["Được mang, vác tùy trường hợp cụ thể.", "Không được mang, vác.", "Được mang, vác nhưng phải đảm bảo an toàn.", "Được mang, vác tùy theo sức khỏe của bản thân."],
        answer: "b"
    },
    {
        question: "Người có giấy phép lái xe mô tô hạng A1 không được phép điều khiểu loại xe nào dưới đây?",
        options: ["Xe mô tô có dung tích xi-lanh 125cm3.", "Xe mô tô có dung tích xi-lanh từ 175cm3 trở lên.", "Xe mô tô có dung tích xi-lanh 100cm3."],
        answer: "b"
    },
    {
        question: "Khi gặp hiệu lệnh như dưới đây của cảnh sát giao thông thì người tham gia giao thông phải đi như thế nào là đúng quy tắc giao thông?",
        options: ["Người tham gia giao thông ở hướng đối diện cảnh sát giao thông được đi, các hướng khác cần phải dừng lại.", "Người tham gia giao thông được rẽ phải theo chiều mũi tên màu xanh ở bục cảnh sát giao thông.", "Người tham gia giao thông ở các hướng đều phải dừng lại trừ các xe đã ở trong khu vực giao nhau.", "Người ở hướng đối diện cảnh sát giao thông phải dừng lại, các hướng khác được đi trong đó có bạn."],
        answer: "c"
    },
    {
        question: "Bạn đang lái xe trên đường hẹp, xuống dốc và gặp một xe đang đi lên dốc, bạn cần làm gì?",
        options: ["Tiếp tục đi vì xe lên dốc phải nhường đường cho mình.", "Nhường đường cho xe lên dốc.", "Chỉ nhường đường khi xe lên dốc nháy đèn."],
        answer: "b"
    },
    {
        question: "Người điều khiển xe mô tô hai bánh, xe gắn máy có được đi xe dàn hàng ngang; đi xe vào phần đường dành cho người đi bộ và phương tiện khác; sử dụng ô, điện thoại di động, thiết bị âm thanh (trừ thiết bị trợ thính) hay không?",
        options: ["Được phép nhưng phải đảm bảo an toàn.", "Không được phép.", "Được phép tùy từng hoàn cảnh, điều kiện cụ thể."],
        answer: "b"
    },
    {
        question: "Tốc độ tối đa cho phép đối với xe máy chuyên dùng, xe gắn máy (kể cả xe máy điện) và các loại xe tương tự trên đường bộ (trừ đường cao tốc) không được vượt quá bao nhiêu km/h?",
        options: ["50 km/h.", "40 km/h.", "60 km/h."],
        answer: "b"
    },
    {
        question: "Tại nơi đường giao nhau, người lái xe đang đi trên đường không ưu tiên phải xử lý như thế nào là đúng quy tắc giao thông?",
        options: ["Tăng tốc độ qua đường giao nhau để đi trước xe đi trên đường ưu tiên.", "Giảm tốc độ qua đường giao nhau để đi trước xe đi trên đường ưu tiên.", "Nhường đường cho xe đi trên đường ưu tiên từ bất kỳ hướng nào tới"],
        answer: "c"
    },
    {
        question: "Trong các hành vì dưới đây, người lái xe mô tô có văn hóa giao thông phải ứng xử như thế nào?",
        options: ["Điều khiển xe đi bên phải theo chiều đi của mình, đi đúng phần đường, làn đường quy định; đội mũ bảo hiểm đạt chuẩn, cài quai đúng quy cách.", "Điều khiển xe đi trên phần đường, làn đường có ít phương tiện tham gia giao thông.", "Điều khiển xe và đội mũ bảo hiểm ở nơi có biển báo bắt buộc đội mũ bảo hiểm."],
        answer: "a"
    },
    {
        question: "Để đạt được hiệu quả phanh cao nhất, người lái xe mô tô phải sử dụng các kỹ năng như thế nào dưới đây?",
        options: ["Sử dụng phanh trước.", "Sử dụng phanh sau.", "Giảm hết ga sử dụng đồng thời cả phanh sau và phanh trước."],
        answer: "c"
    },
    {
        question: "Biển nào dưới đây xe gắn máy được phép đi vào?",
        options: ["Biển 1.", "Biển 2.", "Cả 2 biển."],
        answer: "c",
        image: "101-149/101.png"
    },
    {
        question: "Biển nào cho phép xe rẽ trái?",
        options: ["Biển 1.", "Biển 2.", "Không biển nào."],
        answer: "b",
        image: "101-149/109, 110.png"
    },
    {
        question: "Gặp biển nào xe lam, xe xích lô máy được phép đi vào?",
        options: ["Biển 1.", "Biển 2.", "Biển 3."],
        answer: "b",
        image: "101-149/116, 117.png"
    },
    {
        question: "Biển nào báo hiệu “Đường dành cho xe thô sơ”?",
        options: ["Biển 1.", "Biển 2.", "Biển 3."],
        answer: "a",
        image: "101-149/125.png"
    },
    {
        question: "Biển nào báo hiệu “Giao nhau với đường không ưu tiên”?",
        options: ["Biển 1 và 3.", "Biển 2.", "Biển 3."],
        answer: "a",
        image: "101-149/132, 133, 134.png"
    },
    {
        question: "Biển nào báo hiệu “Đường hai chiều”?",
        options: ["Biển 1.", "Biển 2.", "Biển 3."],
        answer: "b",
        image: "101-149/141.png"
    },
    {
        question: "Biển nào báo hiệu “Đường một chiều”?",
        options: ["Biển 1.", "Biển 2.", "Cả 2 biển."],
        answer: "b",
        image: "101-149/148, 149.png"
    },
    {
        question: "Biển nào báo hiệu “nơi đỗ xe dành cho người khuyết tật”?",
        options: ["Biển 1.", "Biển 2.", "Biển 3."],
        answer: "b",
        image: "150-200/157.png"
    },
    {
        question: "Vạch dưới đây có ý nghĩa gì?",
        options: ["Vị trí dừng xe của các phương tiện vận tải hành khách công cộng.", "Báo cho người điều khiển được dừng phương tiện trong phạm vi phần mặt đường có bố trí vạch để tránh ùn tắc giao thông.", "Dùng để xác định vị trí giữa các phương tiện trên đường."],
        answer: "a",
        image: "150-200/165.png"
    },
    {
        question: "Trong trường hợp này xe nào đỗ vi phạm quy tắc giao thông?",
        options: ["Xe tải.", "Xe con và mô tô.", "Cả 3 xe.", "Xe con và xe tải."],
        answer: "a",
        image: "150-200/173.png"
    },
    {
        question: "Xe nào vi phạm quy tắc giao thông?",
        options: ["Xe khách.", "Mô tô.", "Xe con.", "Xe con và mô tô."],
        answer: "c",
        image: "150-200/181.png"
    },
    {
        question: "Bạn có được phép vượt xe mô tô phía trước không?",
        options: ["Cho phép.", "Không được vượt."],
        answer: "b",
        image: "150-200/189.png"
    },
    {
        question: "Bạn xử lý như thế nào trong trường hợp này?",
        options: ["Tăng tốc độ, rẽ phải trước xe tải và xe đạp.", "Giảm tốc độ, rẽ phải sau xe tải và xe đạp.", "Tăng tốc độ, rẽ phải trước xe đạp."],
        answer: "b",
        image: "150-200/197.png"
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
            form.action = 'KetQua5.php';
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
