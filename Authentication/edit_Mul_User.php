<?php include "../connect.php"?>
<?php session_start(); ?>
<?php

$stmt = $pdo->prepare("SELECT * FROM user WHERE User_ID = ?");
$stmt->bindParam(1, $_POST["User_ID"]);
$stmt->execute();
$row = $stmt->fetch();
?>

<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <script>
    var xmlHttp;
    function checkUsername() {
    //document.getElementById("username").className = "thinking";
    xmlHttp = new XMLHttpRequest();
    xmlHttp.onreadystatechange = showUsernameStatus;
    var username = document.getElementById("Username").value;
    var url = "checkName.php?Username=" + Username;
    xmlHttp.open("GET", url);
    xmlHttp.send();
    }

    function showUsernameStatus() {
      if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
        if (xmlHttp.responseText == "okay") {
          document.getElementById('message1').style.color = 'green';
            document.getElementById('message1').innerHTML = 'Can use this username';
        }
        else {
          document.getElementById("Username").focus();
          document.getElementById("Username").select();
          document.getElementById('message1').style.color = 'red';
            document.getElementById('message1').innerHTML = 'This username is already taken';
        }
      }
    }


    var check = function() {
     if (document.getElementById('Password').value == document.getElementById('conpassword').value) {
         document.getElementById('message').style.color = 'green';
         document.getElementById('message').innerHTML = 'matching';
       } else {
         document.getElementById('message').style.color = 'red';
         document.getElementById('message').innerHTML = 'not matching';
       }
    }
  </script>
</head>
<body>
  <h1>แก้ไขข้อมูลส่วนตัว</h1>
  <form method="post" action="update_user.php">
          <input type="hidden" id="User_ID" name="User_ID" value="<?=$row["User_ID"]?>">
          <label for="inputUsername"><?=$row["Username"]?></label><br>
          <label for="inputPassword4">Password</label><br>
          <input type="password"  id="Password" placeholder="Password" name="Password" pattern="[a-zA-z0-9]{5,}" required required title="ตัวอักขระภาษาอังกฤษหรือตัวเลข 5ตัวขึ้นไป"><br>
          <label for="inputPassword4">ยืนยันรหัสผ่าน</label><br>
          <input type="password"  id="conpassword" placeholder="Confirm Password" name="conpassword" required onkeyup='check();'><br>
          <span id='message'></span><br>
          <label for="inputUser_fname">ชื่อ</label><br>
          <input type="text" id="User_fname" value="<?=$row["User_fname"]?>" placeholder="First name" name="User_fname" required title="กรุณากรอกชื่อ"><br>
          <label for="inputUser_lname">นามสกุล</label><br>
          <input type="text" id="User_lname" value="<?=$row["User_lname"]?>" placeholder="Last name"	name="User_lname" required title="กรุณากรอกนามสกุล"><br>
          <label for="inputUser_Add">ที่อยู่</label><br>
          <textarea type="text" id="User_add"  placeholder="Address"	name="User_add" required title="กรุณาที่อยู่" ><?=$row["User_add"]?></textarea><br>
          <label for="inputUser_email">E-mail</label><br>
          <input type="text" id="User_email" value="<?=$row["User_email"]?>" placeholder="E-mail"	name="User_email" required title="กรุณากรอกอีเมลล์"><br>
          <label for="inputUser_tel">เบอร์โทรศัพท์</label><br>
          <input type="text" id="User_tel" value="<?=$row["User_tel"]?>" placeholder="Tel."	name="User_tel" required title="กรุณากรอกเบอร์โทรศัพท์"><br>
          <button type="submit">ยืนยัน</button>
        </form>
</body>
</html
