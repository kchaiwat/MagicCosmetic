<?php
if(!empty($_SESSION['Username'])){
  $discount = $total * 0.10;  //แก้ไขส่วนลดตรงนี้
  $discounted = $total - $discount;
}
else{
  $discount = $total * 0;
  $discounted = $total - $discount;
}
?>
