<?php
session_start();

// Redirect to login page if not logged in
if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    header("Location: login.php");
    exit();
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['sName'] = $_POST['sName'] ?? '';
    $_SESSION['sGrade'] = $_POST['sGrade'] ?? '';
    $_SESSION['sId'] = $_POST['sId'] ?? '';
    $_SESSION['sMail'] = $_POST['sMail'] ?? '';
    $_SESSION['sPhone'] = $_POST['sPhone'] ?? '';
    $_SESSION['sEName'] = $_POST['sEName'] ?? '';
    $_SESSION['sEPhone'] = $_POST['sEPhone'] ?? '';
    $_SESSION['sCity'] = $_POST['sCity'] ?? '';
    $_SESSION['sGender'] = $_POST['sGender'] ?? '';
    $_SESSION['sPastParticipation'] = $_POST['sPastParticipation'] ?? '';
    $_SESSION['sFoodNeed'] = $_POST['sFoodNeed'] ?? '';
    $_SESSION['sFood'] = $_POST['sFood'] ?? '';
    $_SESSION['sDate'] = $_POST['sDate'] ?? '';
    $_SESSION['sQuantity'] = $_POST['sQuantity'] ?? '';
    $_SESSION['sSize'] = $_POST['sSize'] ?? '';
    $_SESSION['sColor'] = $_POST['sColor'] ?? '';
    $_SESSION['sAct'] = $_POST['sAct'] ?? [];
    $_SESSION['sComment'] = $_POST['sComment'] ?? '';

    header('Location: result_info.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <title>資管晚會報名表</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        form {
            background: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }
        input[type="text"], input[type="email"], input[type="tel"], input[type="date"], input[type="file"], input[type="color"], input[type="number"], textarea {
            width: calc(100% - 20px);
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="radio"], input[type="checkbox"] {
            margin-right: 10px;
        }
        select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"], input[type="reset"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            margin: 10px 5px 0 0;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="reset"] {
            background-color: #f44336;
        }
        input[type="submit"]:hover, input[type="reset"]:hover {
            opacity: 0.8;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .red-text {
            color: red;
        }
        .logout-btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 13px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            outline: none;
            color: #fff;
            background-color: #4CAF50;
            border: none;
            border-radius: 5px;
        }

    </style>
    <script>
        function toggleFoodInput() {
            var foodInput = document.getElementById('sFood');
            var foodNeedYes = document.getElementById('foodNeedYes');
            if (foodNeedYes.checked) {
                foodInput.style.display = 'block';
            } else {
                foodInput.style.display = 'none';
                foodInput.value = '';
            }
        }
    </script>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <h1>資管晚會報名表</h1>
        <div class="form-group">
            <label for="sName">姓名:</label>
            <input type="text" id="sName" name="sName" placeholder="填入姓名" required>
        </div>
        <div class="form-group">
            <label for="sGrade">年級:</label>
            <input type="text" id="sGrade" name="sGrade" placeholder="填入年級" required>
        </div>
        <div class="form-group">
            <label for="sId">學號:</label>
            <input type="text" id="sId" name="sId" placeholder="填入學號" required>
        </div>
        <div class="form-group">
            <label for="sMail">電子郵件:</label>
            <input type="email" id="sMail" name="sMail" placeholder="example@gmail.com" required>
        </div>
        <div class="form-group">
            <label for="sPhone">電話號碼:</label>
            <input type="tel" id="sPhone" name="sPhone" placeholder="填入電話號碼" required>
        </div>
        <div class="form-group">
            <label for="sEName">緊急聯絡人:</label>
            <input type="text" id="sEName" name="sEName" placeholder="填入緊急聯絡人" required>
        </div>
        <div class="form-group">
            <label for="sEPhone">緊急聯絡電話:</label>
            <input type="tel" id="sEPhone" name="sEPhone" placeholder="填入緊急聯絡電話" required>
        </div>
        <div class="form-group">
            <label>住家市政區:</label>
            <input type="radio" name="sCity" value="基隆">基隆
            <input type="radio" name="sCity" value="新北">新北
            <input type="radio" name="sCity" value="台北" checked>台北
            <input type="radio" name="sCity" value="桃園">桃園
            <input type="radio" name="sCity" value="新竹">新竹
            <input type="radio" name="sCity" value="苗栗">苗栗
            <input type="radio" name="sCity" value="台中">台中
            <input type="radio" name="sCity" value="彰化">彰化
            <input type="radio" name="sCity" value="南投">南投
            <input type="radio" name="sCity" value="雲林">雲林
            <input type="radio" name="sCity" value="嘉義">嘉義
            <input type="radio" name="sCity" value="台南">台南
            <input type="radio" name="sCity" value="高雄">高雄
            <input type="radio" name="sCity" value="屏東">屏東
            <input type="radio" name="sCity" value="澎湖">澎湖
            <input type="radio" name="sCity" value="宜蘭">宜蘭
            <input type="radio" name="sCity" value="花蓮">花蓮
            <input type="radio" name="sCity" value="台東">台東
            <input type="radio" name="sCity" value="綠島">綠島
            <input type="radio" name="sCity" value="蘭嶼">蘭嶼
            <input type="radio" name="sCity" value="金門">金門
            <input type="radio" name="sCity" value="馬祖">馬祖
        </div>
        <div class="form-group">
            <label>性別:</label>
            <input type="radio" name="sGender" value="男">男
            <input type="radio" name="sGender" value="女" checked>女
        </div>
        <div class="form-group">
            <label>是否參與過往年的活動:</label>
            <input type="radio" name="sPastParticipation" value="是">是
            <input type="radio" name="sPastParticipation" value="否" checked>否
        </div>
        <div class="form-group">
            <label>是否有特殊飲食需求:</label>
            <input type="radio" name="sFoodNeed" id="foodNeedYes" value="是" onclick="toggleFoodInput()">是
            <input type="radio" name="sFoodNeed" id="foodNeedNo" value="否" checked onclick="toggleFoodInput()">否
            <input type="text" id="sFood" name="sFood" placeholder="請輸入需求" style="display: none;">
        </div>
        <div class="form-group">
            <label for="sDate">你的生日:</label>
            <input type="date" id="sDate" name="sDate">
        </div>
        <div class="form-group">
            <label for="sFile">上傳一份自我介紹:</label>
            <input type="file" id="sFile" name="sFile">
        </div>
        <div class="form-group">
            <label for="sColor">衣服顏色:</label>
            <input type="color" id="sColor" name="sColor">
        </div>
        <div class="form-group">
            <label for="sQuantity">我要幾件衣服:</label>
            <input type="number" id="sQuantity" name="sQuantity">
        </div>
        <div class="form-group">
            <label for="sSize">請輸入衣服尺寸:</label>
            <select id="sSize" name="sSize">
                <option value="S">S</option>
                <option value="M">M</option>
                <option value="L">L</option>
                <option value="XL">XL</option>
            </select>
        </div>
        <div class="form-group">
            <label>如何得知該活動(可複選):</label><br>
            <input type="checkbox" name="sAct[]" value="同學告知">同學告知
            <input type="checkbox" name="sAct[]" value="廣告得知">廣告得知
            <input type="checkbox" name="sAct[]" value="老師宣傳">老師宣傳
            <input type="checkbox" name="sAct[]" value="其他">其他
        </div>
        <div class="form-group">
            <label for="sComment">是否有特別希望或建議:</label><br>
            <textarea id="sComment" name="sComment" rows="10" cols="50"></textarea>
        </div>
        <input type="submit" value="送出">
        <input type="reset" value="刪除">
        <a href="logout.php" class="logout-btn">登出</a>
        <p class="red-text">送出後會跑出送出的個人資料，請查閱是否正確。</p>
    </form>
</body>
</html>
