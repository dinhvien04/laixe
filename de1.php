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
            question: "Phần của đường bộ được sử dụng cho các phương tiện giao thông qua lại là gì?",
            options: ["Phần mặt đường vào lề đường.", "Phần đường xe chạy.", "Phần đường xe cơ giới."],
            answer: "b"
        },
        {
            question: "“Phương tiện tham gia giao thông đường bộ” gồm những loại nào?",
            options: ["Phương tiện giao thông cơ giới đường bộ.", "Phương tiện giao thông thô sơ đường bộ và xe máy chuyên dùng.", "Cả A và B."],
            answer: "c"
        },
        {
        question: "Sử dụng rượu, bia khi lái xe, nếu bị phát hiện thì bị xử lý như thế nào?",
        options: ["Chỉ bị nhắc nhở.", "Bị xử phạt hành chính hoặc có thể bị xử lý hình sự tùy theo mức độ vi phạm.", "Không bị xử lý hình sự."],
        answer: "b"
        },
        {
        question: "Bạn đang lái xe, phía trước có một xe cảnh sát giao thông không phát tín hiệu ưu tiên bạn có được phép vượt hay không?",
        options: ["Không được vượt.", "Được vượt khi đang trên cầu.", "Được phép vượt khi đi qua nơi giao thông có ít phương tiện cùng tham gia giao thông.", "Được vượt khi đảm bảo an toàn."],
        answer: "d"
        },
        {
        question: "Hành vi sử dụng xe mô tô để kéo, đẩy xe mô tô khác bị hết xăng đến trạm mua xăng có được phép hay không? (Câu hỏi điểm liệt)",
        options: ["Chỉ được kéo nếu đã nhìn thấy trạm xăng.", "Chỉ được thực hiện trên đường vắng phương tiện cùng tham gia giao thông.", "Không được phép."],
        answer: "c"
        },
        {
        // 41 CAU NÀY PHẢI THÊM HÌNH
        question: "Biển báo hiệu hình tròn có nền xanh lam có hình vẽ màu trắng là loại biển báo gì dưới đây?",
        options: ["Biển báo nguy hiểm.", "Biển báo cấm.", "Biển báo hiệu lệnh.", "Biển báo chỉ dẫn."],
        answer: "c"
        },
        {
        // 49
        question: "Bạn đang lái xe trong khu vực đô thị từ 22h đêm đến 5h sáng hôm sau và cần vượt một xe khác, bạn cần báo hiệu như thế nào để đảm bảo an toàn giao thông?",
        options: ["Phải báo hiệu bằng đèn hoặc còi.", "Chỉ được báo hiệu bằng còi.", "Phải báo hiệu bằng cả còi và đèn.", "Chỉ được báo hiệu bằng đèn."],
        answer: "d"
        },
        {
    question: "Người điều khiển phương tiện tham gia giao thông trong hầm đường bộ ngoài việc phải tuân thủ các quy tắc giao thông còn phải thực hiện những quy định nào dưới đây?",
    options: ["Xe cơ giới, xe máy chuyên dùng phải bật đèn; xe thô sơ phải bật đèn hoặc có vật phát sáng báo hiệu chỉ được dừng xe, đỗ xe ở nơi quy định.", "Xe cơ giới phải bật đèn ngay cả khi đường hầm sáng; phải cho xe chạy trên một làn đường và chỉ chuyển làn ở nơi được phép; được quay đầu xe, lùi xe khi cần thiết.", "Xe máy chuyện dụng phải bật đèn ngay cả khi đường hầm sáng; phải cho xe chạy trên một làn đường và chỉ chuyển làn ở nơi được phép; được quay đầu xe, lùi xe khi cần thiết."],
    answer: "b"
        },
        {
    question: "Trên đoạn đường hai chiều không có giải phân cách giữa, người lái xe không được vượt xe khác trong các trường hợp nào dưới đây?",
    options: ["Xe bị vượt bất ngờ tăng tốc độ và cố tình không nhường đường.", "Xe bị vượt giảm tốc độ và nhường đường.", "Phát hiện có xe đi ngược chiều.", "Cả A và B."],
    answer: "d"
    },
    {
    question: "Khi điều khiển xe chạy với tốc độ dưới 60 km/h, để đảm bảo khoảng cách an toàn giữa hai xe, người lái xe phải điều khiển xe như thế nào?",
    options: ["Chủ động giữ khoảng cách an toàn phù hợp với xe chạy liền trước xe của mình.", "Đảm bảo khoảng cách an toàn theo mật độ phương tiện, tình hình giao thông thực tế.", "Cả A và B."],
    answer: "c"
},
{
        question: "Để báo hiệu cho xe phía trước biết xe mô tô của bạn muốn vượt, bạn phải có tín hiệu như thế nào dưới đây?",
        options: ["Ra tín hiệu bằng tay rồi cho xe vượt qua.", "Tăng ga mạnh để gây sự chú ý rồi cho xe vượt qua.", "Bạn phải có tín hiệu bằng đèn hoặc còi."],
        answer: "c"
    },
    {
        question: "Khi điều khiển xe mô tô tay ga xuống đường dốc dài, độ dốc cao, người lái xe cần thực hiện các thao tác nào dưới đây để đảm bảo an toàn?",
        options: ["Giữ tay ga ở mức độ phù hợp, sử dụng phanh trước và phanh sau để giảm tốc độ.", "Nhả hết tay ga, tắt động cơ, sử dụng phanh trước và phanh sau để giảm tốc độ.", "Sử dụng phanh trước để giảm tốc độ kết hợp với tất cả cần khóa điên của xe."],
        answer: "a"
    },
    {
        question: "Tay ga trên xe mô tô hai bánh có tác dụng gì trong các trường hợp dưới đây?",
        options: ["Để điều khiển xe chạy về phía trước.", "Để điều tiết công suất động cơ qua đó điều khiển tốc độ của xe.", "Để điều khiển xe chạy lùi.", "Cả A và B."],
        answer: "d"
        },
        {
            question: "Biển nào cấm xe rẽ trái?",
            options: ["Biển 1", "Biển 2", "Cả 2 biển.", "Không biển nào."],
            answer: "a",
            image:"101-149/104, 105, 106.png"
        },
        {
            question: "Biển nào dưới đây các phương tiện không được phép đi vào?",
            options: ["Biển 1.", "Biển 2.", "Biển 1 và 2."],
            answer: "b",
            image:"101-149/112, 113.png"
        },
        {
            question: "Biển nào xe mô tô hai bánh không được đi vào?",
            options: ["Biển 1.", "Biển 2.", "Biển 3."],
            answer: "a",
            image:"101-149/120, 121.png"
        },
        {
            question: "Biển nào báo hiệu nguy hiểm giao nhau với đường sắt?",
            options: ["Biển 1 và 2.", "Biển 1 và 3.", "Biển 2 và 3.", "Cả 3 biển."],
            answer: "b",
            image:"101-149/129.png"
        },
        {
            question: "Biển nào báo hiệu “Đường giao nhau” của các tuyến đường cùng cấp?",
            options: ["Biển 1.", "Biển 2.", "Biển 3."],
            answer: "a",
            image:"101-149/137.png"
        },
        {
            question: "Biển nào chỉ dẫn nơi bắt đầu đoạn đường dành cho người đi bộ?",
            options: ["Biển 1.", "Biển 2.", "Biển 3."],
            answer: "b",
            image:"101-149/145.png"
        },
        {
            question: "Biển nào dưới đây báo hiệu hết cấm vượt?",
            options: ["Biển 1.", "Biển 2.", "Biển 3.", "Biển 2 và 3."],
            answer: "d",
            image:"150-200/153.png"
        },
        {
            question: "Vạch kẻ đường nào dưới đây là vạch phân chia hai chiều xe chạy (vạch tìm đường), xe không được lấn làn, không được đè lên vạch?",
            options: ["Vạch 1.", "Vạch 2.", "Vạch 3.", "Cả 3 vạch."],
            answer: "b",
            image:"150-200/161.png"
        },
        {
            question: "Xe nào được quyền đi trước trong trường hợp này?",
            options: ["Mô tô.", "Xe cứu thương."],
            answer: "b",
            image:"150-200/169.png"
        },
        {
            question: "Xe tải kéo mô tô ba bánh như hình này có đúng quy tắc giao thông hay không?",
            options: ["Đúng.", "Không đúng."],
            answer: "b",
            image:"150-200/177.png"
        },
        {
            question: "Theo hướng mũi tên, những hướng nào xe mô tô được phép đi?",
            options: ["Cả 3 hướng.", "Hướng 1 và 2.", "Hướng 1 và 3.", "Hướng 2 và 3."],
            answer: "c",
            image:"150-200/185.png"
        },
        {
            question: "Các xe đi theo hướng mũi tên, xe nào vi phạm quy tắc giao thông?",
            options: ["Xe khách, xe tải, mô tô.", "Xe tải, xe con, mô tô.", "Xe khách, xe con, mô tô."],
            answer: "a",
            image:"150-200/171.png"
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
            //
           

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
                form.action = 'KetQua1.php';
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
