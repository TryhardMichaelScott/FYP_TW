<?php
require 'config.php';
if(!empty($_SESSION["id"])){
  header("Location: index.php");
}
if(isset($_POST["submit"])){
  $username = $_POST['username'];
  $act = $_POST['account'];
  $pwd = $_POST['password'];
  $pwd2 = $_POST['password2'];
  $mail = $_POST['email'];
  $duplicate = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' OR email = '$mail'");
  if(mysqli_num_rows($duplicate) > 0){
    echo
    "<script> alert('使用者名稱或Email被重複使用'); </script>";
  }
  else{
    if($pwd == $pwd2){
      $query = "INSERT INTO user VALUES('','$username','$act','$pwd','$mail')";
      mysqli_query($conn, $query);
      echo
      "<script> alert('註冊成功'); </script>";
		header("Location: login.php");
    }
    else{
      echo
      "<script> alert('密碼不符'); </script>";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>歡迎加入您胃遊會員</title>
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
            margin-right:0px;
            text-decoration: none;
        }
        
		.form1 {
		display: flex;
		justify-content: center;
		align-items: center;
		height: 60vh;
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
			padding: 10px 80px;
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
  <form action="register.php" method="post" name="form1" id="form1" class="form1">
  <h1>❀歡迎加入胃遊會員❀</h1><br>
  <div>
    <input name="username" type="text" required id="username" placeholder="使用者名稱(限12字)" size="22" maxlength="12" class="input">
  </div><br>
  <div>
    <input name="account" type="account" required id="account" placeholder="帳號" size="22" maxlength="12" class="input">
  </div><br>
  <div>
    <input name="password" type="password" required id="password" placeholder="密碼"size="22" maxlength="12" class="input">
  </div><br>
  <div>
    <input name="password2" type="password" required id="password2" placeholder="請再輸入一次密碼" size="22" maxlength="12" class="input">
  </div><br>
  <div>
    <input name="email" type="email" required id="email" placeholder="電子郵件位址" size="22" maxlength="40" class="input">
  </div><br>
  <button type="submit" name="submit">註冊</button><br>
  <a href="login.php" class="button-link">返回登入</a>
  </button>
</form>
</body>

</html>

