<?php include "../connect.inc" ?>
<?php
$sql	= "select * from shipping";
$query	= mysqli_query($conn, $sql);
?>
<html>
<head>
</head>
<body>
  <table border="1">
    <tr>
       <th>ID</th>
       <th>รูปแบบการจัดส่ง</th>
       <th>ค่าจัดส่ง</th>
       <th>แก้ไขค่าจัดส่ง</th>
   </tr>
    <?php
    while($row = mysqli_fetch_array($query)){
     ?>
<tr>
  <td><?=$row["Shipping_ID"]?></td>
  <td><?=$row["Shipping_type"]?></td>
  <td><?=$row["cost"]?></td>
  <td>
    <form action="edit_shipping.php" method="POST">
      <input type="hidden" name="Shipping_ID" value="<?=$row["Shipping_ID"]?>">
      <input type="submit" value="แก้ไข">
    </form>
  </td>
</tr>
  <?php
    }
    ?>
  </table>
</body>
</html>
