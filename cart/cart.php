<?php
session_start();

error_reporting( error_reporting() & ~E_NOTICE );

	$p_id = $_REQUEST['Product_ID'];
	$act = $_REQUEST['act'];

	if($act=='add' && !empty($p_id))
	{
		if(isset($_SESSION['cart'][$p_id]))
		{
			$_SESSION['cart'][$p_id]++;
		}
		else
		{
			$_SESSION['cart'][$p_id]=1;
		}
	}

	if($act=='remove' && !empty($p_id))  //ยกเลิกการสั่งซื้อ
	{
		unset($_SESSION['cart'][$p_id]);
	}

	if($act=='update')
	{
		$amount_array = $_POST['amount'];
		foreach($amount_array as $p_id=>$amount)
		{
			$_SESSION['cart'][$p_id]=$amount;
		}
	}
?>

<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8" />
<script>
                    function confirmDelete(o_id) {
                            var ans = confirm("Do you want to delete the item? " + o_id);
                            if (ans==true)
                            document.location = "delete_order.php?o_id=" + o_id;
                    }
                    </script>
                    <style>
                        .custab{
                            border: 1px solid #ccc;
                            padding: 5px;
                            margin: 5% 0;
                            box-shadow: 3px 3px 2px #ccc;
                            transition: 0.5s;
                            }
                        .custab:hover{
                            box-shadow: 3px 3px 0px transparent;
                            transition: 0.5s;
                            }
                </style>
<title>Shopping Cart</title>
</head>

<body class="Athiti">
<div class="container">
	<div>

<form id="frmcart" name="frmcart" method="post" action="?act=update">
  <table class="table table-striped custab jumbotron" style="background-color: white">
    <tr>
      <td align="center" colspan="5" ><b>ตะกร้าสินค้า</b></td>
    </tr>
    <tr>
      <td >สินค้า</td>
      <td >ราคา</td>
      <td >จำนวน</td>
      <td >รวม(บาท)</td>
      <td >ลบ</td>
    </tr>




   <!-- ************************************************************************ -->
<?php
$total=0;
if(!empty($_SESSION['cart']))
{
	include("../connect.inc");
	foreach($_SESSION['cart'] as $p_id=>$qty)
	{
		$sql = "select * from product where Product_ID=$p_id";
		$query = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($query);
		$sum = $row['Product_price'] * $qty;
		$total += $sum;

//ส่วนลด
	//	include('discount.php');

		echo "<tr>";
		echo "<td width='334'>" . $row["Product_name"] . "</td>";
		echo "<td width='46' align='right'>" .number_format($row["Product_price"],2) . "</td>";
		echo "<td width='57' align='right'>";

		echo "<input type='text' name='amount[$p_id]' value='$qty' size='2' /></td>";


		echo "<td width='93' align='right'>".number_format($sum,2)."</td>";
		//remove product
		echo "<td width='46' align='center'><a href='cart.php?Product_ID=$p_id&act=remove'>ลบ</a></td>";
		echo "</tr>";
	}

	/*
		echo "<tr>";
			echo "<td colspan='3' bgcolor='#F9D5E3' align='center'><b>(สมาชิก)  ส่วนลด 10%</b></td>";
			echo "<td align='right' bgcolor='#F9D5E3'>"."<b>".number_format($discount,2)."</b>"."</td>";
			echo "<td align='left' bgcolor='#F9D5E3'></td>";
			echo "</tr>";
	*/

	echo "<tr>";
  	echo "<td colspan='3' bgcolor='#CEE7FF' align='center'><b>ราคารวม</b></td>";
  	echo "<td align='right' bgcolor='#CEE7FF'>"."<b>".number_format($total,2)."</b>"."</td>";
  	echo "<td align='left' bgcolor='#CEE7FF'></td>";
	echo "</tr>";

}
?>
<tr>
<td><a href="../index.php" class='btn btn-danger btn-xs'><span class="glyphicon glyphicon-edit"></span>กลับหน้ารายการสินค้า</a></td>
<td colspan="4" align="right">
    <input type="submit" name="button" id="button" class='btn btn-info btn-xs' value="คำนวนสินค้าใหม่" />
    <input type="button" name="Submit2" value="สั่งซื้อ" class='btn btn-info btn-xs' onclick="window.location='confirm.php';" />
</td>
</tr>
</table>
</form>

</div>
    </div>
</body>
</html>
