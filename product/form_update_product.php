<?php include "../connect.php" ?>
<?php session_start(); ?>
<?php
$stmt = $pdo->prepare("SELECT * FROM product WHERE Product_ID = ?");
$stmt->bindParam(1, $_POST["Product_ID"]);
$stmt->execute();
$row = $stmt->fetch();
 ?>
<html>
<head>
<meta charset="utf-8">
</head>
<body>

<?php if($_SESSION["Username"]=='admin') { ?>
      <form action="action_updateproduct.php" method="post">
      <input type="hidden" name="Product_ID" value="<?=$row["Product_ID"]?>">
      ชื่อสินค้า : <input type="text" name="Product_name" id="Product_name" value="<?=$row["Product_name"]?>"><br>
      ประเภทสินค้า : <br>
            <input type="radio" value=1 name="ProType_ID" id="ProType_ID" required >ประเภทสินค้า 1 <br>
      			<input type="radio" value=2 name="ProType_ID" id="ProType_ID" required>ประเภทสินค้า 2 <br>
      			<input type="radio" value=3 name="ProType_ID" id="ProType_ID" required>ประเภทสินค้า 3<br>
      รายละเอียดสินค้า : <br><textarea type="text" name="Product_detail" id="Product_detail"><?=$row["Product_detail"]?></textarea> <br>
      ราคาสินค้า : <input type="number" name="Product_price" id="Product_price" value="<?=$row["Product_price"]?>"><br>
      จำนวนคงคลัง : <input type="number" name="Product_stock" id="Product_stock" value="<?=$row["Product_stock"]?>"><br>

      <br>
      <input type="submit" value="แก้ไขสินค้า">
    </form>
    <form action="action_updatepic.php" method="post" enctype="multipart/form-data">
      <input type="hidden" name="Product_ID" value="<?=$row["Product_ID"]?>">
      <img src='pic_product/<?=$row["Product_pic"]?>' width='200'> <br>
      เปลี่ยนรูปใหม่ : <input type="file" name="Product_pic" id="Product_pic" required ><br>

      <input type="submit" value="แก้ไขรูป">
    </form>
<?php
}
else {
  echo "กรุณาเข้าสู่ผู้ดูแลระบบ";
  	//header("location: login.html");
}
?>

</body> </html>
