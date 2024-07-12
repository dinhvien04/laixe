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
            question: "“Làn đường” là gì?",
            options: ["Là một phần của phần đường xe chạy được chia theo chiều dọc của đường sử dụng cho xe chạy.", "Là một phần của đường xe chạy được chia theo chiều dọc của đường, có bề rộng đủ cho xe chạy an toàn.", "Là đường cho xe ô tô chạy, dừng, đỗ an toàn."],
            answer: "b"
        },
        {
        question: "“Người tham gia giao thông đường bộ” gồm những đối tượng nào?",
        options: ["Người điều khiển, người sử dụng phương tiện tham gia giao thông đường bộ.", "Người điều khiển, dẫn dắt súc vật; người đi bộ trên đường bộ.", "Cả A và B."],
        answer: "c"
        },
        {
        question: "Theo luật phòng chống tác hại của rượu, bia, đối tượng nào dưới đây bị cấm sử dụng rượu, bia khi tham gia giao thông?",
        options: ["Người điều khiển: Xe ô tô, xe mô tô, xe đạp, xe gắn máy.", "Người ngồi phía sau người điều khiển xe cơ giới.", "Người đi bộ.", "Cả ý A và B."],
        answer: "d"
        },
        {
        question: "Người điều khiển xe mô tô hai bánh, ba bánh, xe gắn máy có được phép sử dụng xe để kéo hoặc đẩy các phương tiện khác khi tham gia giao thông không? (Câu hỏi điểm liệt)",
        options: ["Được phép.", "Nếu phương tiện được kéo, đẩy có khối lượng nhỏ hơn phương tiện của mình.", "Tùy trường hợp.", "Không được phép."],
        answer: "d"
        },
    {
        // 34
        question: "Hành vi vận chuyển đồ vật cồng kềnh bằng xe mô tô, xe gắn máy khi tham gia giao thông có được phép hay không? (Câu hỏi điểm liệt)",
        options: ["Không được vận chuyển.", "Chỉ được vận chuyển khi đã chằng buộc cẩn thận.", "Chỉ được vận chuyển vật cồng kềnh trên xe máy nếu khoảng cách về nhà ngắn hơn 2km."],
        answer: "a"
    },
    {
        // 42chư gắn hình
        question: "Biển báo hiệu hình chữ nhật hoặc hình vuông, hình vẽ mũi tên, nền xanh lam là loại biển báo gì dưới đây?",
        options: ["Biển báo nguy hiểm.", "Biển báo cấm.", "Biển báo hiệu lệnh phải thi hành.", "Biển báo chỉ dẫn."],
        answer: "d"
    },
    {
        // 50
        question: "Khi điều khiển xe chạy trên đường biết có xe sau xin vượt nếu đủ điều kiện an toàn thì người lái xe phải làm gì?",
        options: ["Tăng tốc độ và ra hiệu cho xe sau vượt, không được gây trở ngại cho xe sau vượt.", "Người điều khiển phương tiện phía trước phải giảm tốc độ đi sát về bên phải của phần đường xe chạy cho đến khi xe sau đã vượt qua, không được gây trở ngại cho xe sau vượt.", "Cho xe tránh về bên trái mình và ra hiệu cho xe sau vượt; nếu có chướng ngại vật phía trước hoặc thiếu điều kiện an toàn chưa cho vượt được phải ra hiệu cho xe sau biết; cấm gây trở ngại cho xe xin vượt."],
        answer: "b"
    },
    {
    question: "Những người ngồi trên xe mô tô 2 bánh, xe gắn máy phải đội mũ bảo hiểm cóc ài quau đúng quy cách khi nào?",
    options: ["Khi tham gia giao thông đường bộ.", "Chỉ khi đi trên đường chuyên dùng; đường cao tốc.", "Khi tham gia thông trên đường tỉnh lộ hoặc quốc lộ."],
    answer: "a"
},
{
    question: "Người lái xe mô tô xử lý như thế nào khi cho xe mô tô phía sau vượt?",
    options: ["Nếu đủ điều kiện an toàn, người lái xe phải giảm tốc độ, đi sát về bên phải của phần đường xe chạy cho đến khi xe sau đã vượt qua, không được gây trở ngại đối với xe xin vượt.", "Lái xe vào lề đường bên trái và giảm tốc độ để xe phía sau vượt qua, không được gây trở ngại đối với xe xin vượt.", "Nếu đủ điều kiện an toàn, người lái xe phải tăng tốc độ, đi sát về bên phải của phần đường xe chạy cho đến khi xe sau đã vượt qua."],
    answer: "a"
},
{
    question: "Người lái xe phải giảm tốc độ thấp hơn tốc độ tối đa cho phép đến mức cần thiết, chú ý quan sát và chuẩn bị sẵn sàng những tình huống có thể xảy ra đề phòng ngừa tai nạn trong các trường hợp nào dưới đây?",
    options: ["Gặp biển báo nguy hiểm trên đường.", "Gặp biển chỉ dẫn trên đường.", "Gặp biển báo hết mọi lệnh cấm.", "Gặp biển báo hết hạn chế tốc độ tối đa cho phép."],
    answer: "a"
},
{
        question: "Người điều khiển xe mô tô phải giảm tốc độ và hết sức thận trọng khi qua những đoạn đường nào dưới đây?",
        options: ["Đường ướt, đường có sỏi cát trên nền đường.", "Đường hẹp có nhiều điểm giao cắt từ hai phía.", "Đường đèo dốc, vòng liên tục.", "Tất cả các ý nêu trên."],
        answer: "d"
    },
    {
        question: "Khi quay đầu xe, người lái xe cần phải quan sát và thực hiện các thao tác nào để đảm bảo an toàn giao thông?",
        options: ["Quan sát biển báo hiệu để biết nơi được phép quay đầu, quan sát kỹ địa hình nơi chọn để quay đầu; lựa chọn quỹ đạo quay đầu xe cho thích hợp, quay đầu xe với tốc độ thấp, thường xuyên bảo tín hiệu để người, các phương tiện xung quanh được biết, nếu quay đầu xe ở nơi nguy hiểm thì đưa đầu xe về phía nguy hiểm đưa đuôi xe về phía an toàn.", "Quan sát biển báo hiệu để biết nơi được phép quay đầu; quan sát kỹ địa hình nơi chọn để quay đầu, lựa chọn quỹ đạo quay đầu xe, quay đầu xe với tốc độ tối đa, thường xuyên báo tín hiệu để người, các phương tiện xung quanh được biết, nếu quay đầu xe ở nơi nguy hiểm thì đưa đuôi xe về phía nguy hiếm và đầu xe về phía an toàn."],
        answer: "a"
    },
    {
        question: "Gương chiếu hậu của xe mô tô hai bánh có tác dụng gì trong các trường hợp dưới đây?",
        options: ["Để quan sát an toàn phía bên trái khi chuẩn bị rẽ trái.", "Để quan sát an toàn phía bên phải khi chuẩn bị rẽ phải.", "Để quan sát an toàn phía sau cả bên trái và bên phải trước khi chuyển hướng.", "Để quan sát an toàn phía trước cả bên trái và bên phải trước khi chuyển hướng."],
        answer: "c"
    },
    {
            question: "Khi gặp biển xe nào được rẽ trái?",
            options: ["Biển 1.", "Biển 2.", "Không biển nào", "Cả 2 biển"],
            answer: "b",
            image: "101-149/104, 105, 106.png"
        },
        {
            question: "Khi gặp biển nào xe ưu tiên theo luật vẫn phải dừng lại?",
            options: ["Biển 1.", "Biển 2.", "Cả ba biển."],
            answer: "a",
            image:"101-149/114.png"
        },
        {
            question: "Biển báo nào báo hiệu bắt đầu đoạn đường vào phạm vi khu dân cư, các phương tiện tham gia giao thông phải tuân theo các quy định đi đường được áp dụng ở khu đông dân cư?",
            options: ["Biển 1.", "Biển 2."],
            answer: "c",
            image:"101-149/122.png"
        },
        {
            question: "Biển nào báo hiệu đường sắt giao nhau với đường bộ không có rào chắn?",
            options: ["Biển 1 và 2.", "Biển 1 và 3.", "Biển 2 và 3.", "Cả 3 biển."],
            answer: "c",
            image:"101-149/130.png"
        },
        {
            question: "Biển nào báo hiệu “Đường đôi”?",
            options: ["Biển 1.", "Biển 2.", "Biển 3."],
            answer: "b",
            image:"101-149/138.png"
        },
        {
            question: "Biển báo này có ý nghĩa gì?",
            options: ["Báo hiệu đường có ổ gà, lồi lõm.", "Báo hiệu đường có gồ giảm tốc phía trước."],
            answer: "b",
            image:"101-149/146.png"
        },
        {
            question: "Trong các biển dưới đây biển nào là biển “Hết mọi lệnh cấm”?",
            options: ["Biển 1.", "Biển 2.", "Biển 3.", "Cả 3 biển."],
            answer: "b",
            image:"150-200/154.png"
        },
        {
            question: "Vạch kẻ đường nào dưới đây là vạch phân chia hai chiều xe chạy (vạch tìm đường)?",
            options: ["Vạch 1.", "Vạch 2.", "Vạch 3.", "Vạch 1 và 3."],
            answer: "d",
            image:"150-200/162.png"
        },
        {
            question: "Theo tín hiệu đèn, xe nào được phép đi?",
            options: ["Xe con và xe khách.", "Mô tô."],
            answer: "a",
            image:"150-200/170.png"
        },
        {
            question: "Xe nào được quyền đi trước trong trường hợp này?",
            options: ["Mô tô.", "Xe cứu thương."],
            answer: "b",
            image:"150-200/169.png"
        },
        {
        question: "Trong trường hợp này, thứ tự xe đi như thế nào là đúng quy tắc giao thông?",
        options: ["Xe công an, xe quân sự, xe con + mô tô.", "Xe quân sự, xe công an, xe con + mô tô.", "Xe mô tô + xe con, xe quân sự, xe công an."],
        answer: "b",
        image:"150-200/186.png"
    },
    {
        question: "Các xe đi theo hướng mũi tên, xe nào chấp hành đúng quy tắc giao thông?",
        options: ["Xe tải, mô tô.", "Xe khách, mô tô.", "Xe tải, xe con.", "Mô tô, xe con."],
        answer: "b",
        image:"150-200/194.png"
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
