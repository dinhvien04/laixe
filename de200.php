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
        //câu 1-25============================================================================================

        {
        question: "Phần của đường bộ được sử dụng cho các phương tiện giao thông qua lại là gì?",
        options: ["Phần mặt đường vào lề đường.", "Phần đường xe chạy.", "Phần đường xe cơ giới."],
        answer: "b"
    },
    {
        question: "“Làn đường” là gì?",
        options: ["Là một phần của phần đường xe chạy được chia theo chiều dọc của đường sử dụng cho xe chạy.", "Là một phần của đường xe chạy được chia theo chiều dọc của đường, có bề rộng đủ cho xe chạy an toàn.", "Là đường cho xe ô tô chạy, dừng, đỗ an toàn."],
        answer: "b"
    },
    {
        question: "Trong các khái niệm dưới đây, “dải phân cách” được hiểu như thế nào là đúng?",
        options: ["Là bộ phận của đường để ngăn cách không cho các loại xe vào những nơi không được phép.", "Là bộ phận của đường để phân tách phần đường xe chạy và hành lang an toàn giao thông.", "Là bộ phận của đường để phân chia mặt đường thành hai chiều xe chạy riêng biệt hoặc để phân chia phần đường của xe cơ giới và xe thô sơ."],
        answer: "c"
    },
    {
        question: "“Dải phân cách” trên đường bộ gồm những loại nào?",
        options: ["Dải phân cách gồm loại cố định vào loại di động.", "Dải phân cách gồm tường chống ồn, hộ lan cứng và hộ lan mềm.", "Dải phân cách gồm giá long môn và biến báo hiệu đường bộ."],
        answer: "a"
    },
    {
        question: "Người lái xe được hiểu như nào trong các khái niệm dưới đây?",
        options: ["Là người điều khiển xe cơ giới.", "Là người điều khiển xe thô sơ.", "Là người điều khiển xe có súc vật kéo."],
        answer: "a"
    },
    {
        question: "Khái niệm “phương tiện giao thông cơ giới đường bộ” được hiểu như thế nào là đúng?",
        options: ["Gồm xe ô tô; máy kéo; xe mô tô hai bánh; xe mô tô ba bánh; xe gắn máy; xe cơ giới dùng cho người khuyết tật và xe máy chuyên dùng.", "Gồm xe ô tô; máy kéo; rơ moóc hoặc sơ mi rơ moóc được kéo bởi xe ô tô, máy kéo; xe mô tô hai bánh; xe mô tô ba bánh, xe gắn máy (kể cả xe máy điện) và các lại xe tương tự."],
        answer: "a"
    },
    {
        question: "Đường mà trên đó phương tiện tham gia giao thông được các phương tiện giao thông đến từ hướng khác nhường đường khi qua nơi đường giao nhau, được cắm biển báo hiệu đường ưu tiên là loại đường gì?",
        options: ["Đường không ưu tiên.", "Đường tỉnh lộ.", "Đường quốc lộ.", "Đường ưu tiên."],
        answer: "d"
    },

    {
        question: "Khái niệm “phương tiện giao thông thô sơ đường bộ” được hiểu như thế nào là đúng?",
        options: ["Gồm xe đạp (kể cả xe đạp máy, xe đạp điện), xe xích lô, xe lăn dùng cho người khuyết tật, xe súc vật kéo và các loại xe tương tự.", "Gồm xe đạp (kể cả xe đạp máy, xe đạp điện), xe gắn máy, xe cơ giới dùng cho người khuyết tật, xe súc vật kéo và các loại xe tương tự.", "Gồm xe ô tô, máy kéo, rơ moóc hoặc sơ mi rơ moóc được kéo bởi xe ô tô, máy kéo."],
        answer: "a"
    },
    {
        question: "“Phương tiện tham gia giao thông đường bộ” gồm những loại nào?",
        options: ["Phương tiện giao thông cơ giới đường bộ.", "Phương tiện giao thông thô sơ đường bộ và xe máy chuyên dùng.", "Cả A và B."],
        answer: "c"
    },
    {
        question: "“Người tham gia giao thông đường bộ” gồm những đối tượng nào?",
        options: ["Người điều khiển, người sử dụng phương tiện tham gia giao thông đường bộ.", "Người điều khiển, dẫn dắt súc vật; người đi bộ trên đường bộ.", "Cả A và B."],
        answer: "c"
    },
    {
        question: "“Người điều khiển phương tiện tham gia giao thông đường bộ” gồm những đối tượng nào dưới đây?",
        options: ["Người điều khiển xe cơ giới, người điều khiển xe thô sơ.", "Người điều khiển xe máy chuyên dùng tham gia giao thông đường bộ.", "Cả A và B."],
        answer: "c"
    },
    {
        question: "Khái niệm “người điều khiển giao thông” được hiểu như thế nào là đúng?",
        options: ["Là người điều khiển phương tiện tham gia giao thông tại nơi thi công, nơi ùn tắc giao thông, ở bến phà, tại cầu đường bộ đi chung với đường sắt.", "Là cảnh sát giao thông, người được giao nhiệm vụ hướng dẫn giao thông tại nơi thi công, nơi ùn tắc giao thông, ở bến phà, tại cầu đường bộ đi chung với đường sắt.", "Là người tham gia giao thông tại nơi thi công, nơi ùn tắc giao thông, ở bến phà, tại cầu đường bộ đi chung với đường sắt."],
        answer: "b"
    },
    {
        question: "Trong các khái niệm dưới đây khái niệm “dừng xe” được hiểu như thế nào là đúng?",
        options: ["Là trạng thái đứng yên của phương tiện giao thông không giới hạn thời gian để cho người lên, xuống phương tiện, xếp dỡ hàng hóa hoặc thực hiện công việc khác.", "Là trạng thái đứng yên tạm thời của phương tiện giao thông trong một khoảng thời gian cần thiết đủ để cho người lên, xuống phương tiện, xếp dỡ hàng hóa hoặc thực hiện công việc khác.", "Là trạng thái đứng yên của phương tiện giao thông không giới hạn thời gian giữa 02 lần vận chuyển hàng hóa hoặc hành khách."],
        answer: "b"
    },
    {
        question: "Khái niệm “đỗ xe” được hiểu như thế nào là đúng?",
        options: ["Là trạng thái đứng yên của phương tiện giao thông có giới hạn trong một khoảng thời gian cần thiết đủ để cho người lên, xuống phương tiện đó, xếp dỡ hàng hóa hoặc thực hiện công việc khác.", "Là trạng thái đứng yên của phương tiện giao thông không giới hạn thời gian.", "Là trạng thái đứng yên của phương tiện giao thông không giới hạn thời gian để cho người lên, xuống phương tiện, xếp dỡ hàng hóa hoặc thực hiện công việc khác."],
        answer: "b"
    },
    {
        question: "Cuộc đua xe chỉ được thực hiện khi nào?",
        options: ["Diễn ra trên đường phố không có người qua lại.", "Được người dân ủng hộ.", "Được cơ quan có thẩm quyền cấp phép."],
        answer: "c"
    },
    {
        question: "Người điều khiển phương tiện giao thông đường bộ mà trong cơ thể có chất ma túy có bị nghiêm cấm hay không?",
        options: ["Bị nghiêm cấm.", "Không bị nghiêm cấm.", "Không bị nghiêm cấm, nếu có chất ma túy ở mức nhẹ, có thể điều khiển phương tiện tham gia giao thông."],
        answer: "a"
    },
    {
        question: "Sử dụng rượu, bia khi lái xe, nếu bị phát hiện thì bị xử lý như thế nào?",
        options: ["Chỉ bị nhắc nhở.", "Bị xử phạt hành chính hoặc có thể bị xử lý hình sự tùy theo mức độ vi phạm.", "Không bị xử lý hình sự."],
        answer: "b"
    },
    {
        question: "Theo luật phòng chống tác hại của rượu, bia, đối tượng nào dưới đây bị cấm sử dụng rượu, bia khi tham gia giao thông?",
        options: ["Người điều khiển: Xe ô tô, xe mô tô, xe đạp, xe gắn máy.", "Người ngồi phía sau người điều khiển xe cơ giới.", "Người đi bộ.", "Cả ý A và B."],
        answer: "d"
    },
    {
        question: "Hành vi điều khiển xe cơ giới chạy quá tốc độ quy định, giành đường, vượt ẩu có bị nghiêm cấm hay không?",
        options: ["Bị nghiêm cấm tùy từng trường hợp.", "Không bị nghiêm cấm.", "Bị nghiêm cấm."],
        answer: "c"
    },
    {
        question: "Khi lái xe trong khu đô thị và đông dân cư trừ các khu vực có biển cấm sử dụng còi, người lái xe được sử dụng còi như thế nào trong các trường hợp dưới đây?",
        options: ["Từ 22h đêm đến 5h sáng.", "Từ 5h sáng đến 22h đêm.", "Từ 23h đêm đến 5h sáng hôm sau."],
        answer: "b"
    },
    {
        question: "Người lái xe sử dụng đèn như thế nào khi lái xe trong khu đô thị và đông dân cư vào ban đêm?",
        options: ["Bất cứ đèn nào miễn là nhìn rõ phía trước.", "Chỉ bật đèn chiếu xa (đèn pha) khi không nhìn rõ đường.", "Đèn chiếu xa (đèn pha) khi đường vắng, đèn pha chiếu gần (đèn cốt) khi có xe đi ngược chiều.", "Đèn chiếu gần (đèn cốt)."],
        answer: "d"
    },
    {
        question: "Trong trường hợp đặc biệt, để được lắp đặt, sử dụng còi, đèn không đúng với thiết kế của nhà sản xuất đối với từng loại xe cơ giới bạn phải đảm bảo yêu cầu nào đươi đấy?",
        options: ["Phải đảm bảo phụ tùng do đúng nhà sản xuất đó cung cấp.", "Phải được chấp thuận của cơ quan có thẩm quyền.", "Phải là xe đăng ký và hoạt động tại các khu vực có địa hình phức tạp."],
        answer: "b"
    },
    {
        question: "Ở phần đường dành cho người đi bộ qua đường, trên cầu, đầu cầu, đường cao tốc, đường hẹp, đường dốc, tại nơi đường bộ giao nhau cùng mức với đường sắt được quay đầu xe hay không?",
        options: ["Được phép.", "Không được phép.", "Tùy từng trường hợp."],
        answer: "b"
    },
    {
        question: "Bạn đang lái xe, phía trước có một xe cảnh sát giao thông không phát tín hiệu ưu tiên bạn có được phép vượt hay không?",
        options: ["Không được vượt.", "Được vượt khi đang trên cầu.", "Được phép vượt khi đi qua nơi giao thông có ít phương tiện cùng tham gia giao thông.", "Được vượt khi đảm bảo an toàn."],
        answer: "d"
    },
    {
        question: "Bạn đang lái xe, phía trước có 1 xe cứu thương đang phát tín hiệu ưu tiên bạn có được phép vượt hay không?",
        options: ["Không được vượt.", "Được vượt khi đang trên cầu.", "Được phép vượt khi đi qua nơi giao thông có ít phương tiện cùng tham gia giao thông.", "Được vượt khi đảm bảo an toàn."],
        answer: "a"
    },

    //câu 51-75==========================================================================================
    //de2

    {
    question: "Khi muốn chuyển hướng, người lái xe phải thực hiện như thế nào để đảm bảo an toàn giao thông?",
    options: ["Quan sát gương, ra tín hiệu, quan sát an toàn và chuyển hướng.", "Quan sát gường, giảm tốc độ, ra tín hiệu chuyển hướng, quan sát an toàn và chuyển hướng.", "Quan sát gương, tăng tốc độ, ra tín hiệu và chuyển hướng."],
    answer: "b"
},
{
    question: "Khi tránh xe đi ngược chiều, các xe phải nhường đường như thế nào là đúng quy tắc giao thông?",
    options: ["Nơi đường hẹp chỉ đủ cho một xe chạy và có chỗ tránh xe thì xe nào ở gần chỗ tránh hơn phải vào vị trí tránh, nhường đường cho xe kia đi.", "Xe xuống dốc phải nhường đường cho xe đang lên dốc; xe nào có chường ngại vật phía trước phải nhường đường cho xe không có chướng ngại vật đi trước.", "Xe lên dốc phải nhường đường cho xe xuống dốc; xe nào không có chướng ngại vật phái trước phải nhường đường cho xe có chướng ngại vật đi trước."],
    answer: "d"
},
{
    question: "Bạn đang lái xe trên đường hẹp, xuống dốc và gặp một xe đang đi lên dốc, bạn cần làm gì?",
    options: ["Tiếp tục đi về xe lên dốc phải nhường đường cho mình.", "Nhường đường cho xe lên dốc.", "Chỉ nhường đường khi xe lên dốc nháy đèn."],
    answer: "b"
},
{
    question: "Tại nơi đường giao nhau, người lái xe đang đi trên đường không ưu tiên phải nhường đường như thế nào là đúng quy tắc giao thông?",
    options: ["Nhường đường cho xe đi ở bên phải mình tới.", "Nhường đường cho xe đi ở bên trái mình tới.", "Nhường đường cho xe đi trên đường ưu tiên hoặc đường chính từ bất kỳ hướng nào tới."],
    answer: "c"
},
{
    question: "Tại nơi đường giao nhau không có báo hiệu đi theo vòng xuyến, người điểm khiển phương tiện phải nhường đường như thế nào là đúng quy tắc giao thông?",
    options: ["Phải nhường đường cho xe đi đến từ bên phải.", "Xe báo hiệu xin đường trước xe đó được đi trước.", "Phải nhường đường cho xe đi từ bên trái."],
    answer: "a"
},
{
    question: "Tại nơi đường bộ giao nhau cùng mức với đường sắt chỉ có đèn tín hiệu hoặc chuông báo hiệu, khi đèn tín hiệu màu đỏ đã bật hoặc có tiếng chuông báo hiệu, người tham gia giao thông phải dừng lại ngay và giữ khoảng cách tối thiểu bao nhiêu mét tính từ ray gần nhất?",
    options: ["5 mét.", "3 mét.", "4 mét."],
    answer: "c"
},
{
    question: "Người điều khiển phương tiện tham gia giao thông trong hầm đường bộ ngoài việc phải tuân thủ các quy tắc giao thông còn phải thực hiện những quy định nào dưới đây?",
    options: ["Xe cơ giới, xe máy chuyên dùng phải bật đèn; xe thô sơ phải bật đèn hoặc có vật phát sáng báo hiệu chỉ được dừng xe, đỗ xe ở nơi quy định.", "Xe cơ giới phải bật đèn ngay cả khi đường hầm sáng; phải cho xe chạy trên một làn đường và chỉ chuyển làn ở nơi được phép; được quay đầu xe, lùi xe khi cần thiết.", "Xe máy chuyện dụng phải bật đèn ngay cả khi đường hầm sáng; phải cho xe chạy trên một làn đường và chỉ chuyển làn ở nơi được phép; được quay đầu xe, lùi xe khi cần thiết."],
    answer: "b"
},
{
    question: "Những người ngồi trên xe mô tô 2 bánh, xe gắn máy phải đội mũ bảo hiểm cóc ài quau đúng quy cách khi nào?",
    options: ["Khi tham gia giao thông đường bộ.", "Chỉ khi đi trên đường chuyên dùng; đường cao tốc.", "Khi tham gia thông trên đường tỉnh lộ hoặc quốc lộ."],
    answer: "a"
},
{
    question: "Người điều khiển xe mô tô hai bánh, xe gắn máy được phép chở tối đa 2 người trong những trường hợp nào?",
    options: ["Chở người bệnh đi cấp cứu; trẻ em dưới 14 tuổi.", "Áp giải người có hành vi vi phạm pháp luật.", "Cả A và B."],
    answer: "c"
},
{
    question: "Người điều khiển xe mô tô hai bánh, xe gắn máy không được thực hiện những hành vi nào dưới đây?",
    options: ["Đi vào phần đường dành cho người đi bộ và phương tiện khác; sử dụng ô, điện thoại di động, thiết bị âm thanh (trừ thiết bị trợ thính), di xe dàn hàng ngang.", "Chở 2 người; trong đó, có người bệnh đi cấp cứu hoặc trẻ em dưới 14 tuổi hoặc áp giải người có hành vi vi phạm pháp luật.", "Điều khiển phương tiện tham gia giao thông trên đường tỉnh lộ hoặc quốc lộ."],
    answer: "a"
},
{
    question: "Người điều khiển xe mô tô hai bánh, xe gắn máy có được đi xe dàn hàng ngang; đi xe vào phần đường dành cho người đi bộ và phương tiện khác; sử dụng ô, điện thoại di động, thiết bị âm thanh (trừ thiết bị trợ thính) hay không?",
    options: ["Được phép nhưng phải đảm bảo an toàn.", "Không được phép.", "Được phép tùy từng hoàn cảnh, điều kiện cụ thể."],
    answer: "b"
},
{
    question: "Người lái xe phải giảm tốc độ thấp hơn tốc độ tối đa cho phép (có thể dừng lại một cách an toàn) trong trường hợp nào dưới đây?",
    options: ["Khi có báo hiệu cảnh báo nguy hiểm hoặc có chướng ngại vật trên đường; khi chuyển hướng xe chạy hoặc tầm nhìn bị hạn chế; khi qua nơi đường giao nhau, nơi đường bộ giao nhau với đường sắt, đường vòng; đường có địa hình quanh co, đèo dốc.", "Khi qua cầu, cống hẹp; khi lên gần đỉnh dốc, khi xuống dốc, khi qua trường học, khu đông dân cư, khu vực đang thi công trên đường bộ; hiện trường xảy ra tai nạn giao thông.", "Khi điều khiển xe vượt xe khác trên đường quốc lộ, đường cao tốc."],
    answer: "d"
},
{
    question: "Tại ngã ba hoặc ngã tư không có đào an toàn, người lái xe phải nhường đường như thế nào là đúng trong các trường hợp dưới đây?",
    options: ["Nhường đường cho người đi bộ đang đi trên phần đường dành cho người đi bộ sang đường; nhường đường cho xe đi trên đường ưu tiên, đường chính từ bất kỳ hướng nào tới; nhường đường cho xe ưu tiên, xe đi từ bên phải đến.", "Nhường đường cho người đi bộ đang đứng chờ đi qua phần đường dành cho người đi bộ sang đường; nhường đường cho xe đi trên đường ngược chiều, đường nhánh từ bất kỳ hướng nào tới; nhường đường cho xe đi từ bên trái đến.", "Không phải nhường đường."],
    answer: "a"
},
{
    question: "Khi điều khiển xe cơ giới, người lái xe phải bật đèn tín hiệu báo rẽ trong trường hợp nào sau đây?",
    options: ["Khi cho xe chạy thẳng.", "Trước khi thay đổi làn đường.", "Sau khi thay đổi làn đường."],
    answer: "b"
},
{
    question: "Trên đoạn đường hai chiều không có giải phân cách giữa, người lái xe không được vượt xe khác trong các trường hợp nào dưới đây?",
    options: ["Xe bị vượt bất ngờ tăng tốc độ và cố tình không nhường đường.", "Xe bị vượt giảm tốc độ và nhường đường.", "Phát hiện có xe đi ngược chiều.", "Cả A và B."],
    answer: "d"
},
{
    question: "Người lái xe mô tô xử lý như thế nào khi cho xe mô tô phía sau vượt?",
    options: ["Nếu đủ điều kiện an toàn, người lái xe phải giảm tốc độ, đi sát về bên phải của phần đường xe chạy cho đến khi xe sau đã vượt qua, không được gây trở ngại đối với xe xin vượt.", "Lái xe vào lề đường bên trái và giảm tốc độ để xe phía sau vượt qua, không được gây trở ngại đối với xe xin vượt.", "Nếu đủ điều kiện an toàn, người lái xe phải tăng tốc độ, đi sát về bên phải của phần đường xe chạy cho đến khi xe sau đã vượt qua."],
    answer: "a"
},
{
    question: "Trong các trường hợp dưới đây, để đảm bảo an toàn khi tham gia giao thông, người lái xe mô tô cần thực hiện như thế nào?",
    options: ["Phải đội mũ bảo hiểm đạt chuẩn, có cài quai đúng quy cách, mặc quần áo gọn gàng; không sử dụng ô, điện thoại di động, thiết bị âm thanh (trừ thiết bị trợ thính).", "Phải đội mũ bảo hiểm khi trời mưa gió hoặc trời quá nắng; có thể sử dụng ô, điện thoại di động, thiết bị âm thanh nhưng phải đảm bảo an toàn.", "Phải đội mũ bảo hiểm khi cảm thấy mất an toàn giao thông hoặc khi chuẩn bị di chuyển quãng đường xa."],
    answer: "a"
},
{
    question: "Đường bộ trong khu vực đông dân cư gồm những đoạn đường nào dưới đây?",
    options: ["Là đoạn đường nằm trong khu công nghiệp có đông người và phương tiện tham gia giao thông và được xác định cụ thể bằng biển chỉ dẫn địa giới.", "Là đoạn đường bộ nằm trong khu vực nội thành phố, nội thị xã, nội thị trấn và những đoạn đường có đông dân cư sinh sống sát dọc theo đường, có các hoạt động ảnh hưởng đến an toàn giao thông; được xác định bằng biển bảo hiệu là đường khu đông dân cư.", "Là đoạn đường nằm ngoài khu vực nội thành phố, nội thị xã có đông người và phương tiện tham gia giao thông và được xác định cụ thể bằng biển chỉ dẫn địa giới."],
    answer: "b"
},
{
    question: "Tốc độ tối đa cho phép đối với xe máy chuyên dùng, xe gắn máy (kể cả xe máy điện) và các loại xe tương tự trên đường bộ (trừ đường cao tốc) không được vượt quá bao nhiêu km/h?",
    options: ["50 km/h.", "40 km/h.", "60 km/h."],
    answer: "b"
},
{
    question: "Trên đường bộ (trừ đường cao tốc) trong khu vực đông dân cư, đường đôi có dải phân cách giữa, xe mô tô hai bánh, ô tô chờ người đến 30 chỗ tham gia giao thông với tốc độ tối đa cho phép là bao nhiêu?",
    options: ["60 km/h.", "50 km/h.", "40 km/h."],
    answer: "b"
},
{
    question: "Trên đường bộ (trừ đường cao tốc) trong khu vực đông dân cư, đường hai chiều không có dải phân cách giữa, xe mô tô hai bánh, ô tô chở người đến 30 chỗ tham gia giao thông với tốc độ tối đa cho phép là bao nhiêu?",
    options: ["60 km/h.", "50 km/h.", "40 km/h."],
    answer: "b"
},
{
    question: "Trên đường bộ (trừ đường cao tốc) trong khu vực đông dân cư, đường hai chiều hoặc đường một chiều có một làn xe cơ giới, loại xe nào dưới đây được tham gia giao thông với tốc độ tối đa cho phép là 50 km/h?",
    options: ["Ô tô con, ô tô tải, ô tô chở người trên 30 chỗ.", "Xe gắn máy, xe máy chuyên dùng.", "Cả ý 1 và ý 2."],
    answer: "c"
},
{
    question: "Khi điều khiển xe chạy với tốc độ dưới 60 km/h, để đảm bảo khoảng cách an toàn giữa hai xe, người lái xe phải điều khiển xe như thế nào?",
    options: ["Chủ động giữ khoảng cách an toàn phù hợp với xe chạy liền trước xe của mình.", "Đảm bảo khoảng cách an toàn theo mật độ phương tiện, tình hình giao thông thực tế.", "Cả A và B."],
    answer: "c"
},
{
    question: "Người lái xe phải giảm tốc độ thấp hơn tốc độ tối đa cho phép đến mức cần thiết, chú ý quan sát và chuẩn bị sẵn sàng những tình huống có thể xảy ra đề phòng ngừa tai nạn trong các trường hợp nào dưới đây?",
    options: ["Gặp biển báo nguy hiểm trên đường.", "Gặp biển chỉ dẫn trên đường.", "Gặp biển báo hết mọi lệnh cấm.", "Gặp biển báo hết hạn chế tốc độ tối đa cho phép."],
    answer: "a"
},
{
    question: "Các phương tiện tham gia giao thông đường bộ (kể cả những xe có quyền ưu tiên) đều phải dừng lại bên phải đường của mình và trước vạch 'dừng xe' tại các điểm giao cắt giữa đường bộ và đường sắt khi có báo hiệu dừng nào dưới đây?",
    options: ["Hiệu lệnh của nhân viên gác chắn.", "Đèn đỏ sáng nháy, cờ đỏ, biển đỏ.", "Còi, chuông kêu, chắn đã đóng.", "Tất cả các đáp án trên."],
    answer: "d"
},


    //câu 76-100==============================================================================================
    //de3
    {
        question: "Tác dụng của mũ bảo hiểm đối với người ngồi trên xe mô tô hai bánh trong trường hợp xảy ra tai nạn giao thông là gì?",
        options: ["Để làm đẹp.", "Để tránh mưa nắng.", "Để giảm thiểu chấn thương vùng đầu.", "Để các loại phương tiện khác dễ quan sát."],
        answer: "c"
    },
    {
        question: "Khi xe ô tô, mô tô đến gần vị trí giao nhau giữa đường bộ và đường sắt không có rào chắn, khi đèn tín hiệu màu đỏ đã bật sáng hoặc khi có tiếng chuông báo hiệu, người lái xe xử lý như thế nào?",
        options: ["Giảm tốc độ cho xe vượt qua đường sắt.", "Nhanh chóng cho xe vượt qua đường sắt trước khi tàu hỏa tới.", "Giảm tốc độ cho xe vượt qua đường sắt trước khi tàu hỏa tới."],
        answer: "c"
    },
    {
        question: "Người lái xe phải xử lý như thế nào khi quan sát phía trước thấy người đi bộ đang sang đường tại nơi có vạch đường dành cho người đi bộ để đảm bảo an toàn?",
        options: ["Giảm tốc độ, đi từ từ để vượt qua trước người đi bộ.", "Giảm tốc độ, có thể dừng lại nếu cần thiết trước vạch dừng xe để nhường đường cho người đi bộ qua đường.", "Tăng tốc độ để vượt qua trước người đi bộ."],
        answer: "b"
    },
    {
        question: "Theo Luật Giao thông đường bộ, tín hiệu đèn giao thông gồm 3 màu nào dưới đây?",
        options: ["Đỏ - Vàng - Xanh.", "Cam - Vàng - Xanh.", "Vàng - Xanh dương - Xanh lá.", "Đỏ - Cam - Xanh."],
        answer: "d"
    },
    {
        question: "Tại nơi đường giao nhau, khi đèn điều khiển giao thông có tín hiệu màu vàng, người điều khiển giao thông phải chấp hành như thế nào là đúng quy tắc giao thông?",
        options: ["Phải cho xe dừng lại trước vạch dừng, trường hợp đã đi quá vạch dừng hoặc đã quá gần vạch dừng nếu dừng lại thấy nguy hiểm thì được đi tiếp.", "Trong trường hợp tín hiệu vàng nhấp nháy là được đi nhưng phải giảm tốc độ, chú ý quan sát nhường đường cho người đi bộ qua đường.", "Cả A và B."],
        answer: "d"
    },
    {
        question: "Để báo hiệu cho xe phía trước biết xe mô tô của bạn muốn vượt, bạn phải có tín hiệu như thế nào dưới đây?",
        options: ["Ra tín hiệu bằng tay rồi cho xe vượt qua.", "Tăng ga mạnh để gây sự chú ý rồi cho xe vượt qua.", "Bạn phải có tín hiệu bằng đèn hoặc còi."],
        answer: "c"
    },
    {
        question: "Người điều khiển xe mô tô phải giảm tốc độ và hết sức thận trọng khi qua những đoạn đường nào dưới đây?",
        options: ["Đường ướt, đường có sỏi cát trên nền đường.", "Đường hẹp có nhiều điểm giao cắt từ hai phía.", "Đường đèo dốc, vòng liên tục.", "Tất cả các ý nêu trên."],
        answer: "d"
    },
    {
        question: "Khi gập xe buýt đang dừng đón, trả khách, người điều khiển xe mô tô phải xử lý như thế nào để đảm bảo an toàn giao thông?",
        options: ["Tăng tốc độ để nhanh chóng vượt qua bến đỗ.", "Giảm tốc độ đến mức an toàn có thể và quan sát người qua đường và từ từ vượt qua xe buýt.", "Yêu cầu phải dừng lại phía sau xe buýt chở xe rời bến mới đi tiếp."],
        answer: "b"
    },
    {
        question: "Khái niệm về văn hóa giao thông được hiểu như thế nào là đúng?",
        options: ["Là sự hiểu biết và chấp hành nghiêm chỉnh pháp luật về giao thông: là ý thức trách nhiệm với cộng đồng khi tham gia giao thông.", "Là ứng xử có văn hóa, có tình yêu thương con người trong các tình huống không may xảy ra khi tham gia giao thông.", "Cả A và B."],
        answer: "c"
    },
    {
        question: "Trong các hành vì dưới đây, người lái xe mô tô có văn hóa giao thông phải ứng xử như thế nào?",
        options: ["Điều khiển xe đi bên phải theo chiều đi của mình, đi đúng phần đường, làn đường quy định; đội mũ bảo hiểm đạt chuẩn, cài quai đúng quy cách.", "Điều khiển xe đi trên phần đường, làn đường có ít phương tiện tham gia giao thông.", "Điều khiển xe và đội mũ bảo hiểm ở nơi có biển báo bắt buộc đội mũ bảo hiểm."],
        answer: "a"
    },
    {
        question: "Trong các hành vi dưới đây, người lái xe ô tô, mô tô có văn hóa giao thông phải ứng xử như thế nào?",
        options: ["Điều khiển xe đi bên phải theo chiều đi của mình; đi đúng phần đường, làn đường quy định; dừng, đỗ xe đúng nơi quy định; đã uống rượu, bia thì không lái xe.","Điều khiển xe đi trên phần đường, làn đường có ít phương tiện giao thông; dừng xe, đỗ xe ở nơi thuận tiện hoặc theo yêu cầu của hành khách, của người thân.","Dừng và đỗ xe ở nơi thuận tiện cho việc chuyên chở hành khách và giao nhận hàng hóa; sử dụng ít rượu, bia thì có thể lái xe."],
        answer: "a"
    },
    {
        question: "Khi xảy ra tai nạn giao thông, có người bị thương nghiêm trọng, người lái xe và người có mặt tại hiện trường vụ tai nạn phải thực hiện các công việc gì dưới đây?",
        options: ["Thực hiện sơ cứu ban đầu trong trường hợp khẩn cấp: thông báo vụ tai nạn đến cơ quan thi hành pháp luật.", "Nhanh chóng lái xe gây tai nạn hoặc đi nhờ xe khác ra khỏi hiện trường vụ tai nạn.", "Cả A và B."],
        answer: "a"
    },
    {
        question: "Trên đường đang xảy ra ùn tắc những hành vi nào sau đây là thiếu văn hóa khi tham gia giao thông?",
        options: ["Bắm còi liên tục thúc giục các phương tiện phía trước nhường đường.", "Đi lên vỉa hè, tận dụng mọi khoảng trống để nhanh chóng thoát khỏi nơi ùn tắc.", "Lần sang trái đường cố gắng vượt lên xe khác.", "Tất cả các ý nêu trên."],
        answer: "d"
    },
    {
        question: "Khi điều khiển xe mô tô tay ga xuống đường dốc dài, độ dốc cao, người lái xe cần thực hiện các thao tác nào dưới đây để đảm bảo an toàn?",
        options: ["Giữ tay ga ở mức độ phù hợp, sử dụng phanh trước và phanh sau để giảm tốc độ.", "Nhả hết tay ga, tắt động cơ, sử dụng phanh trước và phanh sau để giảm tốc độ.", "Sử dụng phanh trước để giảm tốc độ kết hợp với tất cả cần khóa điên của xe."],
        answer: "a"
    },
    {
        question: "Khi quay đầu xe, người lái xe cần phải quan sát và thực hiện các thao tác nào để đảm bảo an toàn giao thông?",
        options: ["Quan sát biển báo hiệu để biết nơi được phép quay đầu, quan sát kỹ địa hình nơi chọn để quay đầu; lựa chọn quỹ đạo quay đầu xe cho thích hợp, quay đầu xe với tốc độ thấp, thường xuyên bảo tín hiệu để người, các phương tiện xung quanh được biết, nếu quay đầu xe ở nơi nguy hiểm thì đưa đầu xe về phía nguy hiểm đưa đuôi xe về phía an toàn.", "Quan sát biển báo hiệu để biết nơi được phép quay đầu; quan sát kỹ địa hình nơi chọn để quay đầu, lựa chọn quỹ đạo quay đầu xe, quay đầu xe với tốc độ tối đa, thường xuyên báo tín hiệu để người, các phương tiện xung quanh được biết, nếu quay đầu xe ở nơi nguy hiểm thì đưa đuôi xe về phía nguy hiếm và đầu xe về phía an toàn."],
        answer: "a"
    },
    {
        question: "Khi tránh nhau trên đường hẹp, người lái xe cần phải chú ý những điểm nào để đảm bảo an toàn giao thông?",
        options: ["Không nên đi có vào đường hẹp, xe đi ở phía sườn núi nên dừng lại trước để nhường đường,chờ đối diện đi qua; khi gặp nhau nên đi chậm, gần mép đường; không nên sử dụng còi, đèn để đánh dấu; chỉ nên đi sau khi đã quan sát thấu đáo, đảm bảo an toàn.", "Nếu gặp nhau trên đoạn đường hẹp, cả hai đều phải quan sát và nhường đường cho nhau; nếu xe nào gặp trở ngại, khó khăn thì cần chờ đối phương đi qua rồi mới tiếp tục đi."],
        answer: "d"
    },
    
    {
        question: "Khi điều khiển xe trên đường vòng người lái xe cần phải làm gì để đảm bảo an toàn?",
        options: ["Quan sát cẩn thận các chướng ngại vật và báo hiệu bằng còi, đèn; giảm tốc độ tới mức cần thiết, về số thấp và thực hiện quay vòng với tốc độ phù hợp với bán kính cong của đường vòng.", "Quan sát cẩn thận các chướng ngại vật và báo hiệu bằng còi, đèn, tăng tốc để nhanh chóng qua đường vòng và giảm tốc độ sau khi qua đường vòng."],
        answer: "a"
    },
    {
        question: "Để đạt được hiệu quả phanh cao nhất, người lái xe mô tô phải sử dụng các kỹ năng như thế nào dưới đây?",
        options: ["Sử dụng phanh trước.", "Sử dụng phanh sau.", "Giảm hết ga sử dụng đồng thời cả phanh sau và phanh trước."],
        answer: "c"
    },
    {
        question: "Khi đang lái xe mô tô và ô tô, nếu có nhu cầu sử dụng điện thoại để nhắn tin hoặc gọi điện, người lái xe phải thực hiện như thế nào trong các tình huống nêu dưới đây? (Câu hỏi điểm liệt)",
        options: ["Giảm tốc độ để đảm bảo an toàn với xe phía trước và sử dụng điện thoại để liên lạc.", "Giảm tốc độ để dừng xe ở nơi cho phép dùng xe sau đó sử dụng điện thoại để liên lạc.", "Tăng tốc độ để cách xa xe phía sau và sử dụng điện thoại đề liên lạc."],
        answer: "b"
    },
    {
        question: "Những thói quen nào dưới đây khi điều khiển xe mô tô tay ga tham gia giao thông dễ gây tai nạn nguy hiểm?",
        options: ["Sử dụng còi.", "Phanh đồng thời cả phanh trước và phanh sau.", "Chỉ sử dụng phanh trước."],
        answer: "c"
    },
    {
        question: "Khi điều khiển xe mô tô quay đầu người lái xe cần thực hiện như thế nào để đảm bảo an toàn?",
        options: ["Bật tín hiệu báo rẽ trước khi quay đầu, từ từ giảm tốc độ đến mức có thể dừng lại.", "Chỉ quay đầu xe tại những nơi được phép quay đầu.", "Quan sát an toàn các phương tiện tới từ phía trước, phía sau, hai bên đồng thời nhường đường cho xe từ bên phải và phía trước đi tới.", "Tất cả đáp án nêu trên."],
        answer:"d"
    },
    {
        question: "Tay ga trên xe mô tô hai bánh có tác dụng gì trong các trường hợp dưới đây?",
        options: ["Để điều khiển xe chạy về phía trước.", "Để điều tiết công suất động cơ qua đó điều khiển tốc độ của xe.", "Để điều khiển xe chạy lùi.", "Cả A và B."],
        answer: "d"
    },
    {
        question: "Gương chiếu hậu của xe mô tô hai bánh có tác dụng gì trong các trường hợp dưới đây?",
        options: ["Để quan sát an toàn phía bên trái khi chuẩn bị rẽ trái.", "Để quan sát an toàn phía bên phải khi chuẩn bị rẽ phải.", "Để quan sát an toàn phía sau cả bên trái và bên phải trước khi chuyển hướng.", "Để quan sát an toàn phía trước cả bên trái và bên phải trước khi chuyển hướng."],
        answer: "c"
    },
    {
        question: "Để đảm bảo an toàn khi tham gia giao thông, người lái xe mô tô hai bánh cần điều khiển tay ga như thế nào trong các trường hợp dưới đây?",
        options: ["Tăng ga thật nhanh, giảm ga từ từ.", "Tăng ga thật nhanh, giảm ga thật nhanh.", "Tăng ga từ từ, giảm ga thật nhanh.", "Tăng ga từ từ, giảm ga từ từ."],
        answer: "c"
    },
    {
        question: "Kỹ thuật cơ bản để giữ thăng bằng khi điều khiển xe mô tô đi trên đường gồ ghề như thế nào trong các trường hợp dưới đây?",
        options: ["Đứng thẳng trên giá gác chân lái sau đó hơi gập đầu gối và khuỷu tay, đi chậm để không nảy quá mạnh.", "Ngồi lùi lại phía sau, tăng ga vượt nhanh qua đoạn đường xóc.", "Ngồi lệch sang bên trái hoặc bên phải để lấy thăng bằng qua đoạn đường gồ ghề."],
        answer: "a"
    },
    

    //câu 25-50================================================================================================
    {
        // 26
        question: "Người điều khiển xe mô tô hai bánh, ba bánh, xe gắn máy có được phép sử dụng xe để kéo hoặc đẩy các phương tiện khác khi tham gia giao thông không? (Câu hỏi điểm liệt)",
        options: ["Được phép.", "Nếu phương tiện được kéo, đẩy có khối lượng nhỏ hơn phương tiện của mình.", "Tùy trường hợp.", "Không được phép."],
        answer: "d"
    },
    {
        // 27
        question: "Khi điều khiển xe mô tô hai bánh, xe mô tô ba bánh, xe gắn máy, những hành vi buông cả 2 tay; sử dụng xe để kéo, đẩy xe khác, vật khác; sử dụng chân chống của xe quẹt xuống đường khi xe đang chạy có được phép hay không? (Câu hỏi điểm liệt)",
        options: ["Được phép.", "Tùy trường hợp.", "Không được phép."],
        answer: "c"
    },
    {
        // 28
        question: "Khi điều khiển xe mô tô hai bánh, xe mô tô ba bánh, xe gắn máy, những hành vi nào không được phép? (Câu hỏi điểm liệt)",
        options: ["Buông cả hai tay; sử dụng xe để kéo, đẩy xe khác, vật khác; sử dụng chân chống của xe quẹt xuống đường khi xe đang chạy.", "Buông mội tay; sử dụng xe để chở người hoặc hàng hóa; để chân chạm xuống đất khi khởi hành.", "Đội mũ bảo hiểm; chạy xe đúng tốc độ quy định và chấp hành đúng quy tắc giao thông đường bộ.", "Chở người ngồi sau dưới 16 tuổi."],
        answer: "a"
    },
    {
        // 29
        question: "Người ngồi trên xe mô tô hai bánh, ba bánh, xe gắn máy khi tham gia giao thông có được mang, vác cồng kềnh hay không? (Câu hỏi điểm liệt)",
        options: ["Được mang, vác tùy trường hợp cụ thể.", "Không được mang, vác.", "Được mang, vác nhưng phải đảm bảo an toàn.", "Được mang, vác tùy theo sức khỏe của bản thân."],
        answer: "b"
    },
    {
        // 30
        question: "Người ngồi trên xe mô tô hai bánh, ba bánh, xe gắn máy khi tham gia giao thông có được bám, kéo hoặc đẩy các phương tiện khác hay không? (Câu hỏi điểm liệt)",
        options: ["Được phép.", "Được bám trong trường hợp phương tiện của mình bị hỏng.", "Được kéo, đẩy trong trường hợp phượng tiện khác bị hỏng.", "Không được phép."],
        answer: "d"
    },
    {
        // 31
        question: "Người ngồi trên xe mô tô hai bánh, ba bánh, xe gắn máy khi tham gia giao thông có được sử dụng ô khi trời mưa hay không? (Câu hỏi điểm liệt)",
        options: ["Được sử dụng.", "Chỉ người ngồi sau được sử dụng.", "Không được sử dụng.", "Được sử dụng nếu không có áo mưa."],
        answer: "c"
    },
    {
        // 32
        question: "Khi đang lên dốc người ngồi trên xe mô tô có được kéo theo người đang điều khiển xe đạp hay không? (Câu hỏi điểm liệt)",
        options: ["Chỉ được phép nếu cả hai đội mũ bảo hiểm.", "Không được phép.", "Chỉ được thực hiện trên đường thật vắng.", "Chỉ được phép khi người đi xe đạp đã quá mệt."],
        answer: "b"
    },
    {
        // 33
        question: "Hành vi sử dụng xe mô tô để kéo, đẩy xe mô tô khác bị hết xăng đến trạm mua xăng có được phép hay không? (Câu hỏi điểm liệt)",
        options: ["Chỉ được kéo nếu đã nhìn thấy trạm xăng.", "Chỉ được thực hiện trên đường vắng phương tiện cùng tham gia giao thông.", "Không được phép."],
        answer: "c"
    },
    {
        // 34
        question: "Hành vi vận chuyển đồ vật cồng kềnh bằng xe mô tô, xe gắn máy khi tham gia giao thông có được phép hay không? (Câu hỏi điểm liệt)",
        options: ["Không được vận chuyển.", "Chỉ được vận chuyển khi đã chằng buộc cẩn thận.", "Chỉ được vận chuyển vật cồng kềnh trên xe máy nếu khoảng cách về nhà ngắn hơn 2km."],
        answer: "a"
    },
    {
        // 35
        question: "Người đủ bao nhiêu tuổi trở trên thì được điều khiển xe theo mô tô hai bánh, xe mô tô ba bánh có dung tích xi lanh từ 50cm3 trở lên và các laoij xe có kết cấu tương tự: xe ô tô tải, máy kéo có trọng tải dưới 3.500kg; xe ô tô chở người đến 9 chỗ ngồi?",
        options: ["16 tuổi.", "18 tuổi.", "17 tuổi."],
        answer: "b"
    },
    {
        // 36
        question: "Người đủ 16 tuổi được điều khiển các loại xe nào dưới đây?",
        options: ["Xe mô tô 2 bánh có dung tích xi lanh từ 50cm3 trở lên.", "Xe gắn máy có dung tích xi-lanh dưới 50cm3.", "Xe ô tô tải dưới 3.500kg; xe chở người đến 9 chỗ ngồi.", "Tất cả các ý trên."],
        answer: "b"
    },
    {
        // 37
        question: "Người có giấy phép lái xe mô tô hạng A1 không được phép điều khiểu loại xe nào dưới đây?",
        options: ["Xe mô tô có dung tích xi-lanh 125cm3.", "Xe mô tô có dung tích xi-lanh từ 175cm3 trở lên.", "Xe mô tô có dung tích xi-lanh 100cm3."],
        answer: "b"
    },
    {
        // 38
        question: "Người có giấy phép lái xe mô tô hạng A1 được phép điều khiển loại xe nào dưới đây?",
        options: ["Xe mô tô hai bánh có dung tích xi-lanh từ 50cm3 đến dưới 175cm3.", "Xe mô tô ba bánh dùng cho người khuyết tật.", "Cả A và B."],
        answer: "c"
    },
    {
        // 39
        question: "Biển báo có dạng hình tròn, viền đỏ, nền trắng, trên nền có hình vẽ hoặc chữ số, chữ viết màu đen là loại biển gì dưới đây?",
        options: ["Biển báo nguy hiểm.", "Biển báo cấm.", "Biển báo hiệu lệnh.", "Biển báo chỉ dẫn."],
        answer: "b"
    },
    {
        // 40
        question: "Biển báo hiệu có dạng hình tam giác đều, viền đỏ, nền màu vàng, trên có hình vẽ màu đen là loại biển gì dưới đây?",
        options: ["Biển báo nguy hiểm.", "Biển báo cấm.", "Biển báo hiệu lệnh.", "Biển báo chỉ dẫn."],
        answer: "a"
    },
    {
        // 41
        question: "Biển báo hiệu hình tròn có nền xanh lam có hình vẽ màu trắng là loại biển báo gì dưới đây?",
        options: ["Biển báo nguy hiểm.", "Biển báo cấm.", "Biển báo hiệu lệnh.", "Biển báo chỉ dẫn."],
        answer: "c"
    },
    {
        // 42
        question: "Biển báo hiệu hình chữ nhật hoặc hình vuông, hình vẽ mũi tên, nền xanh lam là loại biển báo gì dưới đây?",
        options: ["Biển báo nguy hiểm.", "Biển báo cấm.", "Biển báo hiệu lệnh phải thi hành.", "Biển báo chỉ dẫn."],
        answer: "d"
    },
    {
        // 43
        question: "Khi sử dụng giấy phép lái xe đã khai báo mất để điều khiển phương tiện cơ giới đường bộ, ngoài việc bị thu hồi giấy phép lái xe, chịu trách nhiệm trước pháp luật, người lái xe không được cấp giấy phép lái xe trong thời gian bao nhiêu năm?",
        options: ["02 năm.", "03 năm.", "05 năm.", "04 năm."],
        answer: "c"
    },
    {
        // 44
        question: "Khi gặp hiệu lệnh như dưới đây của cảnh sát giao thông thì người tham gia giao thông phải đi như thế nào là đúng quy tắc giao thông?",
        options: ["Người tham gia giao thông ở các hướng phải dừng lại.", "Người tham gia giao thông ở các hướng được đi theo chiều gậy chỉ của cảnh sát giao thông.", "Người tham gia giao thông ở phía trước và phía sau người điều khiển được đi tất cả các hướng; người tham gia giao thông ở phái bên phải và phía trái người điều khiển phải dừng lại.", "Người tham gia giao thông ở phía trước và phái sau người điều khiển phải dừng lại; người tham gia giao thông ở phía bên phải và bên trái người điều khiển được đi tất cả các hướng."],
        answer: "d"
    },
    {
        // 45
        question: "Khi gặp hiệu lệnh như dưới đây của cảnh sát giao thông thì người tham gia giao thông phải đi như thế nào là đúng quy tắc giao thông?",
        options: ["Người tham gia giao thông ở hướng đối diện cảnh sát giao thông được đi, các hướng khác cần phải dừng lại.", "Người tham gia giao thông được rẽ phải theo chiều mũi tên màu xanh ở bục cảnh sát giao thông.", "Người tham gia giao thông ở các hướng đều phải dừng lại trừ các xe đã ở trong khu vực giao nhau.", "Người ở hướng đối diện cảnh sát giao thông phải dừng lại, các hướng khác được đi trong đó có bạn."],
        answer: "c"
    },
    {
        // 46
        question: "Tại nơi có biển báo hiệu cố định lại có báo hiệu tạm thời thì người tham giao thông phải chấp hành hiệu lệnh của biển báo nào?",
        options: ["Biển báo hiệu cố định.", "Biển báo hiệu tạm thời.", "Không tuân theo biển báo hiệu nào hết."],
        answer: "b"
    },
    {
        // 47
        question: "Trên đường có nhiều làn đường cho xe đi cùng chiều được phân biệt bằng vạch kẻ phân làn đường, người điều khiển phương tiện phải cho xe đi như thế nào?",
        options: ["Cho xe đi trên bất kỳ làn đường nào hoặc giữa 2 làn đường nếu không có xe phía trước; khi cần thiết phải chuyển làn đường, người lái xe phải quan sát xe phía trước để đảm bảo an toàn.", "Phải cho xe đi trong một làn đường và chỉ được chuyển làn đường ở những nơi cho phép; khi chuyển làn cần phải có tín hiệu báo trước và phải đảm bảo an toàn.", "Phải cho xe đi trong một làn đường, khi cần thiết phải chuyển làn đường, người lái xe phải quan sát xe phía trước để đảm bảo an toàn."],
        answer: "b"
    },
    {
        // 48
        question: "Trên đường một chiều có vạch kẻ phân làn đường, xe thô sơ và xe cơ giới phải đi như thế nào là đúng quy tắc giao thông?",
        options: ["Xe thô sơ phải đi trên làn đường bên trái ngoài cùng, xe cơ giới, xe máy chuyên dùng đi bên làn đường bên phải.", "Xe thô sơ phải đi trên làn đường bên phải trong cùng; xe cơ giới, xe máy chuyên dùng đi trên làn đường bên trái.", "Xe thô sơ đi trên làn đường phù hợp không gây cản trở giao thông, xe cơ giới, xe máy chuyên dùng đi trên làn đường bên phải."],
        answer: "b"
    },
    {
        // 49
        question: "Bạn đang lái xe trong khu vực đô thị từ 22h đêm đến 5h sáng hôm sau và cần vượt một xe khác, bạn cần báo hiệu như thế nào để đảm bảo an toàn giao thông?",
        options: ["Phải báo hiệu bằng đèn hoặc còi.", "Chỉ được báo hiệu bằng còi.", "Phải báo hiệu bằng cả còi và đèn.", "Chỉ được báo hiệu bằng đèn."],
        answer: "d"
    },
    {
        // 50
        question: "Khi điều khiển xe chạy trên đường biết có xe sau xin vượt nếu đủ điều kiện an toàn thì người lái xe phải làm gì?",
        options: ["Tăng tốc độ và ra hiệu cho xe sau vượt, không được gây trở ngại cho xe sau vượt.", "Người điều khiển phương tiện phía trước phải giảm tốc độ đi sát về bên phải của phần đường xe chạy cho đến khi xe sau đã vượt qua, không được gây trở ngại cho xe sau vượt.", "Cho xe tránh về bên trái mình và ra hiệu cho xe sau vượt; nếu có chướng ngại vật phía trước hoặc thiếu điều kiện an toàn chưa cho vượt được phải ra hiệu cho xe sau biết; cấm gây trở ngại cho xe xin vượt."],
        answer: "b"
    },

    //câu 101-125==============================================================================================

        {
            question: "Biển nào dưới đây xe gắn máy được phép đi vào?",
            options: ["Biển 1.", "Biển 2.", "Cả 2 biển."],
            answer: "c",
            image: "101-149/101.png"
        },
        {
            question: "Biển nào báo hiệu cấm xe mô tô 2 bánh đi vào?",
            options: ["Biển 1.", "Biển 2.", "Biển 3.", "Cả 3 biển."],
            answer: "a",
            image: "101-149/102, 103.png"
        },
        {
            question: "Khi gặp biển nào thì xe mô tô hai bánh được đi vào?",
            options: ["Không biển nào", "Biển 1 và 2", "Biển 2 và 3", "Cả 3 biển"],
            answer: "c",
            image: "101-149/102, 103.png"
        },
        {
            question: "Biển nào cấm quay đầu xe?",
            options: ["Biển 1", "Biển 2", "Không biển nào.", "Cả 2 biển."],
            answer: "b",
            image: "101-149/104, 105, 106.png"
        },
        {
            question: "Biển nào cấm xe rẽ trái?",
            options: ["Biển 1", "Biển 2", "Cả 2 biển.", "Không biển nào."],
            answer: "a",
            image:"101-149/104, 105, 106.png"
        },
        {
            question: "Khi gặp biển xe nào được rẽ trái?",
            options: ["Biển 1.", "Biển 2.", "Không biển nào", "Cả 2 biển"],
            answer: "b",
            image: "101-149/104, 105, 106.png"
        },
        {
            question: "Biển nào cấm các phương tiện giao thông đường bộ rẽ phải?",
            options: ["Biển 1 và 2.", "Biển 1 và 3.", "Biển 2 và 3.", "Cả 3 biển."],
            answer: "a",
            image: "101-149/107.png"
        },// de 1
        
        {
            question: "Biển nào cấm các phương tiện giao thông đường bộ rẽ trái?",
            options: ["Biển 1 và 2.", "Biển 1 và 3.", "Biển 2 và 3.", "Cả 3 biển."],
            answer: "a",
            image: "101-149/108.png"
        },
        {
            question: "Biển nào cho phép xe rẽ trái?",
            options: ["Biển 1.", "Biển 2.", "Không biển nào."],
            answer: "b",
            image:"101-149/109, 110.png"
        },//DE2---------------------
        {
            question: "Biển nào xe quay đầu bị cấm?",
            options: ["Biển 1.", "Biển 2.", "Cả 2 biển."],
            answer: "a",
            image:"101-149/109, 110.png"
        },
        {
            question: "Biển nào xe được phép quay đầu nhưng không được rẽ trái?",
            options: ["Biển 1.", "Biển 2.", "Cả 2 biển."],
            answer: "b",
            image:"101-149/111.png"
        },
        {
            question: "Biển nào là biển “Cấm đi ngược chiều”?",
            options: ["Biển 1.", "Biển 2.", "Cả 3 biển."],
            answer: "c",
            image:"101-149/112, 113.png"
        },
        {
            question: "Biển nào dưới đây các phương tiện không được phép đi vào?",
            options: ["Biển 1.", "Biển 2.", "Biển 1 và 2."],
            answer: "b",
            image:"101-149/112, 113.png"
        },
        {
            question: "Khi gặp biển nào xe ưu tiên theo luật vẫn phải dừng lại?",
            options: ["Biển 1.", "Biển 2.", "Cả ba biển."],
            answer: "a",
            image:"101-149/114.png"
        },
        {
            question: "Biển nào cấm tất cả các loại xe cơ giới và thô sơ đi lại trên đường, trừ xe ưu tiên theo luật định (nếu đường vẫn cho xe chạy được)?",
            options: ["Biển 1.", "Biển 2.", "Cả 2 biển."],
            answer: "d",
            image:"101-149/115.png"
        },
        {
            question: "Gặp biển nào xe xích lô được phép đi vào?",
            options: ["Biển 1.", "Biển 2.", "Biển 3.", "Biển 1 và 2."],
            answer: "c",
            image:"101-149/116, 117.png"
        },
        {
            question: "Gặp biển nào xe lam, xe xích lô máy được phép đi vào?",
            options: ["Biển 1.", "Biển 2.", "Biển 3."],
            answer: "b",
            image:"101-149/116, 117.png"
        },
        {
            question: "Biển báo nào có ý nghĩa như thế nào?",
            options: ["Tốc độ tối đa cho phép về ban đêm cho các phương tiện là 70km/h.", "Tốc độ tối thiểu cho phép về ban đêm cho các phương tiện là 70km/h."],
            answer: "b",
            image:"101-149/118.png"
        },
        {
            question: "Chiều dài đoạn đường 500m từ nơi đặt biển này, người lái xe có được phép bấm còi không?",
            options: ["Được phép.", "Không được phép."],
            answer: "b",
            image:"101-149/119.png"
        },
        {
            question: "Biển nào xe mô tô hai bánh được đi vào?",
            options: ["Biển 1 và 2.", "Biển 1 và 3.", "Biển 2 và 3."],
            answer: "a",
            image:"101-149/120, 121.png"
        },
        {
            question: "Biển nào xe mô tô hai bánh không được đi vào?",
            options: ["Biển 1.", "Biển 2.", "Biển 3."],
            answer: "a",
            image:"101-149/120, 121.png"
        },
        {
            question: "Biển báo nào báo hiệu bắt đầu đoạn đường vào phạm vi khu dân cư, các phương tiện tham gia giao thông phải tuân theo các quy định đi đường được áp dụng ở khu đông dân cư?",
            options: ["Biển 1.", "Biển 2."],
            answer: "c",
            image:"101-149/122.png"
        },
        {
            question: "Gặp biển nào người lái xe phải nhường đường cho người đi bộ?",
            options: ["Biển 1.", "Biển 2.", "Biển 3.", "Biển 1 và 3."],
            answer: "a",
            image:"101-149/123, 124.png"
        },
        {
            question: "Biển nào chỉ đường dành cho người đi bộ, các loại xe không được đi vào khi gặp biển này?",
            options: ["Biển 1.", "Biển 1 và 3.", "Biển 3.", "Cả 3 biển."],
            answer: "c",
            image:"101-149/123, 124.png"
        },
        {
            question: "Biển nào báo hiệu “Đường dành cho xe thô sơ”?",
            options: ["Biển 1.", "Biển 2.", "Biển 3."],
            answer: "a",
            image:"101-149/125.png"
        },

        //câu 126-150===========================================================================================

        {
            question: "Biển nào báo hiệu sắp đến chỗ giao nhau nguy hiểm?",
            options: ["Biển 1.", "Biển 1 và 2.", "Biển 2 và 3.", "Cả 3 biển trên."],
            answer: "d",
            image:"101-149/126, 127, 128.png"
        },
        {
            question: "Biển nào báo hiệu “Giao nhau với đường sắt có rào chắn”?",
            options: ["Biển 1.", "Biển 2 và 3.", "Biển 3."],
            answer: "a",
            image:"101-149/126, 127, 128.png"
        },
        {
            question: "Biển nào báo hiệu “Giao nhau có tín hiệu đèn”?",
            options: ["Biển 1.", "Biển 2.", "Biển 3.", "Cả 3 biển."],
            answer: "c",
            image:"101-149/126, 127, 128.png"
        },
        {
            question: "Biển nào báo hiệu nguy hiểm giao nhau với đường sắt?",
            options: ["Biển 1 và 2.", "Biển 1 và 3.", "Biển 2 và 3.", "Cả 3 biển."],
            answer: "b",
            image:"101-149/129.png"
        },
        {
            question: "Biển nào báo hiệu đường sắt giao nhau với đường bộ không có rào chắn?",
            options: ["Biển 1 và 2.", "Biển 1 và 3.", "Biển 2 và 3.", "Cả 3 biển."],
            answer: "c",
            image:"101-149/130.png"
        },
        {
            question: "Biển nào báo hiệu sắp đến chỗ giao nhau giữa đường bộ và đường sắt?",
            options: ["Biển 1.", "Biển 2.", "Biển 3.", "Biển 1 và 3"],
            answer: "a",
            image:"101-149/131.png"
        },
        {
            question: "Biển nào báo hiệu, chỉ dẫn xe đi trên đường ray này được quyền ưu tiên qua nơi giao nhau?",
            options: ["Biển 1 và 2.", "Biển 1 và 3.", "Biển 2 và 3.", "Cả 3 biển."],
            answer: "b",
            image:"101-149/132, 133, 134.png"
        },
        {
            question: "Biển nào báo hiệu “Giao nhau với đường không ưu tiên”?",
            options: ["Biển 1 và 3.", "Biển 2.", "Biển 3."],
            answer: "a",
            image:"101-149/132, 133, 134.png"
        },
        {
            question: "Biển nào báo hiệu “Giao nhau với đường ưu tiên”?",
            options: ["Biển 1 và 3.", "Biển 2.", "Biển 3."],
            answer: "b",
            image:"101-149/132, 133, 134.png"
        },
        {
            question: "Biển nào báo hiệu “Đường bị thu hẹp”?",
            options: ["Biển 1 và 2.", "Biển 1 và 3.", "Biển 2 và 3.", "Cả 3 biển."],
            answer: "a",
            image:"101-149/135.png"
        },
        {
            question: "Khi gặp biển nào, người lái xe phải giảm tốc độ, chú ý xe đi ngược chiều, xe đi ở phải đường bị hẹp phải nhường đường cho xe đi ngược chiều?",
            options: ["Biển 1.", "Biển 1 và 3.", "Biển 2 và 3.", "Cả 3 biển."],
            answer: "c",
            image:"101-149/136.png"
        },
        {
            question: "Biển nào báo hiệu “Đường giao nhau” của các tuyến đường cùng cấp?",
            options: ["Biển 1.", "Biển 2.", "Biển 3."],
            answer: "a",
            image:"101-149/137.png"
        },
        {
            question: "Biển nào báo hiệu “Đường đôi”?",
            options: ["Biển 1.", "Biển 2.", "Biển 3."],
            answer: "b",
            image:"101-149/138.png"
        },
        {
            question: "Biển nào báo hiệu “Đường đôi”?",
            options: ["Biển 1.", "Biển 2.", "Biển 3."],
            answer: "c",
            image:"101-149/139.png"
        },
        {
            question: "Biển nào báo hiệu “Giao nhau với đường hai chiều”?",
            options: ["Biển 1.", "Biển 2.", "Biển 3."],
            answer: "a",
            image:"101-149/140.png"
        },
        {
            question: "Biển nào báo hiệu “Đường hai chiều”?",
            options: ["Biển 1.", "Biển 2.", "Biển 3."],
            answer: "b",
            image:"101-149/141.png"
        },
        {
            question: "Biển nào báo hiệu “Giao nhau với đường hai chiều”?",
            options: ["Biển 1.", "Biển 2.", "Biển 3."],
            answer: "b",
            image:"101-149/142.png"
        },
        {
            question: "Biển nào báo hiệu “Chú ý chướng ngại vật”?",
            options: ["Biển 1.", "Biển 2.", "Biển 3."],
            answer: "b",
            image:"101-149/143.png"
        },
        {
            question: "Gặp biển nào người tham gia giao thông phải đi chậm và thận trọng để phòng khả năng xuất hiện và di chuyển bất ngờ của trẻ em trên mặt đường?",
            options: ["Biển 1.", "Biển 2."],
            answer: "b",
            image:"101-149/144.png"
        },
        {
            question: "Biển nào chỉ dẫn nơi bắt đầu đoạn đường dành cho người đi bộ?",
            options: ["Biển 1.", "Biển 2.", "Biển 3."],
            answer: "b",
            image:"101-149/145.png"
        },
        {
            question: "Biển báo này có ý nghĩa gì?",
            options: ["Báo hiệu đường có ổ gà, lồi lõm.", "Báo hiệu đường có gồ giảm tốc phía trước."],
            answer: "b",
            image:"101-149/146.png"
        },
        {
            question: "Biển nào (đặt trước ngã ba, ngã tư) cho phép xe được rẽ sang hướng khác?",
            options: ["Biển 1.", "Biển 2.", "Không biển nào."],
            answer: "c",
            image:"101-149/147.png"
        },
        {
            question: "Biển nào báo hiệu “Hướng đi thẳng phải theo”?",
            options: ["Biển 1.", "Biển 2."],
            answer: "a",
            image:"101-149/148, 149.png"
        },
        {
            question: "Biển nào báo hiệu “Đường một chiều”?",
            options: ["Biển 1.", "Biển 2.", "Cả 2 biển."],
            answer: "b",
            image:"101-149/148, 149.png"
        },
        {
            question: "Trong các biển dưới đây biển nào là biển “Hết tốc độ tối đa cho phép”?",
            options: ["Biển 1.", "Biển 2.", "Biển 3.", "Cả 3 biển."],
            answer: "a",
            image:"150-200/150, 151, 152.png"
        },


        //câu 151-175=================================================================================

        {
            question: "Hiệu lực của biển “Tốc độ tối đa cho phép” hết tác dụng khi gặp biển nào dưới đây?",
            options: ["Biển 1.", "Biển 2.", "Biển 3.", "Biển 1 và 2."],
            answer: "d",
            image:"150-200/150, 151, 152.png"
        },
        {
            question: "Trong các biển dưới đây biển nào là biển “Hết tốc độ tối thiểu”?",
            options: ["Biển 1.", "Biển 2.", "Biển 3.", "Cả 3 biển."],
            answer: "c",
            image:"150-200/150, 151, 152.png"
        },
        {
            question: "Biển nào dưới đây báo hiệu hết cấm vượt?",
            options: ["Biển 1.", "Biển 2.", "Biển 3.", "Biển 2 và 3."],
            answer: "d",
            image:"150-200/153.png"
        },
        {
            question: "Trong các biển dưới đây biển nào là biển “Hết mọi lệnh cấm”?",
            options: ["Biển 1.", "Biển 2.", "Biển 3.", "Cả 3 biển."],
            answer: "b",
            image:"150-200/154.png"
        },
        {
            question: "Biển nào chỉ dẫn cho người đi bộ sử dụng cầu vượt qua đường?",
            options: ["Biển 1.", "Biển 2.", "Cả 2 biển.", "Không biển nào."],
            answer: "a",
            image:"150-200/155.png"
        },
        {
            question: "Biển nào chỉ dẫn cho người đi bộ sử dụng hầm chui qua đường?",
            options: ["Biển 1.", "Biển 2.", "Cả 2 biển.", "Không biển nào."],
            answer: "b",
            image:"150-200/156.png"
        },
        {
            question: "Biển nào báo hiệu “nơi đỗ xe dành cho người khuyết tật”?",
            options: ["Biển 1.", "Biển 2.", "Biển 3."],
            answer: "b",
            image:"150-200/157.png"
        },
        {
            question: "Gặp biển báo như này người tham gia giao thông phải xử lý như thế nào?",
            options: ["Dừng xe tại khu vực có trạm Cảnh sát giao thông.", "Tiếp tục lưu thông với tốc độ bình thường.", "Phải giảm tốc độ đến mức an toàn và không được vượt khi đi qua khu vực này."],
            answer: "c",
            image:"150-200/158.png"
        },
        {
            question: "Biển số 1 có ý nghĩa gì?",
            options: ["Đi thẳng hoặc rẽ trái trên cầu vượt.", "Đi thẳng hoặc rẽ phải trên cầu vượt", "Báo hiệu cầu vượt liên thông."],
            answer: "c",
            image:"150-200/159.png"
        },
        {
            question: "Vạch kẻ đường nào dưới đây là vạch phân chia các làn xe cùng chiều?",
            options: ["Vạch 1.", "Vạch 2.", "Vạch 3.", "Vạch 1 và 2."],
            answer: "d",
            image:"150-200/160.png"
        },
        {
            question: "Vạch kẻ đường nào dưới đây là vạch phân chia hai chiều xe chạy (vạch tìm đường), xe không được lấn làn, không được đè lên vạch?",
            options: ["Vạch 1.", "Vạch 2.", "Vạch 3.", "Cả 3 vạch."],
            answer: "b",
            image:"150-200/161.png"
        },
        {
            question: "Vạch kẻ đường nào dưới đây là vạch phân chia hai chiều xe chạy (vạch tìm đường)?",
            options: ["Vạch 1.", "Vạch 2.", "Vạch 3.", "Vạch 1 và 3."],
            answer: "d",
            image:"150-200/162.png"
        },
        {
            question: "Các vạch dưới đây có tác dụng gì?",
            options: ["Phân chia hai chiều xe chạy ngược chiều nhau.", "Phân chia các làn xe chạy cùng chiều nhau."],
            answer: "a",
            image:"150-200/163.png"
        },
        {
            question: "Khi gặp vạch kẻ đường nào các xe được phép đè vạch?",
            options: ["Vạch 1.", "Vạch 2.", "Vạch 3.", "Vạch 1 và 3."],
            answer: "d",
            image:"150-200/164.png"
        },
        {
            question: "Vạch dưới đây có ý nghĩa gì?",
            options: ["Vị trí dừng xe của các phương tiện vận tải hành khách công cộng.", "Báo cho người điều khiển được dừng phương tiện trong phạm vi phần mặt đường có bố trí vạch để tránh ùn tắc giao thông.", "Dùng để xác định vị trí giữa các phương tiện trên đường."],
            answer: "a",
            image:"150-200/165.png"
        },
        {
            question: "Thứ tự các xe đi như thế nào là đúng quy tắc giao thông?",
            options: ["Xe tải, xe khách, xe con, mô tô.", "Xe tải, mô tô, xe khách, xe con.", "Xe khách, xe tải, xe con, mô tô.", "Mô tô, xe khách, xe tải, xe con."],
            answer: "b",
            image:"150-200/166.png"
        },
        {
            question: "Thứ tự các xe đi như thế nào là đúng quy tắc giao thông?",
            options: ["Xe tải, xe con, mô tô.", "Xe con, xe tải, mô tô.", "Mô tô, xe con, xe tải.", "Xe con, mô tô, xe tải."],
            answer: "c",
            image:"150-200/167.png"
        },
        {
            question: "Trường hợp này xe nào được quyền đi trước?",
            options: ["Mô tô.", "Xe con."],
            answer: "b",
            image:"150-200/168.png"
        },
        {
            question: "Xe nào được quyền đi trước trong trường hợp này?",
            options: ["Mô tô.", "Xe cứu thương."],
            answer: "b",
            image:"150-200/169.png"
        },
        {
            question: "Theo tín hiệu đèn, xe nào được phép đi?",
            options: ["Xe con và xe khách.", "Mô tô."],
            answer: "a",
            image:"150-200/170.png"
        },
        {
            question: "Các xe đi theo hướng mũi tên, xe nào vi phạm quy tắc giao thông?",
            options: ["Xe khách, xe tải, mô tô.", "Xe tải, xe con, mô tô.", "Xe khách, xe con, mô tô."],
            answer: "a",
            image:"150-200/171.png"
        },
        {
            question: "Thứ tự các xe đi như thế nào là đúng quy tắc giao thông?",
            options: ["Xe khách, xe tải, mô tô, xe con.", "Xe con, xe khách, xe tải, mô tô.", "Mô tô, xe tải, xe khách, xe con.", "Mô tô, xe tải, xe con, xe khách."],
            answer: "c",
            image:"150-200/172.png"
            // DE1-------------------------------------
        },
        {
            question: "Trong trường hợp này xe nào đỗ vi phạm quy tắc giao thông?",
            options: ["Xe tải.", "Xe con và mô tô.", "Cả 3 xe.", "Xe con và xe tải."],
            answer: "a",
            image:"150-200/173.png"
        },
        {
            question: "Theo hướng mũi tên, những hướng nào xe gắn máy đi được?",
            options: ["Cả ba hướng.", "Chỉ hướng 1 và 3.", "Chỉ hướng 1."],
            answer: "a",
            image:"150-200/174.png"
        },
        {
            question: "Xe nào đỗ vi phạm quy tắc giao thông?",
            options: ["Cả 2 xe.", "Không xe nào vi phạm.", "Chỉ xe mô tô vi phạm.", "Chỉ xe tải vi phạm."],
            answer: "a",
            image:"150-200/175.png"
        },


        //câu 176-200========================================================================================
        {
            question: "Xe nào đỗ vi phạm quy tắc giao thông?",
            options: ["Chỉ mô tô.", "Chỉ xe tải.", "Cả 3 xe.", "Chỉ mô tô và xe tải."],
            answer: "c",
            image:"150-200/176.png"
        },
        {
            question: "Xe tải kéo mô tô ba bánh như hình này có đúng quy tắc giao thông hay không?",
            options: ["Đúng.", "Không đúng."],
            answer: "b",
            image:"150-200/177.png"
    },
    {
            question: "Xe nào được quyền đi trước trong trường hợp này?",
            options: ["Xe con.", "Xe mô tô."],
            answer: "b",
            image:"150-200/178.png"
    },
    {
            question: "Thứ tự các xe đi như thế nào là đúng quy tắc giao thông?",
            options: ["Xe con (A), mô tô, xe con (B), xe đạp.", "Xe con (B), xe đạp, mô tô, xe con (A).", "Xe con (A), xe con (B), mô tô + xe đạp.", "Mô tô + xe đạp, xe con (A), xe con (B)."],
            answer: "d",
            image:"150-200/179.png"
    },//DE2===============================
    {
        question: "Xe nào được quyền đi trước trong trường hợp này?",
        options: ["Mô tô.", "Xe con."],
        answer: "a",
        image:"150-200/180.png"
    },
    {
        question: "Xe nào vi phạm quy tắc giao thông?",
        options: ["Xe khách.", "Mô tô.", "Xe con.", "Xe con và mô tô."],
        answer: "c",
        image:"150-200/181.png"
    },
    {
        question: "Các xe đi như thế nào là đúng quy tắc giao thông?",
        options: ["Các xe ở phái tay phải và tay trái của người điều khiển được phép đi thẳng.", "Cho phép các xe ở mọi hướng được rẽ phải.", "Tất cả các xe phải dừng lại trước ngã tư, trừ những xe đã ở trong ngã tư được phép tiếp tục đi."],
        answer: "c",
        image:"150-200/182.png"
    },
    {
        question: "Theo mũi tên, xe nào được phép đi.",
        options: ["Mô tô, xe con.", "Xe con, xe tải.", "Mô tô, xe tải.", "Cả 3 xe."],
        answer: "c",
        image:"150-200/183.png"
    },
    {
        question: "Trong hình dưới đây, xe nào chấp hành đúng quy tắc giao thông?",
        options: ["Chỉ xe khách, mô tô.", "Tất cả các loại xe trên.", "Không xe nào chấp hành đúng quy tắc giao thông."],
        answer: "b",
        image:"150-200/184.png"
    },
    {
        question: "Theo hướng mũi tên, những hướng nào xe mô tô được phép đi?",
        options: ["Cả 3 hướng.", "Hướng 1 và 2.", "Hướng 1 và 3.", "Hướng 2 và 3."],
        answer: "c",
        image:"150-200/185.png"
    },
    {
        question: "Trong trường hợp này, thứ tự xe đi như thế nào là đúng quy tắc giao thông?",
        options: ["Xe công an, xe quân sự, xe con + mô tô.", "Xe quân sự, xe công an, xe con + mô tô.", "Xe mô tô + xe con, xe quân sự, xe công an."],
        answer: "b",
        image:"150-200/186.png"
    },
    {
        question: "Trong hình dưới, những xe nào vi phạm quy tắc giao thông?",
        options: ["Xe con (E), mô tô (C).", "Xe tải (A), mô tô (D).", "Xe khách (B), mô tô (C).", "Xe khách (B), mô tô (D)."],
        answer: "a",
        image:"150-200/187.png"
    },
    {
        question: "Trong hình dưới, những xe nào vi phạm quy tắc giao thông?",
        options: ["Xe con (B), mô tô (C).", "Xe con (A), mô tô (C).", "Xe con (E), mô tô (D).", "Tất cả các loại xe trên."],
        answer: "c",
        image:"150-200/188.png"
    },
    {
        question: "Bạn có được phép vượt xe mô tô phía trước không?",
        options: ["Cho phép.", "Không được vượt."],
        answer: "b",
        image:"150-200/189.png"
    },
    {
        question: "Theo tín hiệu đèn của xe cơ giới, xe nào vi phạm quy tắc giao thông?",
        options: ["Xe mô tô.", "Xe ô tô con.", "Không xe nào vi phạm.", "Cả 2 xe."],
        answer: "d",
        image:"150-200/190.png"
    },
    {
        question: "Các xe đi theo hướng mũi tên, xe nào vi phạm quy tắc giao thông?",
        options: ["Xe con.", "Xe tải.", "Xe con, xe tải."],
        answer: "b",
        image:"150-200/191.png"
    },
    {
        question: "Các xe đi theo hướng mũi tên, xe nào vi phạm quy tắc giao thông?",
        options: ["Xe tải, xe con,", "Xe khách, xe con.", "Xe khách, xe tải."],
        answer: "c",
        image:"150-200/192.png"
    },
    {
        question: "Các xe đi theo hướng mũi tên, xe nào vi phạm quy tắc giao thông?",
        options: ["Xe con, xe tải, xe khách.", "Xe tải, xe khách, xe mô tô.", "Xe khách, xe mô tô, xe con.", "Cả bốn xe."],
        answer: "b",
        image:"150-200/193.png"
    },
    {
        question: "Các xe đi theo hướng mũi tên, xe nào chấp hành đúng quy tắc giao thông?",
        options: ["Xe tải, mô tô.", "Xe khách, mô tô.", "Xe tải, xe con.", "Mô tô, xe con."],
        answer: "b",
        image:"150-200/194.png"
    },
    {
        question: "Các xe đi theo thứ tự nào là đúng quy tắc giao thông đường bộ?",
        options: ["Xe của bạn, mô tô, xe con.", "Xe con, xe của bạn, mô tô.", "Mô tô, xe con, xe của bạn."],
        answer: "c",
        image:"150-200/195.png"
    },
    {
        question: "Các xe đi theo thứ tự nào là đúng quy tắc giao thông đường bộ?",
        options: ["Xe của bạn, mô tô, xe con.", "Xe con, xe của bạn, mô tô.", "Mô tô, xe con, xe của bạn."],
        answer: "b",
        image:"150-200/196.png"
    },
    {
        question: "Bạn xử lý như thế nào trong trường hợp này?",
        options: ["Tăng tốc độ, rẽ phải trước xe tải và xe đạp.", "Giảm tốc độ, rẽ phải sau xe tải và xe đạp.", "Tăng tốc độ, rẽ phải trước xe đạp."],
        answer: "b",
        image:"150-200/197.png"
    },
    {
        question: "Xe nào dừng đúng theo quy tắc giao thông?",
        options: ["Xe con.", "Xe mô tô.", "Cả 2 xe đều đúng."],
        answer: "a",
        image:"150-200/198.png"
    },
    {
        question: "Xe của bạn đang di chuyển gần đến khu vực giao cắt với đường sắt, khi rào chắn đang dịch chuyển, bạn điều khiển xe như thế nào là đúng quy tắc giao thông?",
        options: ["Quan sát nếu thấy không có tàu thì tăng tốc cho xe vượt qua đường sắt.", "Dừng lại trước rào chắn một khoảng cách an toàn.", "Ra tín hiệu, yêu cầu người gác chắn tàu kéo chậm Barie để xe bạn qua."],
        answer: "b",
        image:"150-200/199.png"
    },
    {
        question: "Trong tình huống dưới đây, xe đầu kéo kéo rơ moóc (xe container) đang rẽ phải, xe con màu xanh và xe máy phía sau xe container đi như thế nào để đảm bảo an toàn?",
        options: ["Vượt về phía bên phải để đi tiếp.", "Giảm tốc độ chờ xe container rẽ xong rồi tiếp tục đi.", "Vượt về phía bên trái để đi tiếp."],
        answer: "b",
        image:"150-200/200.png"
    }

];


