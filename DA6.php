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
        question: "Đường mà trên đó phương tiện tham gia giao thông được các phương tiện giao thông đến từ hướng khác nhường đường khi qua nơi đường giao nhau, được cắm biển báo hiệu đường ưu tiên là loại đường gì?",
        options: ["Đường không ưu tiên.", "Đường tỉnh lộ.", "Đường quốc lộ.", "Đường ưu tiên."],
        answer: "d"
    },
{
        question: "Khái niệm “đỗ xe” được hiểu như thế nào là đúng?",
        options: ["Là trạng thái đứng yên của phương tiện giao thông có giới hạn trong một khoảng thời gian cần thiết đủ để cho người lên, xuống phương tiện đó, xếp dỡ hàng hóa hoặc thực hiện công việc khác.", "Là trạng thái đứng yên của phương tiện giao thông không giới hạn thời gian.", "Là trạng thái đứng yên của phương tiện giao thông không giới hạn thời gian để cho người lên, xuống phương tiện, xếp dỡ hàng hóa hoặc thực hiện công việc khác."],
        answer: "b"
    },
{
        question: "Trong trường hợp đặc biệt, để được lắp đặt, sử dụng còi, đèn không đúng với thiết kế của nhà sản xuất đối với từng loại xe cơ giới bạn phải đảm bảo yêu cầu nào đươi đấy?",
        options: ["Phải đảm bảo phụ tùng do đúng nhà sản xuất đó cung cấp.", "Phải được chấp thuận của cơ quan có thẩm quyền.", "Phải là xe đăng ký và hoạt động tại các khu vực có địa hình phức tạp."],
        answer: "b"
    },
 {
        question: "Người ngồi trên xe mô tô hai bánh, ba bánh, xe gắn máy khi tham gia giao thông có được bám, kéo hoặc đẩy các phương tiện khác hay không? (Câu hỏi điểm liệt)",
        options: ["Được phép.", "Được bám trong trường hợp phương tiện của mình bị hỏng.", "Được kéo, đẩy trong trường hợp phượng tiện khác bị hỏng.", "Không được phép."],
        answer: "d"
    },
{
        question: "Người có giấy phép lái xe mô tô hạng A1 được phép điều khiển loại xe nào dưới đây?",
        options: ["Xe mô tô hai bánh có dung tích xi-lanh từ 50cm3 đến dưới 175cm3.", "Xe mô tô ba bánh dùng cho người khuyết tật.", "Cả A và B."],
        answer: "c"
    },
{
        question: "Tại nơi có biển báo hiệu cố định lại có báo hiệu tạm thời thì người tham giao thông phải chấp hành hiệu lệnh của biển báo nào?",
        options: ["Biển báo hiệu cố định.", "Biển báo hiệu tạm thời.", "Không tuân theo biển báo hiệu nào hết."],
        answer: "b"
    },
{
    question: "Tại nơi đường giao nhau, người lái xe đang đi trên đường không ưu tiên phải nhường đường như thế nào là đúng quy tắc giao thông?",
    options: ["Nhường đường cho xe đi ở bên phải mình tới.", "Nhường đường cho xe đi ở bên trái mình tới.", "Nhường đường cho xe đi trên đường ưu tiên hoặc đường chính từ bất kỳ hướng nào tới."],
    answer: "c"
},
{
    question: "Người lái xe phải giảm tốc độ thấp hơn tốc độ tối đa cho phép (có thể dừng lại một cách an toàn) trong trường hợp nào dưới đây?",
    options: ["Khi có báo hiệu cảnh báo nguy hiểm hoặc có chướng ngại vật trên đường; khi chuyển hướng xe chạy hoặc tầm nhìn bị hạn chế; khi qua nơi đường giao nhau, nơi đường bộ giao nhau với đường sắt, đường vòng; đường có địa hình quanh co, đèo dốc.", "Khi qua cầu, cống hẹp; khi lên gần đỉnh dốc, khi xuống dốc, khi qua trường học, khu đông dân cư, khu vực đang thi công trên đường bộ; hiện trường xảy ra tai nạn giao thông.", "Khi điều khiển xe vượt xe khác trên đường quốc lộ, đường cao tốc."],
    answer: "d"
},
{
    question: "Trên đường bộ (trừ đường cao tốc) trong khu vực đông dân cư, đường đôi có dải phân cách giữa, xe mô tô hai bánh, ô tô chờ người đến 30 chỗ tham gia giao thông với tốc độ tối đa cho phép là bao nhiêu?",
    options: ["60 km/h.", "50 km/h.", "40 km/h."],
    answer: "a"
},
{
        question: "Người lái xe phải xử lý như thế nào khi quan sát phía trước thấy người đi bộ đang sang đường tại nơi có vạch đường dành cho người đi bộ để đảm bảo an toàn?",
        options: ["Giảm tốc độ, đi từ từ để vượt qua trước người đi bộ.", "Giảm tốc độ, có thể dừng lại nếu cần thiết trước vạch dừng xe để nhường đường cho người đi bộ qua đường.", "Tăng tốc độ để vượt qua trước người đi bộ."],
        answer: "b"
    },
 {
        question: "Trong các hành vi dưới đây, người lái xe ô tô, mô tô có văn hóa giao thông phải ứng xử như thế nào?",
        options: ["Điều khiển xe đi bên phải theo chiều đi của mình; đi đúng phần đường, làn đường quy định; dừng, đỗ xe đúng nơi quy định; đã uống rượu, bia thì không lái xe.","Điều khiển xe đi trên phần đường, làn đường có ít phương tiện giao thông; dừng xe, đỗ xe ở nơi thuận tiện hoặc theo yêu cầu của hành khách, của người thân.","Dừng và đỗ xe ở nơi thuận tiện cho việc chuyên chở hành khách và giao nhận hàng hóa; sử dụng ít rượu, bia thì có thể lái xe."],
        answer: "a"
    },
{
        question: "Khi đang lái xe mô tô và ô tô, nếu có nhu cầu sử dụng điện thoại để nhắn tin hoặc gọi điện, người lái xe phải thực hiện như thế nào trong các tình huống nêu dưới đây? (Câu hỏi điểm liệt)",
        options: ["Giảm tốc độ để đảm bảo an toàn với xe phía trước và sử dụng điện thoại để liên lạc.", "Giảm tốc độ để dừng xe ở nơi cho phép dùng xe sau đó sử dụng điện thoại để liên lạc.", "Tăng tốc độ để cách xa xe phía sau và sử dụng điện thoại đề liên lạc."],
        answer: "b"
    },
{
            question: "Biển nào báo hiệu cấm xe mô tô 2 bánh đi vào?",
            options: ["Biển 1.", "Biển 2.", "Biển 3.", "Cả 3 biển."],
            answer: "a",
            image: "101-149/102, 103.png"
        },
{
            question: "Biển nào xe quay đầu không bị cấm?",
            options: ["Biển 1.", "Biển 2.", "Cả 2 biển."],
            answer: "c",
            image:"101-149/109, 110.png"
        },
{
            question: "Biển báo nào có ý nghĩa như thế nào?",
            options: ["Tốc độ tối đa cho phép về ban đêm cho các phương tiện là 70km/h.", "Tốc độ tối thiểu cho phép về ban đêm cho các phương tiện là 70km/h."],
            answer: "a",
            image:"101-149/118.png"
        },
{
            question: "Biển nào báo hiệu sắp đến chỗ giao nhau nguy hiểm?",
            options: ["Biển 1.", "Biển 1 và 2.", "Biển 2 và 3.", "Cả 3 biển trên."],
            answer: "d",
            image:"101-149/126, 127, 128.png"
        },
{
            question: "Biển nào báo hiệu “Giao nhau với đường ưu tiên”?",
            options: ["Biển 1 và 3.", "Biển 2.", "Biển 3."],
            answer: "b",
            image:"101-149/132, 133, 134.png"
        },
{
            question: "Biển nào báo hiệu “Giao nhau với đường hai chiều”?",
            options: ["Biển 1.", "Biển 2.", "Biển 3."],
            answer: "b",
            image:"101-149/142.png"
        },
{
            question: "Trong các biển dưới đây biển nào là biển “Hết tốc độ tối đa cho phép”?",
            options: ["Biển 1.", "Biển 2.", "Biển 3.", "Cả 3 biển."],
            answer: "a",
            image:"150-200/150, 151, 152.png"
        },
 {
            question: "Gặp biển báo như này người tham gia giao thông phải xử lý như thế nào?",
            options: ["Dừng xe tại khu vực có trạm Cảnh sát giao thông.", "Tiếp tục lưu thông với tốc độ bình thường.", "Phải giảm tốc độ đến mức an toàn và không được vượt khi đi qua khu vực này."],
            answer: "c",
            image:"150-200/158.png"
        },

        {
            question: "Thứ tự các xe đi như thế nào là đúng quy tắc giao thông?",
            options: ["Xe tải, xe khách, xe con, mô tô.", "Xe tải, mô tô, xe khách, xe con.", "Xe khách, xe tải, xe con, mô tô.", "Mô tô, xe khách, xe tải, xe con."],
            answer: "b",
            image:"150-200/166.png"
        },
{
            question: "Theo hướng mũi tên, những hướng nào xe gắn máy đi được?",
            options: ["Cả ba hướng.", "Chỉ hướng 1 và 3.", "Chỉ hướng 1."],
            answer: "a",
            image:"150-200/174.png"
        },
{
        question: "Các xe đi như thế nào là đúng quy tắc giao thông?",
        options: ["Các xe ở phái tay phải và tay trái của người điều khiển được phép đi thẳng.", "Cho phép các xe ở mọi hướng được rẽ phải.", "Tất cả các xe phải dừng lại trước ngã tư, trừ những xe đã ở trong ngã tư được phép tiếp tục đi."],
        answer: "c",
        image:"150-200/182.png"
    },
{
        question: "Theo tín hiệu đèn của xe cơ giới, xe nào vi phạm quy tắc giao thông?",
        options: ["Xe mô tô.", "Xe ô tô con.", "Không xe nào vi phạm.", "Cả 2 xe."],
        answer: "d",
        image:"150-200/190.png"
    },
{
        question: "Xe nào dừng đúng theo quy tắc giao thông?",
        options: ["Xe con.", "Xe mô tô.", "Cả 2 xe đều đúng."],
        answer: "a",
        image:"150-200/198.png"
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
