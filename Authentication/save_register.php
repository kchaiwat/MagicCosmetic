<?php include "../connect.php" ?>
<?php
  $stmt = $pdo->prepare("INSERT INTO user VALUES ('',?,?,?,?,?,?,?)");
    $stmt->bindParam(1, $_POST['Username']);
    $stmt->bindParam(2, password_hash($_POST['Password'],PASSWORD_DEFAULT));
    $stmt->bindParam(3, $_POST['User_fname']);
    $stmt->bindParam(4, $_POST['User_lname']);
    $stmt->bindParam(5, $_POST['User_add']);
    $stmt->bindParam(6, $_POST['User_email']);
    $stmt->bindParam(7, $_POST['User_tel']);
    $stmt->execute(); // เริ่มเพิ่มข้อมูล

    header("location: login.html");
?>
