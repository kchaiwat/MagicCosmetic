<?php include "../connect.php" ?>
<?php session_start(); ?>
<html>
<head>
<meta charset="utf-8">

                        <script>
                        function confirmDelete(Product_ID) {
                        var ans = confirm("Do you want to delete the item? " + Product_ID);
                        if (ans==true)
                        document.location = "action_deleteproduct.php?Product_ID=" + Product_ID;
                        }
                        </script>
                        </head>
    <body >

          <?php if($_SESSION["Username"]=='admin') { ?>
<!-- ********************************************************************************************** -->
                         <a href="form_add_product.html" >เพิ่มสินค้า</a>

                        <table border="1">

                             <tr>
                                <th>ID</th>
                                <th>NAME</th>
                                <th>TYPE</th>
                                <th>PIRCE</th>
                                <th>PICTUER</th>
                                <th>EDIT</th>
                            </tr>
<!-- ********************************************************************************************** -->
                                        <?php
                                        $stmt = $pdo->prepare("SELECT product.Product_ID , product.Product_name, product_type.ProType_name , product.Product_price, product.Product_pic FROM product JOIN product_type ON product.ProType_ID = product_type.ProType_ID ORDER BY Product_ID ");

                                        $stmt->execute();

                                        while ($row = $stmt->fetch()) {

                                        ?>
<!-- ********************************************************************************************** -->

                                <tr>
                                    <td><?=$row["Product_ID"]?></td>
                                    <td><?=$row["Product_name"]?></td>
                                    <td><?=$row["ProType_name"]?></td>
                                    <td><?=$row["Product_price"]?></td>
                                    <td><img src='pic_product/<?=$row["Product_pic"]?>' width='200'></td>
                                    <td >

                                      <form method="post" action="form_update_product.php" >
                                        <input type="hidden" value="<?=$row["Product_ID"]?>" name="Product_ID">
                                        <input type="submit" value="แก้ไข">
                                      </form>

                                            <a href="#" onclick='confirmDelete(<?=$row["Product_ID"]?>);' >
                                             ลบ</a>
                                     </td>
                                </tr>
                                <?php
                                }
                                ?>

<!-- ********************************************************************************************** -->
<?php
}
else {
  echo "กรุณาเข้าสู่ผู้ดูแลระบบ";
  	//header("location: login.html");
}
?>
<!-- ********************************************************************************************** -->
    </table>

</body>
</html>
