<?php
include "../connect.php";
session_start();
 ?>
<?php
if($_SESSION["Username"]=='admin') {
$stmt = $pdo->prepare("UPDATE order_head SET Order_status=? WHERE Order_ID=?");
$stmt->bindParam(1, $_POST["Order_status"]);
$stmt->bindParam(2, $_POST["Order_ID"]);
if($stmt->execute())
header("location: order_head_list.php");
}
else {
  echo "กรุณาเข้าสู่ผู้ดูแลระบบ";
  //header("location: login.html");
 }
?>
