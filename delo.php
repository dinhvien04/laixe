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
            // 1
            question: "Phần của đường bộ được sử dụng cho các phương tiện giao thông qua lại là gì?",
            options: ["Phần mặt đường vào lề đường.", "Phần đường xe chạy.", "Phần đường xe cơ giới."],
            answer: "b"
        },
        { 
            // 2
            question: "“Làn đường” là gì?",
            options: ["Là một phần của phần đường xe chạy được chia theo chiều dọc của đường sử dụng cho xe chạy.", "Là một phần của đường xe chạy được chia theo chiều dọc của đường, có bề rộng đủ cho xe chạy an toàn.", "Là đường cho xe ô tô chạy, dừng, đỗ an toàn."],
            answer: "b"
        },
        {
            // 3
            question: "Trong các khái niệm dưới đây, “dải phân cách” được hiểu như thế nào là đúng?",
            options: ["Là bộ phận của đường để ngăn cách không cho các loại xe vào những nơi không được phép.", "Là bộ phận của đường để phân tách phần đường xe chạy và hành lang an toàn giao thông.", "Là bộ phận của đường để phân chia mặt đường thành hai chiều xe chạy riêng biệt hoặc để phân chia phần đường của xe cơ giới và xe thô sơ."],
            answer: "c"
        },
        {
            // 4
            question: "“Dải phân cách” trên đường bộ gồm những loại nào?",
            options: ["Dải phân cách gồm loại cố định vào loại di động.", "Dải phân cách gồm tường chống ồn, hộ lan cứng và hộ lan mềm.", "Dải phân cách gồm giá long môn và biến báo hiệu đường bộ."],
            answer: "a"
        },
        {
            // 5
            question: "Người lái xe được hiểu như nào trong các khái niệm dưới đây?",
            options: ["Là người điều khiển xe cơ giới.", "Là người điều khiển xe thô sơ.", "Là người điều khiển xe có súc vật kéo."],
            answer: "a"
        },
        {
            // 6
            question: "Khái niệm “phương tiện giao thông cơ giới đường bộ” được hiểu như thế nào là đúng?",
            options: ["Gồm xe ô tô; máy kéo; xe mô tô hai bánh; xe mô tô ba bánh; xe gắn máy; xe cơ giới dùng cho người khuyết tật và xe máy chuyên dùng.", "Gồm xe ô tô; máy kéo; rơ moóc hoặc sơ mi rơ moóc được kéo bởi xe ô tô, máy kéo; xe mô tô hai bánh; xe mô tô ba bánh, xe gắn máy (kể cả xe máy điện) và các lại xe tương tự."],
            answer: "b"
        },
        {
            // 7
            question: "Đường mà trên đó phương tiện tham gia giao thông được các phương tiện giao thông đến từ hướng khác nhường đường khi qua nơi đường giao nhau, được cắm biển báo hiệu đường ưu tiên là loại đường gì?",
            options: ["Đường không ưu tiên.", "Đường tỉnh lộ.", "Đường quốc lộ.", "Đường ưu tiên."],
            answer: "b"
        },
        {
            // 8
            question: "Khái niệm “phương tiện giao thông thô sơ đường bộ” được hiểu như thế nào là đúng?",
            options: ["Gồm xe đạp (kể cả xe đạp máy, xe đạp điện), xe xích lô, xe lăn dùng cho người khuyết tật, xe súc vật kéo và các loại xe tương tự.", "Gồm xe đạp (kể cả xe đạp máy, xe đạp điện), xe gắn máy, xe cơ giới dùng cho người khuyết tật, xe súc vật kéo và các loại xe tương tự.", "Gồm xe ô tô, máy kéo, rơ moóc hoặc sơ mi rơ moóc được kéo bởi xe ô tô, máy kéo."],
            answer: "a"
        },
        {
            // 9
            question: "“Phương tiện tham gia giao thông đường bộ” gồm những loại nào?",
            options: ["Phương tiện giao thông cơ giới đường bộ.", "Phương tiện giao thông thô sơ đường bộ và xe máy chuyên dùng.", "Cả A và B."],
            answer: "c"
        },
        {
            // 10
            question: "“Người tham gia giao thông đường bộ” gồm những đối tượng nào?",
            options: ["Người điều khiển, người sử dụng phương tiện tham gia giao thông đường bộ.", "Người điều khiển, dẫn dắt súc vật; người đi bộ trên đường bộ.", "Cả A và B."],
            answer: "c"
        },
        {
            // 11
            question: "“Người điều khiển phương tiện tham gia giao thông đường bộ” gồm những đối tượng nào dưới đây?",
            options: ["Người điều khiển xe cơ giới, người điều khiển xe thô sơ.", "Người điều khiển xe máy chuyên dùng tham gia giao thông đường bộ.", "Cả A và B."],
            answer: "c"
        },
        {
            // 12
            question: "Khái niệm “người điều khiển giao thông” được hiểu như thế nào là đúng?",
            options: ["Là người điều khiển phương tiện tham gia giao thông tại nơi thi công, nơi ùn tắc giao thông, ở bến phà, tại cầu đường bộ đi chung với đường sắt.", "Là cảnh sát giao thông, người được giao nhiệm vụ hướng dẫn giao thông tại nơi thi công, nơi ùn tắc giao thông, ở bến phà, tại cầu đường bộ đi chung với đường sắt.", "Là người tham gia giao thông tại nơi thi công, nơi ùn tắc giao thông, ở bến phà, tại cầu đường bộ đi chung với đường sắt."],
            answer: "b"
        },
        {
            // 13
            question: "Trong các khái niệm dưới đây khái niệm “dừng xe” được hiểu như thế nào là đúng?",
            options: ["Là trạng thái đứng yên của phương tiện giao thông không giới hạn thời gian để cho người lên, xuống phương tiện, xếp dỡ hàng hóa hoặc thực hiện công việc khác.", "Là trạng thái đứng yên tạm thời của phương tiện giao thông trong một khoảng thời gian cần thiết đủ để cho người lên, xuống phương tiện, xếp dỡ hàng hóa hoặc thực hiện công việc khác.", "Là trạng thái đứng yên của phương tiện giao thông không giới hạn thời gian giữa 02 lần vận chuyển hàng hóa hoặc hành khách."],
            answer: "b"
        },
        {
            // 14
            question: "Khái niệm “đỗ xe” được hiểu như thế nào là đúng?",
            options: ["Là trạng thái đứng yên của phương tiện giao thông có giới hạn trong một khoảng thời gian cần thiết đủ để cho người lên, xuống phương tiện đó, xếp dỡ hàng hóa hoặc thực hiện công việc khác.", "Là trạng thái đứng yên của phương tiện giao thông không giới hạn thời gian.", "Là trạng thái đứng yên của phương tiện giao thông không giới hạn thời gian để cho người lên, xuống phương tiện, xếp dỡ hàng hóa hoặc thực hiện công việc khác."],
            answer: "b"
        },
        {
            // 15
            question: "Cuộc đua xe chỉ được thực hiện khi nào?",
            options: ["Diễn ra trên đường phố không có người qua lại.", "Được người dân ủng hộ.", "Được cơ quan có thẩm quyền cấp phép."],
            answer: "c"
        },
        {
            // 16
            question: "Người điều khiển phương tiện giao thông đường bộ mà trong cơ thể có chất ma túy có bị nghiêm cấm hay không?",
            options: ["Bị nghiêm cấm.", "Không bị nghiêm cấm.", "Không bị nghiêm cấm, nếu có chất ma túy ở mức nhẹ, có thể điều khiển phương tiện tham gia giao thông."],
            answer: "a"
        },
        {
            // 17
            question: "Sử dụng rượu, bia khi lái xe, nếu bị phát hiện thì bị xử lý như thế nào?",
            options: ["Chỉ bị nhắc nhở.", "Bị xử phạt hành chính hoặc có thể bị xử lý hình sự tùy theo mức độ vi phạm.", "Không bị xử lý hình sự."],
            answer: "b"
        },
        {
            // 18
            question: "Theo luật phòng chống tác hại của rượu, bia, đối tượng nào dưới đây bị cấm sử dụng rượu, bia khi tham gia giao thông?",
            options: ["Người điều khiển: Xe ô tô, xe mô tô, xe đạp, xe gắn máy.", "Người ngồi phía sau người điều khiển xe cơ giới.", "Người đi bộ.", "Cả ý A và B."],
            answer: "d"
        },
        {
            // 19
            question: "Hành vi điều khiển xe cơ giới chạy quá tốc độ quy định, giành đường, vượt ẩu có bị nghiêm cấm hay không?",
            options: ["Bị nghiêm cấm tùy từng trường hợp.", "Không bị nghiêm cấm.", "Bị nghiêm cấm."],
            answer: "c"
        },
        {
            // 20
            question: "Khi lái xe trong khu đô thị và đông dân cư trừ các khu vực có biển cấm sử dụng còi, người lái xe được sử dụng còi như thế nào trong các trường hợp dưới đây?",
            options: ["Từ 22h đêm đến 5h sáng.", "Từ 5h sáng đến 22h đêm.", "Từ 23h đêm đến 5h sáng hôm sau."],
            answer: "b"
        },
        {
            // 21
            question: "Người lái xe sử dụng đèn như thế nào khi lái xe trong khu đô thị và đông dân cư vào ban đêm?",
            options: ["Bất cứ đèn nào miễn là nhìn rõ phía trước.", "Chỉ bật đèn chiếu xa (đèn pha) khi không nhìn rõ đường.", "Đèn chiếu xa (đèn pha) khi đường vắng, đèn pha chiếu gần (đèn cốt) khi có xe đi ngược chiều.", "Đèn chiếu gần (đèn cốt)."],
            answer: "d"
        },
        {
            // 22
            question: "Trong trường hợp đặc biệt, để được lắp đặt, sử dụng còi, đèn không đúng với thiết kế của nhà sản xuất đối với từng loại xe cơ giới bạn phải đảm bảo yêu cầu nào đươi đấy?",
            options: ["Phải đảm bảo phụ tùng do đúng nhà sản xuất đó cung cấp.", "Phải được chấp thuận của cơ quan có thẩm quyền.", "Phải là xe đăng ký và hoạt động tại các khu vực có địa hình phức tạp."],
            answer: "b"
        },
        {
            // 23
            question: "Ở phần đường dành cho người đi bộ qua đường, trên cầu, đầu cầu, đường cao tốc, đường hẹp, đường dốc, tại nơi đường bộ giao nhau cùng mức với đường sắt được quay đầu xe hay không?",
            options: ["Được phép.", "Không được phép.", "Tùy từng trường hợp."],
            answer: "b"
        },
        {
            // 24
            question: "Bạn đang lái xe, phía trước có một xe cảnh sát giao thông không phát tín hiệu ưu tiên bạn có được phép vượt hay không?",
            options: ["Không được vượt.", "Được vượt khi đang trên cầu.", "Được phép vượt khi đi qua nơi giao thông có ít phương tiện cùng tham gia giao thông.", "Được vượt khi đảm bảo an toàn."],
            answer: "d"
        },
        {
            // 25
            question: "Bạn đang lái xe, phía trước có 1 xe cứu thương đang phát tín hiệu ưu tiên bạn có được phép vượt hay không?",
            options: ["Không được vượt.", "Được vượt khi đang trên cầu.", "Được phép vượt khi đi qua nơi giao thông có ít phương tiện cùng tham gia giao thông.", "Được vượt khi đảm bảo an toàn."],
            answer: "a"
        }
    ];


    let currentQuestion = 0;
            let totalTime = 1200; // Total time in seconds (10 minutes)

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
            function submitQuizResults(userId, quizId, score) {
            const quizResults = JSON.parse(localStorage.getItem('quizResults')) || [];
            const result = {
            userId,
            quizId,
            score,
            dateTaken: new Date().toLocaleString()
            };
            quizResults.push(result);
            localStorage.setItem('quizResults', JSON.stringify(quizResults));
            alert('Kết quả đã được lưu thành công.');
            window.location.href = 'lichsu.html'; // Chuyển hướng đến trang lịch sử
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
                form.action = 'de999.php';
                const scoreInput = document.createElesment('input');
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
                let timer = duration, minutes, seconds;0
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
