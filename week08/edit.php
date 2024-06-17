<?php
session_start();

// 檢查用戶是否已登錄
if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    header("Location: login.php");
    exit();
}

// 建立數據庫連接
$servername = "localhost";
$username = "root"; // 根據您的數據庫設置更改
$password = ""; // 根據您的數據庫設置更改
$dbname = "homework"; // 根據您的數據庫設置更改

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("連接失敗: " . $conn->connect_error);
}

// 初始化變量
$sName = $sGrade = $sId = $sCity = $sMail = $sPhone = $sEName = $sEPhone = $sGender = '';
$sPastParticipation = $sFoodNeed = $sFood = $sDate = $sColor = $sQuantity = $sSize = $sAct = $sComment = '';

// 獲取最大的ID
$stmt = $conn->prepare("SELECT MAX(id) AS max_id FROM registration");
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $id = $row['max_id'];
} else {
    $id = null;
}

$stmt->close();

// 從數據庫中獲取用戶信息填充表單
if ($id) {
    $stmt = $conn->prepare("SELECT * FROM registration WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();

        // 將獲取的數據分配給變量
        $sName = htmlspecialchars($data["name"] ?? '');
        $sGrade = htmlspecialchars($data["grade"] ?? '');
        $sId = htmlspecialchars($data["student_id"] ?? '');
        $sCity = htmlspecialchars($data["city"] ?? '');
        $sMail = htmlspecialchars($data["email"] ?? '');
        $sPhone = htmlspecialchars($data["phone"] ?? '');
        $sEName = htmlspecialchars($data["emergency_contact_name"] ?? '');
        $sEPhone = htmlspecialchars($data["emergency_contact_phone"] ?? '');
        $sGender = htmlspecialchars($data["gender"] ?? '');
        $sPastParticipation = htmlspecialchars($data["past_participation"] ?? '');
        $sFoodNeed = htmlspecialchars($data["food_need"] ?? '');
        $sFood = htmlspecialchars($data["food"] ?? '');
        $sDate = htmlspecialchars($data["birth_date"] ?? '');
        $sColor = htmlspecialchars($data["color"] ?? '');
        $sQuantity = htmlspecialchars($data["quantity"] ?? '');
        $sSize = htmlspecialchars($data["size"] ?? '');
        $sAct = htmlspecialchars($data["activities"] ?? '');
        $sComment = htmlspecialchars($data["comment"] ?? '');
    } else {
        echo "未找到記錄";
    }

    $stmt->close();
} else {
    echo "未找到最大ID";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <title>編輯資管晚會報名表</title>
</head>
<body>
    <h2>編輯資管晚會報名表</h2>
    <form action="result_info.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        
        <!-- 預填表單字段 -->
        <label for="sName">您的姓名:</label>
        <input type="text" id="sName" name="sName" value="<?php echo $sName; ?>"><br>
        
        <label for="sGrade">您的年級:</label>
        <input type="text" id="sGrade" name="sGrade" value="<?php echo $sGrade; ?>"><br>
        
        <label for="sId">您的學號:</label>
        <input type="text" id="sId" name="sId" value="<?php echo $sId; ?>"><br>
        
        <label for="sCity">您的城市:</label>
        <input type="text" id="sCity" name="sCity" value="<?php echo $sCity; ?>"><br>
        
        <label for="sMail">您的電子郵件:</label>
        <input type="text" id="sMail" name="sMail" value="<?php echo $sMail; ?>"><br>
        
        <label for="sPhone">您的電話號碼:</label>
        <input type="text" id="sPhone" name="sPhone" value="<?php echo $sPhone; ?>"><br>
        
        <label for="sEName">您的緊急聯絡人姓名:</label>
        <input type="text" id="sEName" name="sEName" value="<?php echo $sEName; ?>"><br>
        
        <label for="sEPhone">您的緊急聯絡人電話號碼:</label>
        <input type="text" id="sEPhone" name="sEPhone" value="<?php echo $sEPhone; ?>"><br>
        
        <label for="sGender">您的性別:</label>
        <input type="text" id="sGender" name="sGender" value="<?php echo $sGender; ?>"><br>
        
        <label for="sPastParticipation">您是否參與過活動:</label>
        <input type="text" id="sPastParticipation" name="sPastParticipation" value="<?php echo $sPastParticipation; ?>"><br>
        
        <label for="sFoodNeed">您是否有特殊飲食需求:</label>
        <input type="text" id="sFoodNeed" name="sFoodNeed" value="<?php echo $sFoodNeed; ?>"><br>
        
        <label for="sFood">您的特殊飲食需求:</label>
        <input type="text" id="sFood" name="sFood" value="<?php echo $sFood; ?>"><br>
        
        <label for="sDate">您的生日:</label>
        <input type="text" id="sDate" name="sDate" value="<?php echo $sDate; ?>"><br>
        
        <label for="sSize">您的衣服尺寸:</label>
        <input type="text" id="sSize" name="sSize" value="<?php echo $sSize; ?>"><br>
        
        <label for="sColor">您的衣服顏色:</label>
        <input type="text" id="sColor" name="sColor" value="<?php echo $sColor; ?>"><br>
        
        <label for="sQuantity">您的衣服數量:</label>
        <input type="text" id="sQuantity" name="sQuantity" value="<?php echo $sQuantity; ?>"><br>
        
        <label for="sAct">您的活動選擇:</label>
        <input type="text" id="sAct" name="sAct" value="<?php echo $sAct; ?>"><br>
        
        <label for="sComment">您的備註:</label>
        <input type="text" id="sComment" name="sComment" value="<?php echo $sComment; ?>"><br>
        
        <input type="submit" value="提交">
    </form>
</body>
</html>
