

<?php include "../connect.php" ?>
<?php
$stmt = $pdo->prepare("SELECT * FROM order_head WHERE o_id= ? ");
$stmt->bindParam(1, $_POST["o_id"]);
$stmt->execute();
$row = $stmt->fetch();
 ?>
<html>
<head>
<meta charset="utf-8">
</head>
<body>

        <h1 class="display-3"> แก้ไขสถานะ | Edit Order</h1>



                        <form action="action_update_status.php" method="post" >
                                     <input type="hidden" name="o_id" id="o_id"  value="<?=$row["o_id"]?>">
                                        <input type="hidden" name="o_dttm" id="o_dttm" value="<?=$row["o_dttm"]?>">
                                        <input type="hidden" name="o_name" id="o_name" value="<?=$row["o_name"]?>">
                                        <input type="hidden" name="o_lastname" id="o_lastname" value="<?=$row["o_lastname"]?>">
                                        <input type="hidden" name="o_addr" id="o_addr" value="<?=$row["o_addr"]?>">
                                        <input type="hidden" name="o_district" id="o_district" value="<?=$row["o_district"]?>">
                                        <input type="hidden" name="o_province" id="o_province" value="<?=$row["o_province"]?>">
                                        <input type="hidden" name="o_email" id="o_email" value="<?=$row["o_email"]?>">
                                        <input type="hidden" name="o_phone" id="o_phone" value="<?=$row["o_phone"]?>">
                                        <input type="hidden" name="o_qty" id="o_qty" value="<?=$row["o_qty"]?>">
                                        <input type="hidden" name="o_total" id="o_total" value="<?=$row["o_total"]?>">

                                                รายการที่  : <?=$_POST["o_id"]?><br>
                                                <td><?=$row["o_dttm"]?></td><br>
                                                ชื่อ :
                                                <td><?=$row["o_fname"]?></td  >
                                                <td><?=$row["o_lname"]?></td> <br>
                                                <td>ที่อยู่ : <?=$row["o_addr"]?></td><br><br>
                                                สถานะชำระเงิน :<br>
                                                        <input type="radio" value=1 name="o_status" id="o_status">รอตรวจสอบการชำระเงิน <br>
                                                        <input type="radio" value=2 name="o_status" id="o_status">ยืนยันการชำระเงิน<br>
                                                <br>
                                                  <input type="submit" value="ยืนยัน">

                       </form>

</body>
 </html>
