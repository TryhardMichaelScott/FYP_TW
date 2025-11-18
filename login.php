<?php
require 'config.php';


if(isset($_SESSION['logout_message'])) {
  $message = $_SESSION['logout_message'];
  echo "<script>alert('$message');</script>";
  unset($_SESSION['logout_message']);
}
if(!empty($_SESSION["user_id"])){
  header("Location: index.php");
}
if(isset($_POST["submit"])){
  $usernameemail = $_POST["usernameemail"]; //可輸入帳號或email
  $password = $_POST["password"];
  $result = mysqli_query($conn, "SELECT * FROM user WHERE account = '$usernameemail' OR email = '$usernameemail'");
  $row = mysqli_fetch_assoc($result);
  
  if(mysqli_num_rows($result) > 0){
    if($password == $row['password']){
      $_SESSION["login"] = true;
      $_SESSION["user_id"] = $row["user_id"];
      header("Location: HomePage.php");
    }
    else{
      echo "<script>alert('密碼錯誤');</script>";
    }
  }
  else{
    echo "<script>alert('此帳號未註冊');</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>登入</title>
  <link rel="icon" href="001.ico" type="image/ico">
  <style>
    * {
      padding: 0;
      margin: 0;
    }

    header {
      background-color: #A2152D;
      display: flex;
      align-items: center;
      justify-content: space-between;
      font-size: 18px;
    }

    body {
      background-color: #f6efe1;
    }

    .logo-container {
      display: flex;
      margin-left: 30px;
    }

    .logo-container a {
      border: none;
      padding: 0;
      margin-right: 0px;
      text-decoration: none;
    }

    .form1 {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 40vh;
      font-size: 20px;
      flex-direction: column;
    }

    .input {
      font-size: 16px;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    button,
    input[type=submit] {
      background-color: #262626;
      color: white;
      padding: 10px 100px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 20px;
	  color: #DEB87A;
    }

    .button-link {
      display: inline-block;
      padding: 10px 100px;
      background-color: #262626;
      color: white;
      text-decoration: none;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 20px;
	  color: #DEB87A;
    }
  </style>
</head>
<body>
  <header>
    <div class="logo-container">
     <a href="javascript:void(0);" class="logo-link" onclick="showMessage()"><img src="004.png" alt="Logo"></a>
	<script>
		function showMessage() {
			alert("請先登入/註冊");
		}
	</script>
    </div>
  </header>
  <form action="login.php" method="post" name="form1" id="form1" class="form1">
  <h1>❀歡迎回來❀</h1><br>
    <div>
      <input name="usernameemail" type="text" required id="usernameemail" placeholder="帳號或Email" size="22" maxlength="50" class="input">
    </div><br>
    <div>
      <input name="password" type="password" required id="password" placeholder="密碼" size="22" maxlength="12" class="input">
    </div><br>
    <button type="submit" name="submit">登入</button><br>
    <a href="register.php" class="button-link">註冊</a>
  </form>
</body>
</html>
