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
        question: "Khái niệm “phương tiện giao thông cơ giới đường bộ” được hiểu như thế nào là đúng?",
        options: ["Gồm xe ô tô; máy kéo; xe mô tô hai bánh; xe mô tô ba bánh; xe gắn máy; xe cơ giới dùng cho người khuyết tật và xe máy chuyên dùng.", "Gồm xe ô tô; máy kéo; rơ moóc hoặc sơ mi rơ moóc được kéo bởi xe ô tô, máy kéo; xe mô tô hai bánh; xe mô tô ba bánh, xe gắn máy (kể cả xe máy điện) và các lại xe tương tự."],
        answer: "a"
    },
{
        question: "Cuộc đua xe chỉ được thực hiện khi nào?",
        options: ["Diễn ra trên đường phố không có người qua lại.", "Được người dân ủng hộ.", "Được cơ quan có thẩm quyền cấp phép."],
        answer: "c"
    },
{
        question: "Ở phần đường dành cho người đi bộ qua đường, trên cầu, đầu cầu, đường cao tốc, đường hẹp, đường dốc, tại nơi đường bộ giao nhau cùng mức với đường sắt được quay đầu xe hay không?",
        options: ["Được phép.", "Không được phép.", "Tùy từng trường hợp."],
        answer: "b"
    },
{
        question: "Người ngồi trên xe mô tô hai bánh, ba bánh, xe gắn máy khi tham gia giao thông có được sử dụng ô khi trời mưa hay không? (Câu hỏi điểm liệt)",
        options: ["Được sử dụng.", "Chỉ người ngồi sau được sử dụng.", "Không được sử dụng.", "Được sử dụng nếu không có áo mưa."],
        answer: "c"
    },
{
        question: "Biển báo có dạng hình tròn, viền đỏ, nền trắng, trên nền có hình vẽ hoặc chữ số, chữ viết màu đen là loại biển gì dưới đây?",
        options: ["Biển báo nguy hiểm.", "Biển báo cấm.", "Biển báo hiệu lệnh.", "Biển báo chỉ dẫn."],
        answer: "b"
    },
{
        question: "Trên đường có nhiều làn đường cho xe đi cùng chiều được phân biệt bằng vạch kẻ phân làn đường, người điều khiển phương tiện phải cho xe đi như thế nào?",
        options: ["Cho xe đi trên bất kỳ làn đường nào hoặc giữa 2 làn đường nếu không có xe phía trước; khi cần thiết phải chuyển làn đường, người lái xe phải quan sát xe phía trước để đảm bảo an toàn.", "Phải cho xe đi trong một làn đường và chỉ được chuyển làn đường ở những nơi cho phép; khi chuyển làn cần phải có tín hiệu báo trước và phải đảm bảo an toàn.", "Phải cho xe đi trong một làn đường, khi cần thiết phải chuyển làn đường, người lái xe phải quan sát xe phía trước để đảm bảo an toàn."],
        answer: "b"
    },
{
    question: "Tại nơi đường giao nhau không có báo hiệu đi theo vòng xuyến, người điểm khiển phương tiện phải nhường đường như thế nào là đúng quy tắc giao thông?",
    options: ["Phải nhường đường cho xe đi đến từ bên phải.", "Xe báo hiệu xin đường trước xe đó được đi trước.", "Phải nhường đường cho xe đi từ bên trái."],
    answer: "a"
},
{
    question: "Tại ngã ba hoặc ngã tư không có đào an toàn, người lái xe phải nhường đường như thế nào là đúng trong các trường hợp dưới đây?",
    options: ["Nhường đường cho người đi bộ đang đi trên phần đường dành cho người đi bộ sang đường; nhường đường cho xe đi trên đường ưu tiên, đường chính từ bất kỳ hướng nào tới; nhường đường cho xe ưu tiên, xe đi từ bên phải đến.", "Nhường đường cho người đi bộ đang đứng chờ đi qua phần đường dành cho người đi bộ sang đường; nhường đường cho xe đi trên đường ngược chiều, đường nhánh từ bất kỳ hướng nào tới; nhường đường cho xe đi từ bên trái đến.", "Không phải nhường đường."],
    answer: "a"
},
{
    question: "Trên đường bộ (trừ đường cao tốc) trong khu vực đông dân cư, đường đôi có dải phân cách giữa, xe mô tô hai bánh, ô tô chờ người đến 30 chỗ tham gia giao thông với tốc độ tối đa cho phép là bao nhiêu?",
    options: ["60 km/h.", "50 km/h.", "40 km/h."],
    answer: "b"
},
{
        question: "Theo Luật Giao thông đường bộ, tín hiệu đèn giao thông gồm 3 màu nào dưới đây?",
        options: ["Đỏ - Vàng - Xanh.", "Cam - Vàng - Xanh.", "Vàng - Xanh dương - Xanh lá.", "Đỏ - Cam - Xanh."],
        answer: "a"
    },
{
        question: "Khi xảy ra tai nạn giao thông, có người bị thương nghiêm trọng, người lái xe và người có mặt tại hiện trường vụ tai nạn phải thực hiện các công việc gì dưới đây?",
        options: ["Thực hiện sơ cứu ban đầu trong trường hợp khẩn cấp: thông báo vụ tai nạn đến cơ quan thi hành pháp luật.", "Nhanh chóng lái xe gây tai nạn hoặc đi nhờ xe khác ra khỏi hiện trường vụ tai nạn.", "Cả A và B."],
        answer: "a"
    },
{
        question: "Những thói quen nào dưới đây khi điều khiển xe mô tô tay ga tham gia giao thông dễ gây tai nạn nguy hiểm?",
        options: ["Sử dụng còi.", "Phanh đồng thời cả phanh trước và phanh sau.", "Chỉ sử dụng phanh trước."],
        answer: "c"
    },
 {
            question: "Khi gặp biển nào thì xe mô tô hai bánh được đi vào?",
            options: ["Không biển nào", "Biển 1 và 2", "Biển 2 và 3", "Cả 3 biển"],
            answer: "c",
            image: "101-149/102, 103.png"
        },
{
            question: "Biển nào xe được phép quay đầu nhưng không được rẽ trái?",
            options: ["Biển 1.", "Biển 2.", "Cả 2 biển."],
            answer: "a",
            image:"101-149/111.png"
        },
{
            question: "Chiều dài đoạn đường 500m từ nơi đặt biển này, người lái xe có được phép bấm còi không?",
            options: ["Được phép.", "Không được phép."],
            answer: "b",
            image:"101-149/119.png"
        },
{
            question: "Biển nào báo hiệu “Giao nhau với đường sắt có rào chắn”?",
            options: ["Biển 1.", "Biển 2 và 3.", "Biển 3."],
            answer: "a",
            image:"101-149/126, 127, 128.png"
        },
{
            question: "Biển nào báo hiệu “Đường bị thu hẹp”?",
            options: ["Biển 1 và 2.", "Biển 1 và 3.", "Biển 2 và 3.", "Cả 3 biển."],
            answer: "a",
            image:"101-149/135.png"
        },
{
            question: "Biển nào báo hiệu “Chú ý chướng ngại vật”?",
            options: ["Biển 1.", "Biển 2 va biển 3.", "Biển 3."],
            answer: "b",
            image:"101-149/143.png"
        },
 {
            question: "Hiệu lực của biển “Tốc độ tối đa cho phép” hết tác dụng khi gặp biển nào dưới đây?",
            options: ["Biển 1.", "Biển 2.", "Biển 3.", "Biển 1 và 2."],
            answer: "d",
            image:"150-200/150, 151, 152.png"
        },
{
            question: "Biển số 1 có ý nghĩa gì?",
            options: ["Đi thẳng hoặc rẽ trái trên cầu vượt.", "Đi thẳng hoặc rẽ phải trên cầu vượt", "Báo hiệu cầu vượt liên thông."],
            answer: "c",
            image:"150-200/159.png"
        },
{
            question: "Thứ tự các xe đi như thế nào là đúng quy tắc giao thông?",
            options: ["Xe tải, xe con, mô tô.", "Xe con, xe tải, mô tô.", "Mô tô, xe con, xe tải.", "Xe con, mô tô, xe tải."],
            answer: "c",
            image:"150-200/167.png"
        },
{
            question: "Xe nào đỗ vi phạm quy tắc giao thông?",
            options: ["Cả 2 xe.", "Không xe nào vi phạm.", "Chỉ xe mô tô vi phạm.", "Chỉ xe tải vi phạm."],
            answer: "a",
            image:"150-200/175.png"
        },
{
        question: "Theo mũi tên, xe nào được phép đi.",
        options: ["Mô tô, xe con.", "Xe con, xe tải.", "Mô tô, xe tải.", "Cả 3 xe."],
        answer: "c",
        image:"150-200/183.png"
    },
{
        question: "Các xe đi theo hướng mũi tên, xe nào vi phạm quy tắc giao thông?",
        options: ["Xe con.", "Xe tải.", "Xe con, xe tải."],
        answer: "b",
        image:"150-200/191.png"
    },
{
        question: "Xe của bạn đang di chuyển gần đến khu vực giao cắt với đường sắt, khi rào chắn đang dịch chuyển, bạn điều khiển xe như thế nào là đúng quy tắc giao thông?",
        options: ["Quan sát nếu thấy không có tàu thì tăng tốc cho xe vượt qua đường sắt.", "Dừng lại trước rào chắn một khoảng cách an toàn.", "Ra tín hiệu, yêu cầu người gác chắn tàu kéo chậm Barie để xe bạn qua."],
        answer: "b",
        image:"150-200/199.png"
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
            form.action = 'KetQua7.php';
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
