<?php include "connect.php" ?>
<?php session_start(); ?>

<html>
  <head>
    <meta charset="utf-8">
  </head>
  <body>

    <a href="<?php
    if(!empty($_SESSION["username"])){ echo'#'; }
    if(empty($_SESSION["username"])){echo'Authentication\login.html';}
    ?>">
      <?php
      if(!empty($_SESSION["Username"])){
      echo $_SESSION["Username"];
      ?>
        <?php if($_SESSION["Username"]=='admin') { ?>
          <br>
          <a href="">รายการสมาชิก</a><br>
          <a href="">รายการสินค้า</a><br>
          <a href="">รายการสั่งซื้อ</a><br>
          <?php
        }?>
        <a href="Authentication\edit_user.php?User_ID=<?=$_SESSION['User_ID']?>">แก้ไขข้อมูลส่วนตัว</a><br>

        <a href="Authentication\logout.php" class="list-group-item">ออกจากระบบ</a><br>
                    <?php
                    }
                    if(empty($_SESSION["Username"])){
                    echo 'เข้าสู่ระบบ';
                  }
                  ?>
        </a>


      <br>
      <a href="">สินค้าที่ 1</a><br>
      <a href="">สินค้าที่ 2</a><br>
      <a href="">สินค้าที่ 3</a><br>
      <a href="">สินค้าที่ 4</a><br>
  </body>
</html>
