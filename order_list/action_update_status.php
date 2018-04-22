<?php include "../connect.php" ?>
<?php
$stmt = $pdo->prepare("UPDATE order_head SET o_status=? WHERE o_id=?");
$stmt->bindParam(1, $_POST["o_status"]);
$stmt->bindParam(2, $_POST["o_id"]);
if($stmt->execute())
header("location: order_head_list.php");
?>
