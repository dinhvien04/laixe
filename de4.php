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
    question: "“Dải phân cách” trên đường bộ gồm những loại nào?",
    options: ["Dải phân cách gồm loại cố định vào loại di động.", "Dải phân cách gồm tường chống ồn, hộ lan cứng và hộ lan mềm.", "Dải phân cách gồm giá long môn và biến báo hiệu đường bộ."],
    answer: "a"
    },
{
    question: "Khái niệm “người điều khiển giao thông” được hiểu như thế nào là đúng?",
    options: ["Là người điều khiển phương tiện tham gia giao thông tại nơi thi công, nơi ùn tắc giao thông, ở bến phà, tại cầu đường bộ đi chung với đường sắt.", "Là cảnh sát giao thông, người được giao nhiệm vụ hướng dẫn giao thông tại nơi thi công, nơi ùn tắc giao thông, ở bến phà, tại cầu đường bộ đi chung với đường sắt.", "Là người tham gia giao thông tại nơi thi công, nơi ùn tắc giao thông, ở bến phà, tại cầu đường bộ đi chung với đường sắt."],
    answer: "b"
    },
{
    question: "Khi lái xe trong khu đô thị và đông dân cư trừ các khu vực có biển cấm sử dụng còi, người lái xe được sử dụng còi như thế nào trong các trường hợp dưới đây?",
    options: ["Từ 22h đêm đến 5h sáng.", "Từ 5h sáng đến 22h đêm.", "Từ 23h đêm đến 5h sáng hôm sau."],
    answer: "b"
    },
{
    question: "Khi điều khiển xe mô tô hai bánh, xe mô tô ba bánh, xe gắn máy, những hành vi nào không được phép? (Câu hỏi điểm liệt)",
    options: ["Buông cả hai tay; sử dụng xe để kéo, đẩy xe khác, vật khác; sử dụng chân chống của xe quẹt xuống đường khi xe đang chạy.", "Buông mội tay; sử dụng xe để chở người hoặc hàng hóa; để chân chạm xuống đất khi khởi hành.", "Đội mũ bảo hiểm; chạy xe đúng tốc độ quy định và chấp hành đúng quy tắc giao thông đường bộ.", "Chở người ngồi sau dưới 16 tuổi."],
    answer: "a"
    },
{
    question: "Người đủ 16 tuổi được điều khiển các loại xe nào dưới đây?",
    options: ["Xe mô tô 2 bánh có dung tích xi lanh từ 50cm3 trở lên.", "Xe gắn máy có dung tích xi-lanh dưới 50cm3.", "Xe ô tô tải dưới 3.500kg; xe chở người đến 9 chỗ ngồi.", "Tất cả các ý trên."],
    answer: "b"
    },
{
    question: "Khi gặp hiệu lệnh như dưới đây của cảnh sát giao thông thì người tham gia giao thông phải đi như thế nào là đúng quy tắc giao thông?",
    options: ["Người tham gia giao thông ở các hướng phải dừng lại.", "Người tham gia giao thông ở các hướng được đi theo chiều gậy chỉ của cảnh sát giao thông.", "Người tham gia giao thông ở phía trước và phía sau người điều khiển được đi tất cả các hướng; người tham gia giao thông ở phái bên phải và phía trái người điều khiển phải dừng lại.", "Người tham gia giao thông ở phía trước và phái sau người điều khiển phải dừng lại; người tham gia giao thông ở phía bên phải và bên trái người điều khiển được đi tất cả các hướng."],
    answer: "d"
    },
{
    question: "Khi tránh xe đi ngược chiều, các xe phải nhường đường như thế nào là đúng quy tắc giao thông?",
    options: ["Nơi đường hẹp chỉ đủ cho một xe chạy và có chỗ tránh xe thì xe nào ở gần chỗ tránh hơn phải vào vị trí tránh, nhường đường cho xe kia đi.", "Xe xuống dốc phải nhường đường cho xe đang lên dốc; xe nào có chường ngại vật phía trước phải nhường đường cho xe không có chướng ngại vật đi trước.", "Xe lên dốc phải nhường đường cho xe xuống dốc; xe nào không có chướng ngại vật phái trước phải nhường đường cho xe có chướng ngại vật đi trước."],
    answer: "d"
    },
{
    question: "Người điều khiển xe mô tô hai bánh, xe gắn máy không được thực hiện những hành vi nào dưới đây?",
    options: ["Đi vào phần đường dành cho người đi bộ và phương tiện khác; sử dụng ô, điện thoại di động, thiết bị âm thanh (trừ thiết bị trợ thính), di xe dàn hàng ngang.", "Chở 2 người; trong đó, có người bệnh đi cấp cứu hoặc trẻ em dưới 14 tuổi hoặc áp giải người có hành vi vi phạm pháp luật.", "Điều khiển phương tiện tham gia giao thông trên đường tỉnh lộ hoặc quốc lộ."],
    answer: "a"
    },
{
    question: "Đường bộ trong khu vực đông dân cư gồm những đoạn đường nào dưới đây?",
    options: ["Là đoạn đường nằm trong khu công nghiệp có đông người và phương tiện tham gia giao thông và được xác định cụ thể bằng biển chỉ dẫn địa giới.", "Là đoạn đường bộ nằm trong khu vực nội thành phố, nội thị xã, nội thị trấn và những đoạn đường có đông dân cư sinh sống sát dọc theo đường, có các hoạt động ảnh hưởng đến an toàn giao thông; được xác định bằng biển bảo hiệu là đường khu đông dân cư.", "Là đoạn đường nằm ngoài khu vực nội thành phố, nội thị xã có đông người và phương tiện tham gia giao thông và được xác định cụ thể bằng biển chỉ dẫn địa giới."],
    answer: "b"
    },
{
    question: "Tác dụng của mũ bảo hiểm đối với người ngồi trên xe mô tô hai bánh trong trường hợp xảy ra tai nạn giao thông là gì?",
    options: ["Để làm đẹp.", "Để tránh mưa nắng.", "Để giảm thiểu chấn thương vùng đầu.", "Để các loại phương tiện khác dễ quan sát."],
    answer: "c"
    },
{
    question: "Khái niệm về văn hóa giao thông được hiểu như thế nào là đúng?",
    options: ["Là sự hiểu biết và chấp hành nghiêm chỉnh pháp luật về giao thông: là ý thức trách nhiệm với cộng đồng khi tham gia giao thông.", "Là ứng xử có văn hóa, có tình yêu thương con người trong các tình huống không may xảy ra khi tham gia giao thông.", "Cả A và B."],
    answer: "c"
    },
{
    question: "Khi điều khiển xe trên đường vòng người lái xe cần phải làm gì để đảm bảo an toàn?",
    options: ["Quan sát cẩn thận các chướng ngại vật và báo hiệu bằng còi, đèn; giảm tốc độ tới mức cần thiết, về số thấp và thực hiện quay vòng với tốc độ phù hợp với bán kính cong của đường vòng.", "Quan sát cẩn thận các chướng ngại vật và báo hiệu bằng còi, đèn, tăng tốc để nhanh chóng qua đường vòng và giảm tốc độ sau khi qua đường vòng."],
    answer: "a"
    },
 {
    question: "Kỹ thuật cơ bản để giữ thăng bằng khi điều khiển xe mô tô đi trên đường gồ ghề như thế nào trong các trường hợp dưới đây?",
    options: ["Đứng thẳng trên giá gác chân lái sau đó hơi gập đầu gối và khuỷu tay, đi chậm để không nảy quá mạnh.", "Ngồi lùi lại phía sau, tăng ga vượt nhanh qua đoạn đường xóc.", "Ngồi lệch sang bên trái hoặc bên phải để lấy thăng bằng qua đoạn đường gồ ghề."],
    answer: "a"
    },
{
    question: "Biển nào cấm các phương tiện giao thông đường bộ rẽ trái?",
    options: ["Biển 1 và 2.", "Biển 1 và 3.", "Biển 2 và 3.", "Cả 3 biển."],
    answer: "a",
    image: "101-149/108.png"
    },
{
    question: "Gặp biển nào xe xích lô được phép đi vào?",
    options: ["Biển 1.", "Biển 2.", "Biển 3.", "Biển 1 và 2."],
    answer: "c",
    image:"101-149/116, 117.png"
    },
{
    question: "Biển nào chỉ đường dành cho người đi bộ, các loại xe không được đi vào khi gặp biển này?",
    options: ["Biển 1.", "Biển 1 và 3.", "Biển 3.", "Cả 3 biển."],
    answer: "c",
    image:"101-149/123, 124.png"
    },
{
    question: "Biển nào báo hiệu, chỉ dẫn xe đi trên đường ray này được quyền ưu tiên qua nơi giao nhau?",
    options: ["Biển 1 và 2.", "Biển 1 và 3.", "Biển 2 và 3.", "Cả 3 biển."],
    answer: "b",
    image:"101-149/132, 133, 134.png"
        },
{
    question: "Biển nào báo hiệu “Giao nhau với đường hai chiều”?",
    options: ["Biển 1.", "Biển 2.", "Biển 3."],
    answer: "a",
    image:"101-149/140.png"
    },
{
    question: "Biển nào báo hiệu “Hướng đi thẳng phải theo”?",
    options: ["Biển 1.", "Biển 2."],
    answer: "a",
    image:"101-149/148, 149.png"
    },
{
    question: "Biển nào chỉ dẫn cho người đi bộ sử dụng hầm chui qua đường?",
    options: ["Biển 1.", "Biển 2.", "Cả 2 biển.", "Không biển nào."],
    answer: "b",
    image:"150-200/156.png"
    },
{
    question: "Khi gặp vạch kẻ đường nào các xe được phép đè vạch?",
    options: ["Vạch 1.", "Vạch 2.", "Vạch 3.", "Vạch 1 và 3."],
    answer: "d",
    image:"150-200/164.png"
    },
{
    question: "Thứ tự các xe đi như thế nào là đúng quy tắc giao thông?",
    options: ["Xe khách, xe tải, mô tô, xe con.", "Xe con, xe khách, xe tải, mô tô.", "Mô tô, xe tải, xe khách, xe con.", "Mô tô, xe tải, xe con, xe khách."],
    answer: "c",
    image:"150-200/172.png"
    },
{
    question: "Xe nào được quyền đi trước trong trường hợp này?",
    options: ["Mô tô.", "Xe con."],
    answer: "a",
    image:"150-200/180.png"
    },
{
    question: "Trong hình dưới, những xe nào vi phạm quy tắc giao thông?",
    options: ["Xe con (B), mô tô (C).", "Xe con (A), mô tô (C).", "Xe con (E), mô tô (D).", "Tất cả các loại xe trên."],
    answer: "c",
    image:"150-200/188.png"
    },
{
    question: "Các xe đi theo thứ tự nào là đúng quy tắc giao thông đường bộ?",
    options: ["Xe của bạn, mô tô, xe con.", "Xe con, xe của bạn, mô tô.", "Mô tô, xe con, xe của bạn."],
    answer: "b",
    image:"150-200/196.png"
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
            form.action = 'KetQua4.php';
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
