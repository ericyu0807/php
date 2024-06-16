<?php
session_start();

if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    header("Location: login.php");
    exit();
}

$sName = $_SESSION["sName"] ?? "";
$sGrade = $_SESSION["sGrade"] ?? "";
$sId = $_SESSION["sId"] ?? "";
$sCity = $_SESSION["sCity"] ?? "";
$sGender = $_SESSION["sGender"] ?? "";
$sSize = $_SESSION["sSize"] ?? "";
$sDate = $_SESSION["sDate"] ?? "";
$sMail = $_SESSION["sMail"] ?? "";
$sPhone = $_SESSION["sPhone"] ?? "";
$sEName = $_SESSION["sEName"] ?? "";
$sEPhone = $_SESSION["sEPhone"] ?? "";
$sPastParticipation = $_SESSION["sPastParticipation"] ?? "";
$sFoodNeed = $_SESSION["sFoodNeed"] ?? "";
$sFood = $_SESSION["sFood"] ?? "";
$sColor = $_SESSION["sColor"] ?? "";
$sQuantity = $_SESSION["sQuantity"] ?? "";
$sAct = $_SESSION["sAct"] ?? [];
$sComment = $_SESSION["sComment"] ?? "";
?>

<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <title>資管晚會報名表結果</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
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
</head>
<body>
    <h2>資管晚會報名表結果</h2>
    <table>
        <tr><th>你的名字</th><td><?php echo htmlspecialchars($sName); ?></td></tr>
        <tr><th>你的年級</th><td><?php echo htmlspecialchars($sGrade); ?></td></tr>
        <tr><th>你的學號</th><td><?php echo htmlspecialchars($sId); ?></td></tr>
        <tr><th>住家市政區</th><td><?php echo htmlspecialchars($sCity); ?></td></tr>
        <tr><th>電子郵件</th><td><?php echo htmlspecialchars($sMail); ?></td></tr>
        <tr><th>電話號碼</th><td><?php echo htmlspecialchars($sPhone); ?></td></tr>
        <tr><th>緊急聯絡人</th><td><?php echo htmlspecialchars($sEName); ?></td></tr>
        <tr><th>緊急聯絡人電話</th><td><?php echo htmlspecialchars($sEPhone); ?></td></tr>
        <tr><th>性別</th><td><?php echo htmlspecialchars($sGender); ?></td></tr>
        <tr><th>是否參與過往年的活動</th><td><?php echo htmlspecialchars($sPastParticipation); ?></td></tr>
        <tr><th>是否有特殊飲食需求</th><td><?php echo htmlspecialchars($sFoodNeed); ?></td></tr>
        <?php if ($sFoodNeed == "是") : ?>
            <tr><th>特殊飲食需求</th><td><?php echo htmlspecialchars($sFood); ?></td></tr>
        <?php endif; ?>
        <tr><th>你的生日</th><td><?php echo htmlspecialchars($sDate); ?></td></tr>
        <tr><th>衣服顏色</th><td><?php echo htmlspecialchars($sColor); ?></td></tr>
        <tr><th>衣服數量</th><td><?php echo htmlspecialchars($sQuantity); ?></td></tr>
        <tr><th>衣服尺寸</th><td><?php echo htmlspecialchars($sSize); ?></td></tr>
        <tr><th>如何得知該活動</th><td>
            <?php echo htmlspecialchars(implode(", ", $sAct)); ?>
        </td></tr>
        <tr><th>你的希望或建議</th><td><?php echo htmlspecialchars($sComment); ?></td></tr>
    </table>
    <a href="logout.php" class="logout-btn">登出</a>
</body>
</html>