function shuffleArray(array) {
            for (let i = array.length - 1; i > 0; i--) {
                const j = Math.floor(Math.random() * (i + 1));
                [array[i], array[j]] = [array[j], array[i]];
            }
            return array;
        }

        // Shuffle and select 25 questions
        const shuffledQuestions = shuffleArray(questions);  
        const selectedQuestions = shuffledQuestions.slice(0, 25);

        let currentQuestion = 0;

        function loadQuestion(questionIndex) {
            const questionContainer = document.getElementById('quizForm');
            const question = selectedQuestions[questionIndex];
            const selectedAnswer = question.selectedAnswer;

            questionContainer.innerHTML = `
                <div class="question">
                    <p>${questionIndex + 1}. ${question.question}</p>
                    ${question.image ? `<img src="${question.image}" alt="Question Image" style="max-width: 100%; height: auto;">` : ''}
                    <div class="options">
                        ${question.options.map((option, index) => `
                            <label><input type="radio" name="q${questionIndex + 1}" value="${String.fromCharCode(97 + index)}" ${selectedAnswer === String.fromCharCode(97 + index) ? 'checked' : ''}> ${String.fromCharCode(97 + index).toUpperCase()}. ${option}</label>
                        `).join('')}
                    </div>
                </div>
            `;
        }

        function loadShuffledQuestionList() {
            const questionListContainer = document.getElementById('questionList');
            questionListContainer.innerHTML = selectedQuestions.map((_, index) => `
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
            document.getElementById('nextBtn').disabled = currentQuestion === selectedQuestions.length - 1;
        }

        function prevQuestion() {
            if (currentQuestion > 0) {
                selectQuestion(currentQuestion - 1);
            }
        }

        function nextQuestion() {
            if (currentQuestion < selectedQuestions.length - 1) {
                selectQuestion(currentQuestion + 1);
            }
        }

        function submitQuiz() {
            saveAnswer(); // Save the answer before submitting the quiz
            let score = 0;

            for (let i = 0; i < selectedQuestions.length; i++) {
                const selected = selectedQuestions[i].selectedAnswer;
                if (selected !== null && selected === selectedQuestions[i].answer) {
                    score++;
                }
            }

            const total = selectedQuestions.length;
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
                selectedQuestions[currentQuestion].selectedAnswer = selected.value;
            } else {
                selectedQuestions[currentQuestion].selectedAnswer = null;
            }
        }

        // Initialize the quiz
        loadShuffledQuestionList();
        loadQuestion(0);
        updateQuestionButtons();

        // Timer function
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
                    submitQuiz();
                }
            }, 1000);
        }

        window.onload = function () {
            const timeRemaining = document.querySelector('#timeRemaining');
            const twentyMinutes = 60 * 20; // 20 minutes in seconds
            startTimer(twentyMinutes, timeRemaining);
        };
    </script>
</body>
</html>
