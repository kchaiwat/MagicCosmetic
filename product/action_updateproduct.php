<?php include "../connect.php" ?>
<?php
$stmt = $pdo->prepare("UPDATE clean_product SET p_name=?, t_id=?,p_price=?,p_sale=?, p_date=?, p_pic=? WHERE p_id=?");
$stmt->bindParam(1, $_POST["p_name"]);
$stmt->bindParam(2, $_POST["t_id"]);
$stmt->bindParam(3, $_POST["p_price"]);
$stmt->bindParam(4, $_POST["p_sale"]);
$stmt->bindParam(5, $_POST["p_date"]);

$path = pathinfo(basename($_FILES['p_pic']['name']),PATHINFO_EXTENSION);

	if ($path=="png" or $path=="jpg" or $path=="jpeg") {
	$new_pic_name = 'pvr_'.uniqid().".".$path;
	$pic_folder_path = "pic_product/";
	$upload_path = $pic_folder_path.$new_pic_name ;
	//uploading
	$success = move_uploaded_file($_FILES['p_pic']['tmp_name'],$upload_path);
 	if($success==FALSE){
 		echo "upload is FALSE";
 		exit();
 	}
}else{
	echo "please upload photo again";
	exit();
}

$_POST["p_pic"] = $new_pic_name;


$stmt->bindParam(6, $_POST["p_pic"]);
$stmt->bindParam(7, $_POST["p_id"]);


if($stmt->execute())
header("location: list_product.php");

?>
