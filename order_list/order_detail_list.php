<?php include "../connect.php" ?>
<?php session_start(); ?>
<html>
<head>
<meta charset="utf-8">
</head>
<body>

<!-- ************** ดึงค่า order_detail มาแสดง โดยการ join กับ product **************** -->
  <h3>รายการสินค้าที่สั่งซื้อ</h3>
  <table border="1">
  <tr>
      <th>รหัสสินค้า</th>
      <th>ชื่อสินค้า</th>
      <th>จำนวน</th>
      <th>ราคา</th>
  </tr>
  <?php
    $Order_ID = $_GET['Order_ID'];
    $stmt = $pdo->prepare("SELECT * FROM order_detail LEFT JOIN product ON order_detail.Product_ID = product.Product_ID where Order_ID=$Order_ID ");
    //$stmt = $pdo->prepare("SELECT * FROM product LEFT JOIN order_detail ON product.Product_ID = order_detail.Product_ID ");
    //$stmt = $pdo->prepare("SELECT product.Product_name, order_detail.Detail_qty, order_detail.Detail_subtotal FROM order, product WHERE order.Product_ID = product.Product_ID");
    $stmt->execute();
    while ($row = $stmt->fetch()) {
  ?>
  <tr>
      <td><?=$row["Product_ID"]?></td>
      <td><?=$row["Product_name"]?></td>
      <td><?=$row["Detail_qty"]?></td>
      <td><?=$row["Detail_subtotal"]?></td>
  <tr>
  <?php }
  ?>
<!-- ************************************* -->
<!-- **********************ดึงค่าของ order_head เพื่อดึงค่าที่ รายการที่อยู่จัดส่ง ***************************** -->
<table border="1">
<tr>
    <th>ชื่อ</th>
    <th>นามสกุล</th>
    <th>ที่อยู่</th>
    <th>อีเมลล์</th>
    <th>เบอร์โทรศัพท์</th>
</tr>
<?php
  $Order_ID = $_GET['Order_ID'];
  $stmt = $pdo->prepare("SELECT * from order_head where Order_ID=$Order_ID ORDER BY $Order_ID ");
  $stmt->execute();
  while ($row = $stmt->fetch()) {
?>
<tr>
<h3>  ที่อยู่ในการจัดส่ง ของ รหัสรายการที่ <?php echo $Order_ID;?> </h3>
    <td><?=$row["o_fname"]?></td>
    <td><?=$row["o_lname"]?></td>
    <td><?=$row["o_addr"]?></td>
    <td><?=$row["o_email"]?></td>
    <td><?=$row["o_phone"]?></td>
<tr>
<?php }
?>
<!-- ************************************* -->
</table>
<a href="order_head_list.php">ย้อนกลับ</a>
</body>

</html>
