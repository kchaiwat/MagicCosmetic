<?php include "../connect.php" ?> 
<?php
$stmt = $pdo->prepare("SELECT * FROM clean_product WHERE p_id = ?");
$stmt->bindParam(1, $_GET["p_id"]);
$stmt->execute();
$row = $stmt->fetch();
 ?>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
<form action="action_updateproduct.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="p_id" value="<?=$row["p_id"]?>">
ชื่อสินค้า : <input type="text" name="p_name" id="p_name" value="<?=$row["p_name"]?>"><br>
ประเภทสินค้า : <input type="radio" value=1 name="t_id" id="t_id">ผลิตภัณฑ์ทำความสะอาด <br>
			<input type="radio" value=2 name="t_id" id="t_id">อุปกรณ์ทำความสะอาด <br>
			<input type="radio" value=3 name="t_id" id="t_id">เครื่องมือทำความสะอาด <br>
ราคาสินค้า : <input type="number" name="p_price" id="p_price" value="<?=$row["p_price"]?>"><br>
ส่วนลด : <input type="number" name="p_sale" id="p_sale" value="<?=$row["p_sale"]?>">%<br>
วันที่อัปเดตสินค้า : <input type="date" name="p_date" id="p_date" value="<?=$row["p_date"]?>"><br>
<img src='pic_product/<?=$row["p_pic"]?>' width='200'> <br>
เปลี่ยนรูปใหม่ : <input type="file" name="p_pic" id="p_pic" ><br>

<br>
<input type="submit" value="แก้ไขสินค้า"> </form>
</body> </html>
