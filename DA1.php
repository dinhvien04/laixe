<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Results</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">   
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            border: 2px solid #0074D9;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        .summary {
            text-align: center;
            margin-bottom: 20px;
            font-size: 18px;
            padding: 10px;
            background-color: #f2f2f2;
            border-radius: 8px;
        }
        .summary p {
            margin: 5px;
        }
        .question {
            margin-bottom: 40px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 20px;
        }
        .question p {
            margin: 0;
            padding: 0;
            font-size: 16px;
        }
        .question p strong {
            font-weight: bold;
            font-size: 18px;
            color: #333;
        }
        .question p span {
            font-weight: bold;
        }
        .correct-answer {
            color: #28a745;
        }
        .icon {
            font-size: 24px;
            margin-right: 5px;
        }
        .question:hover {
            background-color: #f2f2f2;
            transition: background-color 0.3s ease;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><i class="icon fas fa-poll"></i> Kết quả thi Đề 1</h1>
        <div id="summary" class="summary"></div>
        <div id="question-results"></div>
    </div>

    <script>
        // Câu hỏi và đáp án đúng
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
        // Lấy kết quả từ Local Storage
        const userAnswers = JSON.parse(localStorage.getItem('userAnswers'));

        function displayResults() {
            const questionResultsDiv = document.getElementById('question-results');
            questionResultsDiv.innerHTML = '';

            questions.forEach((q, index) => {
                const questionDiv = document.createElement('div');
                questionDiv.classList.add('question');

                const questionText = document.createElement('p');
                questionText.innerHTML = `<strong>Câu ${index + 1}: ${q.question}</strong>`;
                questionDiv.appendChild(questionText);

                q.options.forEach((option, optionIndex) => {
                    const optionLetter = String.fromCharCode(97 + optionIndex);
                    const optionText = document.createElement('p');
                    optionText.innerHTML = `${optionLetter}. ${option}`;

                    if (optionLetter === q.answer) {
                        optionText.classList.add('correct-answer');
                        optionText.innerHTML += ' <i class="icon fas fa-check-circle"></i>';
                    }

                    questionDiv.appendChild(optionText);
                });

                questionResultsDiv.appendChild(questionDiv);
            });
        }
        //hình ảnh
        function displayResults() {
    const questionResultsDiv = document.getElementById('question-results');
    questionResultsDiv.innerHTML = '';

    questions.forEach((q, index) => {
        const questionDiv = document.createElement('div');
        questionDiv.classList.add('question');

        const questionText = document.createElement('p');
        questionText.innerHTML = `<strong>Câu ${index + 1}: ${q.question}</strong>`;
        questionDiv.appendChild(questionText);

        // Add image if available
        if (q.image) {
            const imageElement = document.createElement('img');
            imageElement.src = q.image;
            imageElement.style.maxWidth = '100%';
            questionDiv.appendChild(imageElement);
        }

        q.options.forEach((option, optionIndex) => {
            const optionLetter = String.fromCharCode(97 + optionIndex);
            const optionText = document.createElement('p');
            optionText.innerHTML = `${optionLetter}. ${option}`;

            if (optionLetter === q.answer) {
                optionText.classList.add('correct-answer');
                optionText.innerHTML += ' <i class="icon fas fa-check-circle"></i>';
            }

            questionDiv.appendChild(optionText);
        });

        questionResultsDiv.appendChild(questionDiv);
    });
}


        window.onload = displayResults;
    </script>
</body>
</html>
