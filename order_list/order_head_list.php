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
    <th>สถานะจ่ายเงิน</th>
    <th>รายละเอียดรายการ</th>
    <?php
        if($_SESSION["Username"]=='admin') {  //ถ้าเป็น admin มีเมนูแก้ไข status
    ?>
        <th>แก้ไขสถานะ</td>
    <?php } ?>
</tr>

<!-- **********************ดึงค่าของ order_head ***************************** -->
<?php
  $User_ID = $_SESSION["User_ID"];
  if($_SESSION["Username"]=='admin'){
      $stmt = $pdo->prepare("SELECT * FROM order_head order by o_id ");
  }
  else{
    $stmt = $pdo->prepare("SELECT * from order_head where User_ID=$User_ID ORDER BY o_id");
  }
  $stmt->execute();
  while ($row = $stmt->fetch()) {
?>
<tr>
    <td><?=$row["o_id"]?></td>
    <td><?=$row["o_dttm"]?></td>
    <td><?=$row["o_qty"]?></td>
    <td><?=$row["o_total"]?></td>
    <td><?php

                        $status=$row["o_status"]; // ลองเปลี่ยนตัวเลขตรงนี้นะครับ เพื่อทดสอบ if else ที่เราได้เขียนไว้
                        if($status==1){
                            echo "<font color='red'> รอตรวจสอบการชำระเงิน </font>";
                        }
                        elseif ($status==2) {
                        echo "<font color='green'> ชำระเงินถูกต้อง </font>";
                        }
                       /* elseif ($status==3) {
                        echo "<font color='blue'> รอชำระเงิน </font>";
                        }
                        else{
                            echo "<font color='orange'> ตรวจสอบการจัดส่งสินค้า </font>";
                            echo "<h1> รหัส EMS xxxx    </h1>";
                        } */
        ?>
    </td>
    <td><a href="order_detail_list.php?o_id=<?=$row["o_id"]?>">คลิก</a></td>
    <?php
         if($_SESSION["Username"]=='admin') {  //ถ้าเป็น admin มีเมนูแก้ไข status
    ?>
    <td>
      <form action="edit_status_order.php" method="post">
        <input type="hidden" name="o_id" id="o_id" value="<?=$row["o_id"]?>">
        <input type="submit" value="แก้ไข" class='btn btn-info btn-xs' />
      </form>
    </td>
    <?php } ?>
<tr>
<?php }
?>
</table>
<!-- ************************************* -->

<a href="../index.php">ย้อนกลับ</a>
</body>

</html>
