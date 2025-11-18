<?php
require 'config.php';
if(!empty($_SESSION["id"])){
  $id = $_SESSION["id"];
  $result = mysqli_query($conn, "SELECT * FROM user WHERE id = $id");
  $row = mysqli_fetch_assoc($result);
}
else{
  header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>首頁</title>
	
	<link rel="icon" href="001.ico" type="image/ico">
    <style>
		* {
			padding: 0;
			margin: 0;
			}
        /* 在這裡加入你的CSS樣式 */
        header {
            background-color: #f09d51;
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: 18px;
        }
        
        header a {
            border: 1px solid white;
            padding: 5px 10px;
            margin-right: 10px;
            color: white;
            text-decoration: none;
        }
        
        .logo-container {
            display: flex;
            align-items: center;
        }
        
        .logo-container a {
            border: none;
            padding: 0;
            margin-right: 0;
            color: white;
            text-decoration: none;
        }
        
        .logo-container img {
            margin-right: 10px;
        }
		h2{
			color:white;
		}
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(window).on('resize', function() {
            // 當視窗大小改變時觸發的函式
            adjustLayout(); // 調整版面布局
        });
        
        function adjustLayout() {
            // 在這裡根據視窗大小調整畫面佈局
            // 你可以使用JavaScript或jQuery操作DOM元素來實現
        }
    </script>
	
	
  </head>
  <body>
  
  <header>
        <!-- LOGO的超連結 -->
        <div class="logo-container">
            <a href="index.php" class="logo-link"><img src="00.png" alt="Logo"></a>
        </div>
		
        <div>
		    <h2>Welcome <?php echo $row["username"]; ?></h2>
		</div>
		
        <!-- 建立清單 -->
        <div class="center-right">
            <a href="create_list.php">建立清單</a>
            
            <!-- 登入 -->
            <a href="logout.php">登出</a>
        </div>
		
    </header>
    
    <div class="content">
        <!-- 在這裡放置網頁內容 -->
  </body>
</html>
