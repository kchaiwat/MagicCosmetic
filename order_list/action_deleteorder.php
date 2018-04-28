<?php include "../connect.inc" ?>
<?php
$Order_ID = $_GET['Order_ID'];
$sql	= "DELETE `order_detail`,`order_head` FROM `order_detail` INNER JOIN `order_head` WHERE `order_detail`.`Order_ID` = `order_head`.`Order_ID` AND `order_detail`.`Order_ID` = $Order_ID";
$query	= mysqli_query($conn, $sql);
if($query){
	header("location: order_head_list.php");
}
?>
