<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="utf-8">
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
    </style>
</head>
<body>
<?php
    $sName = $_POST["sName"] ?? "";
    $sId = $_POST["sId"] ?? "";
    $sGrade = $_POST["sGrade"] ?? "";
    $sCity = $_POST["sCity"] ?? "";
    $sGender = $_POST["sGender"] ?? "";
    $sSize = $_POST["sSize"] ?? "";
    $sDate = $_POST["sDate"] ?? "";
    $sEmail = $_POST["sMail"] ?? "";
    $sQuantity = $_POST["sQuantity"] ?? "";
    $sAct = $_POST["sAct"] ?? [];
    $sExpect = $_POST["sExpect"] ?? "";
    $sComment = $_POST["sComment"] ?? "";
    $sMail = $_POST["sMail"] ?? "";
    $sPhone = $_POST["sPhone"] ?? "";
    $sEName = $_POST["sEName"] ?? "";
    $sEPhone = $_POST["sEPhone"] ?? "";
    $sPastParticipation = $_POST["sPastParticipation"] ?? "";
    $sFoodNeed = $_POST["sFoodNeed"] ?? "";
    $sFood = $_POST["sFood"] ?? "";
    $sColor = $_POST["sColor"] ?? "";
    
    echo "<h2>資管晚會報名表結果</h2>";
    echo "<table>";
    echo "<tr><th>你的名字</th><td>{$sName}</td></tr>";
    echo "<tr><th>你的年級</th><td>{$sGrade}</td></tr>";
    echo "<tr><th>你的學號</th><td>{$sId}</td></tr>";
    echo "<tr><th>住家市政區</th><td>{$sCity}</td></tr>";
    echo "<tr><th>電子郵件</th><td>{$sMail}</td></tr>";
    echo "<tr><th>電話號碼</th><td>{$sPhone}</td></tr>";
    echo "<tr><th>緊急聯絡人</th><td>{$sEName}</td></tr>";
    echo "<tr><th>緊急聯絡人電話</th><td>{$sEPhone}</td></tr>";
    echo "<tr><th>性別</th><td>{$sGender}</td></tr>";
    echo "<tr><th>是否參與過往年的活動</th><td>{$sPastParticipation}</td></tr>";
    echo "<tr><th>是否有特殊飲食需求</th><td>{$sFoodNeed}</td></tr>";
    if ($sFoodNeed == "是") {
        echo "<tr><th>特殊飲食需求</th><td>{$sFood}</td></tr>";
    }
    echo "<tr><th>你的生日</th><td>{$sDate}</td></tr>";
    echo "<tr><th>衣服顏色</th><td>{$sColor}</td></tr>";
    echo "<tr><th>衣服數量</th><td>{$sQuantity}</td></tr>";
    echo "<tr><th>衣服尺寸</th><td>{$sSize}</td></tr>";
    
    echo "<tr><th>如何得知該活動</th><td>";
    foreach($sAct as $value){
        echo "{$value} ";
    }
    echo "</td></tr>";

    echo "<tr><th>你的希望或建議</th><td>{$sComment}</td></tr>";
    echo "</table>";
?>
</body>
</html>
