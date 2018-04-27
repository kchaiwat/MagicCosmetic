<?php include "../connect.php" ?>
<?php
session_start();
$stmt = $pdo->prepare("SELECT * FROM order_head WHERE Order_ID= ? ");
$stmt->bindParam(1, $_POST["Order_ID"]);
$stmt->execute();
$row = $stmt->fetch();
 ?>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
  <?php if($_SESSION["Username"]=='admin') { ?>
        <h1 class="display-3"> แก้ไขสถานะ | Edit Order</h1>



                        <form action="action_update_status.php" method="post" >
                                     <input type="hidden" name="Order_ID" id="Order_ID"  value="<?=$row["Order_ID"]?>">
                                        <input type="hidden" name="Order_dttm" id="Order_dttm" value="<?=$row["Order_dttm"]?>">
                                        <input type="hidden" name="Order_name" id="Order_name" value="<?=$row["Order_name"]?>">
                                        <input type="hidden" name="Order_lastname" id="Order_lastname" value="<?=$row["Order_lastname"]?>">
                                        <input type="hidden" name="Order_addr" id="Order_addr" value="<?=$row["Order_addr"]?>">
                                        <input type="hidden" name="Order_district" id="Order_district" value="<?=$row["Order_district"]?>">
                                        <input type="hidden" name="Order_province" id="Order_province" value="<?=$row["Order_province"]?>">
                                        <input type="hidden" name="Order_email" id="Order_email" value="<?=$row["Order_email"]?>">
                                        <input type="hidden" name="Order_phone" id="Order_phone" value="<?=$row["Order_phone"]?>">
                                        <input type="hidden" name="Order_qty" id="Order_qty" value="<?=$row["Order_qty"]?>">
                                        <input type="hidden" name="Order_total" id="Order_total" value="<?=$row["Order_total"]?>">

                                                รายการที่  : <?=$_POST["Order_ID"]?><br>
                                                <td><?=$row["Order_dttm"]?></td><br>
                                                ชื่อ :
                                                <td><?=$row["Order_fname"]?></td  >
                                                <td><?=$row["Order_lname"]?></td> <br>
                                                <td>ที่อยู่ : <?=$row["Order_addr"]?></td><br><br>
                                                สถานะชำระเงิน :<br>
                                                        <input type="radio" value=1 name="Order_status" id="Order_status">รอตรวจสอบการชำระเงิน <br>
                                                        <input type="radio" value=2 name="Order_status" id="Order_status">ยืนยันการชำระเงิน<br>
                                                <br>
                                                  <input type="submit" value="ยืนยัน">

                       </form>
<?php
}
else {
  echo "กรุณาเข้าสู่ผู้ดูแลระบบ";
  //header("location: login.html");
 }
 ?>
</body>
 </html>
