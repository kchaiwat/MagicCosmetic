<?php
	session_start();
    include("../connect.inc");
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Checkout</title>
</head>
<body>
<form id="frmcart" name="frmcart" method="post" action="saveorder.php">
  <table width="600" border="0" align="center" class="square">
    <tr>
      <td width="1558" colspan="4" bgcolor="#FFDDBB">
      <strong>สั่งซื้อสินค้า</strong></td>
    </tr>
    <tr>
      <td bgcolor="#F9D5E3">สินค้า</td>
      <td align="center" bgcolor="#F9D5E3">ราคา</td>
      <td align="center" bgcolor="#F9D5E3">จำนวน</td>
      <td align="center" bgcolor="#F9D5E3">รวม/รายการ</td>
    </tr>
<?php
	$total=0;
	$total_qty = 0;
	foreach($_SESSION['cart'] as $p_id=>$qty)
	{
		$sql	= "select * from product where Product_ID=$p_id";
		$query	= mysqli_query($conn, $sql);
		$row	= mysqli_fetch_array($query);
		$sum	= $row['Product_price']*$qty;
		$total	+= $sum;
		$total_qty += $qty;

    echo "<tr>";
    echo "<td>" . $row["Product_name"] . "</td>";
    echo "<td align='right'>" .number_format($row['Product_price'],2) ."</td>";
    echo "<td align='right'>$qty</td>";
    echo "<td align='right'>".number_format($sum,2)."</td>";
    echo "</tr>";
	}
	echo "<tr>";
    echo "<td  align='right' colspan='3' bgcolor='#F9D5E3'><b>รวม</b></td>";
    echo "<td align='right' bgcolor='#F9D5E3'>"."<b>".number_format($total,2)."</b>"."</td>";
    echo "</tr>";
?>


<!-- hide -->

<input name="total" type="hidden" value="<?php echo $total;?>"/>
<input name="total_qty" type="hidden"  value="<?php echo $total_qty;?>"/>

<!-- hide -->





</table>
<p>
<table border="0" cellspacing="0" align="center">
<tr>
	<td colspan="2" bgcolor="#CCCCCC">รายละเอียดในการติดต่อ</td>
</tr>
<tr>
    <td bgcolor="#EEEEEE">ชื่อ</td>
    <td><input name="User_fname" type="text" id="User_fname" value="<?=$_SESSION["User_fname"]?>" required/></td>
</tr>
<tr>
    <td bgcolor="#EEEEEE">นามสกุล</td>
    <td><input name="User_lname" type="text" id="User_lname" value="<?=$_SESSION["User_lname"]?>" required/></td>
</tr>
<tr>
    <td width="22%" bgcolor="#EEEEEE">ที่อยู่</td>
    <td width="78%">
    <textarea name="User_add" cols="35" rows="5" id="User_add" required><?=$_SESSION["User_add"]?></textarea>
    </td>
</tr>
<tr>
  	<td bgcolor="#EEEEEE">อีเมล</td>
  	<td><input name="User_email" type="email" id="User_email" value="<?=$_SESSION["User_email"]?>" required/></td>
</tr>
<tr>
  	<td bgcolor="#EEEEEE">เบอร์ติดต่อ</td>
  	<td><input name="User_tel" type="text" id="User_tel" value="<?=$_SESSION["User_tel"]?>" required /></td>
</tr>
<tr>
	<td colspan="2" align="center" bgcolor="#CCCCCC">
	<input type="submit" name="Submit2" value="สั่งซื้อ" />
</td>
</tr>
</table>
</form>


</body>
</html>
