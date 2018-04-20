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
        <?php
         if($_SESSION["Username"]=='admin') {
              include('menu_admin.php');
            }
        include('menu_user.php');
                    }
                    if(empty($_SESSION["Username"])){
                    echo 'เข้าสู่ระบบ';
                  }
                  ?>
        </a>

<!-- menu page -->
    <?php
      include('menu_page.php');
    ?>
<!-- end menu page -->
<!-- show product -->
<?php
  include('cart/showproducts.php')
?>
<!-- end show product -->
  </body>
</html>
