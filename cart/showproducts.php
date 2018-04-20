<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Product List</title>

</head>

<body>
<table width="600" border="1" align="center" bordercolor="#666666">
  <tr>
    <td width="91" align="center" bgcolor="#CCCCCC"><strong>ภาพ</strong></td>
    <td width="200" align="center" bgcolor="#CCCCCC"><strong>ชื่อสินค้า</strong></td>
    <td width="44" align="center" bgcolor="#CCCCCC"><strong>ราคา</strong></td>
    <td width="100" align="center" bgcolor="#CCCCCC"><strong>รายละเอียดสินค้า</strong></td>
  </tr>


  <?php
  //connect db
  include("connect.inc");
  $sql = "select * from product order by Product_ID";  //เรียกข้อมูลมาแสดงทั้งหมด
  $result = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_array($result))
  {
  	echo "<tr>";
	echo "<td align='center'><img src='product/pic_product/" . $row["p_pic"] ." ' width='80'></td>";
	echo "<td align='left'>" . $row["Product_name"] . "</td>";
    echo "<td align='center'>" .number_format($row["Product_price"],2). "</td>";
    echo "<td align='center'><a href='cart\product_detail.php?Product_ID=$row[Product_ID]'>คลิก</a></td>";
	echo "</tr>";
  }
  ?>
</table>
