<?php
	session_start();
    include("../connect.inc");
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

//รับค่า User_ID จาก session
$User_ID = $_SESSION["User_ID"];
//รับค่าวันที่ ส่งไปที่ Order_Date
$Order_Date = Date("Y-m-d G:i:s");
//ตั้ง Status ให้เท่ากับ 1 คือยังไม่ยืนยัน ถ้าเป็น 0 จะเป็นการ ยืนยันแล้ว
$Status = 1;

//รับค่ามาจาก ฟอร์ม
$fname = $_REQUEST["User_fname"];
$lname = $_REQUEST["User_lname"];
$address = $_REQUEST["User_add"];
$email = $_REQUEST["User_email"];
$phone = $_REQUEST["User_tel"];
$total_qty = $_REQUEST["total_qty"];
$total = $_REQUEST["total"];


//บันทึกขึ้น order
mysqli_query($conn, "BEGIN");
$sql1	= "insert into order values(null, '$User_ID', '$Order_Date', '$Status')";
$query1	= mysqli_query($conn, $sql1);

//ฟังก์ชั่น MAX() จะคืนค่าที่มากที่สุดในคอลัมน์ที่ระบุ ออกมา หรือจะพูดง่ายๆก็ว่า ใช้สำหรับหาค่าที่มากที่สุด นั่นเอง.
$sql2 = "select max(Order_ID) as Order_ID from order where User_ID='$User_ID' and Order_Date='$Order_Date' ";
$query2	= mysqli_query($conn, $sql2);
$row = mysqli_fetch_array($query2);
$Order_ID = $row["Order_ID"];


//PHP foreach() เป็นคำสั่งเพื่อนำข้อมูลออกมาจากตัวแปลที่เป็นประเภท array โดยสามารถเรียกค่าได้ทั้ง $key และ $value ของ array
	foreach($_SESSION['cart'] as $p_id=>$qty)
	{
		$sql3	= "select * from product where Product_ID=$p_id";
		$query3	= mysqli_query($conn, $sql3);
		$row3	= mysqli_fetch_array($query3);
		$total	= $row3['Product_price']*$qty;
    //บันทึกการสั่งซื้อลงใน order_detail
      $sql4	= "insert into order_detail values(null, '$Order_ID', '$p_id', '$qty', '$total')";
      $query4	= mysqli_query($conn, $sql4);
    }

    if($query1 && $query4){
  		mysqli_query($conn, "COMMIT");
  		$msg = "บันทึกข้อมูลเรียบร้อยแล้ว ";
  		foreach($_SESSION['cart'] as $p_id)
  		{
  			//unset($_SESSION['cart'][$p_id]);
  			unset($_SESSION['cart']);
  		}
  	}
  	//else{
  		//mysqli_query($conn, "ROLLBACK");
  	//	$msg = "บันทึกข้อมูลไม่สำเร็จ กรุณาติดต่อเจ้าหน้าที่ค่ะ ";
  	//}
  ?>
  <script type="text/javascript">
  	alert("<?php echo $msg;?>");
  	window.location ='product.php';
  </script>

  </body>
  </html>
