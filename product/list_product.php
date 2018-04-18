<?php include "../connect.php" ?>
<html>
<head>
<meta charset="utf-8">

                        <script>
                        function confirmDelete(p_id) {
                        var ans = confirm("Do you want to delete the item? " + p_id);
                        if (ans==true)
                        document.location = "action_deleteproduct.php?p_id=" + p_id;
                        }
                        </script>
                        </head>
    <body >
                        <!-- ********************************************************************************************** -->



                         <a href="form_add_product.html" >เพิ่มสินค้า</a>

                        <table border="1">

                             <tr>
                                <th>ID</th>
                                <th>NAME</th>
                                <th>TYPE</th>
                                <th>PIRCE</th>
                                <th>SALE</th>
                                <th>DATE</th>
                                <th>PICTUER</th>
                                <th>EDIT</th>

                            </tr>


<!-- ********************************************************************************************** -->
                                        <?php
                                        $stmt = $pdo->prepare("SELECT clean_product.p_id , clean_product.p_name, product_type.t_name , clean_product.p_price,  clean_product.p_sale,  clean_product.p_date,  clean_product.p_pic FROM clean_product JOIN product_type ON clean_product.t_id = product_type.t_id ORDER BY p_id ");

                                        $stmt->execute();

                                        while ($row = $stmt->fetch()) {



                                        ?>
<!-- ********************************************************************************************** -->

                                <tr>
                                    <td><?=$row["p_id"]?></td>
                                    <td><?=$row["p_name"]?></td>
                                    <td><?=$row["t_name"]?></td>
                                    <td><?=$row["p_price"]?></td>
                                    <td><?=$row["p_sale"]?></td>
                                    <td><?=$row["p_date"]?></td>
                                    <td><img src='pic_product/<?=$row["p_pic"]?>' width='200'></td>
                                    <td >
                                            <a href="form_update_product.php?p_id=<?=$row["p_id"]?>" >

                                             Edit</a>|

                                            <a href="#" onclick='confirmDelete(<?=$row["p_id"]?>);' >

                                             Del</a>
                                     </td>
                                </tr>

<!-- ********************************************************************************************** -->
<?php
}
?>
<!-- ********************************************************************************************** -->
    </table>

</body>
</html>
