<?php
	session_start();
    include("../connect.inc");
		if(!empty($_SESSION["Username"])){	// ถ้า เป็นสมาชิก
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Confirm</title>
</head>
<body>
<!--สร้างตัวแปรสำหรับบันทึกการสั่งซื้อ -->
<?php

	$fname = $_REQUEST["User_fname"];
  $lname = $_REQUEST["User_lname"];
	$address = $_REQUEST["User_add"];
	$email = $_REQUEST["User_email"];
	$phone = $_REQUEST["User_tel"];
	$total_qty = $_REQUEST["total_qty"];
	$total = $_REQUEST["total"];
	$dttm = Date("Y-m-d G:i:s");
	$User_ID = $_SESSION['User_ID'];
	$status = 1;


	//บันทึกการสั่งซื้อลงใน order_head
	mysqli_query($conn, "BEGIN");
	$sql1	= "insert into order_head values(null,'$User_ID', '$dttm', '$fname', '$lname', '$address', '$email', '$phone', '$total_qty', '$total','$status')";
	$query1	= mysqli_query($conn, $sql1);
	//ฟังก์ชั่น MAX() จะคืนค่าที่มากที่สุดในคอลัมน์ที่ระบุ ออกมา หรือจะพูดง่ายๆก็ว่า ใช้สำหรับหาค่าที่มากที่สุด นั่นเอง.
	$sql2 = "select max(o_id) as o_id from order_head where o_fname='$fname' and o_email='$email' and o_dttm='$dttm' ";
	$query2	= mysqli_query($conn, $sql2);
	$row = mysqli_fetch_array($query2);
	$o_id = $row["o_id"];
//PHP foreach() เป็นคำสั่งเพื่อนำข้อมูลออกมาจากตัวแปลที่เป็นประเภท array โดยสามารถเรียกค่าได้ทั้ง $key และ $value ของ array
	foreach($_SESSION['cart'] as $p_id=>$qty)
	{
		$sql3	= "select * from product where Product_ID=$p_id";
		$query3	= mysqli_query($conn, $sql3);
		$row3	= mysqli_fetch_array($query3);
		$total = $row3['Product_price']*$qty;
		$count = mysqli_num_rows($query3);
	//บันทึกการสั่งซื้อลงใน order_detail
		$sql4	= "insert into order_detail values(null, '$o_id', '$p_id', '$qty', '$total')";
		$query4	= mysqli_query($conn, $sql4);
		$quantity = $row3['Product_stock'];
		$a = $quantity-$qty;
		//ตัดสต๊อก
		if($a>0){ // เช็คว่ามีสินค้าเพียงพอ
		  for($i=0; $i<$count; $i++){
					  $have =  $row3['Product_stock'];
					  $stc = $have - $qty;
					  $sql9 = "UPDATE product SET Product_stock=$stc WHERE Product_ID=$p_id ";
					  $query9 = mysqli_query($conn, $sql9);
					  }
			/*   stock  */
	if($query1 && $query4){
		mysqli_query($conn, "COMMIT");
		$msg = "บันทึกข้อมูลเรียบร้อยแล้ว ";
		foreach($_SESSION['cart'] as $p_id)
		{
			//unset($_SESSION['cart'][$p_id]);
			unset($_SESSION['cart']);
		}
	}
	else{
		mysqli_query($conn, "ROLLBACK");
		$msg = "บันทึกข้อมูลไม่สำเร็จ กรุณาติดต่อเจ้าหน้าที่ค่ะ ";
	}

?>
<script type="text/javascript">
	alert("<?php echo $msg;?>");
	window.location ='../index.php';
</script>

<?php
} //ปิด ถ้ามีสินค้า
		else{ //ไม่มีสินค้า

				mysqli_query($conn, "ROLLBACK");
				$sql5	= "DELETE FROM `order_head` WHERE `order_head`.`o_id` = $o_id";
				$query5	= mysqli_query($conn, $sql5);
				/*
								$sql6	= "DELETE FROM `order_detail` WHERE `order_detail`.'o_id' = $o_id";
								$query6	= mysqli_query($conn, $sql6);
								*/
				?>

				<script type="text/javascript">
						alert("สินค้าในคลังไม่เพียงพอ โปรดติดต่อ ปลื้มปริ่มมมม");
					window.location ='../index.php';
					</script><?php
		}

	} //ปิด foreach
}			//ปิด ถ้า user มี
	else {
	echo "<script type='text/javascript'>alert('กรุณาเข้าสู่ระบบก่อนเลือกสินค้า');
	window.location='../Authentication/login.html';
	</script>";
	}
?>


</body>
</html>
