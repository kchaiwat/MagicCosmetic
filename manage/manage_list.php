<?php include "../connect.php" ?>
<?php session_start(); ?>
<?php if($_SESSION["Username"]=='admin') { ?>
<html>
<head>
<meta charset="utf-8">
</head>
<body>

<table border="1">
<tr>
    <th>รหัสสมาชิก</th>
    <th>ชื่อสมาชิก</th>
    <th>รหัสสินค้า</th>
    <th>วันที่แก้ไข</th>
</tr>

<!-- **********************ดึงค่าของ order_head ***************************** -->
<?php
  $User_ID = $_SESSION["User_ID"];
  $stmt = $pdo->prepare("SELECT * FROM manage LEFT JOIN user ON manage.User_ID = user.User_ID ");
  $stmt->execute();
  while ($row = $stmt->fetch()) {
?>
<tr>
    <td><?=$row["User_ID"]?></td>
    <td><?=$row["Username"]?></td>
    <td><?=$row["Product_ID"]?></td>
    <td><?=$row["Status_Date"]?></td>
<tr>
<?php }
?>
</table>
<!-- ************************************* -->

<a href="../index.php">ย้อนกลับ</a>
</body>

</html>
<?php
}
else {
  echo "กรุณาเข้าสู่ผู้ดูแลระบบ";
  	//header("location: login.html");
}
?>
