<?php include "../connect.inc" ?>
<?php
$Order_ID = $_GET['Order_ID'];
$sql1 = "SELECT * FROM order_detail LEFT JOIN product ON order_detail.Product_ID = product.Product_ID where Order_ID=$Order_ID";
$query1 = mysqli_query($conn, $sql1);
$row = mysqli_fetch_array($query1);
	$Product_ID = $row['Product_ID'];
	$sql3	= "select * from product where Product_ID=$Product_ID";
	$query3	= mysqli_query($conn, $sql3);
	$row3	= mysqli_fetch_array($query3);
					$count2 = mysqli_num_rows($query3);
								for($i=0; $i<$count2; $i++){
									$Product_ID = $row["Product_ID"];
									$add_stock = $row["Product_stock"] + $row["Detail_qty"];
									$add_sold = $row["Product_sold"] - $row["Detail_qty"];
									$sql2	= "UPDATE product set Product_stock=$add_stock,Product_sold=$add_sold where Product_ID=$Product_ID";
									$query2	= mysqli_query($conn, $sql2);
								}
$sql	= "DELETE `order_detail`,`order_head` FROM `order_detail` INNER JOIN `order_head` WHERE `order_detail`.`Order_ID` = `order_head`.`Order_ID` AND `order_detail`.`Order_ID` = $Order_ID";
$query	= mysqli_query($conn, $sql);
if($query){
	header("location: order_head_list.php");
}

?>
