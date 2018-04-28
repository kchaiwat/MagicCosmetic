<?php include "../connect.inc" ?>
<?php
$Shipping_ID = $_POST['Shipping_ID'];
$sql	= "select * from shipping where Shipping_ID=$Shipping_ID";
$query	= mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);

?>
<html>
<head>
</head>
<body>
<form action="action_updateshipping.php" method="post">
  ค่าจัดส่ง <?=$row["Shipping_type"]?><br>
  <input type="hidden" name="Shipping_ID" value="<?=$row["Shipping_ID"]?>">
  <input type="text" name="cost" value="<?=$row["cost"]?>">
  <br>
  <input type="submit" value="แก้ไข">
</form>
</body>
</html>
