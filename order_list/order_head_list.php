<?php include "../connect.php" ?>
<?php session_start(); ?>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
  <!--
  <th>ชื่อ</th>
  <th>นามสกุล</th>
  <th>ที่อยู่</th>
  <th>อีเมล์</th>
  <th>เบอร์โทรศัพท์</th>    -->

<table border="1">
<tr>
    <th>รหัสรายการสั่งซื้อ</th>
    <th>วันที่ เวลา</th>
    <th>จำนวน</th>
    <th>ราคาทั้งหมด</th>
    <th>รายละเอียดรายการ</th>
</tr>

<!-- **********************ดึงค่าของ order_head ***************************** -->
<?php
  $User_ID = $_SESSION["User_ID"];
  $stmt = $pdo->prepare("SELECT * from order_head where User_ID=$User_ID ORDER BY o_id");
  $stmt->execute();
  while ($row = $stmt->fetch()) {
?>
<tr>
    <td><?=$row["o_id"]?></td>
    <td><?=$row["o_dttm"]?></td>
    <td><?=$row["o_qty"]?></td>
    <td><?=$row["o_total"]?></td>
    <td><a href="order_detail_list.php?o_id=<?=$row["o_id"]?>">คลิก</a></td>
<tr>
</table>
<?php }
?>
<!-- ************************************* -->

<a href="../index.php">ย้อนกลับ</a>
</body>

</html>
