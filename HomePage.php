<?php
include('config.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>歡迎蒞臨胃遊</title>
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
            font-size: 22px;
			margin-bottom: 10px; 
        }
        
        header a {
            border: 2px solid #F4EDDC;
            padding: 5px 10px;
            margin-right: 10px;
			border-radius: 5px;
            color: #F4EDDC;
            text-decoration: none;
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
        
        .center-right {
            display: flex;
            align-items: center;
        }
		
		.search-container {
            display: flex;
            align-items: center;
            margin-right: 10px;
        }
        
        .search-container input[type="text"] {
            padding: 10px;
            border-radius: 5px;
            border: none;
            margin-right: 5px;
			font-size: 22px;
        }
        
        .search-container input[type="submit"] {
            padding: 7px 10px;
            background-color: #F4EDDC;
            border-radius: 5px;
            border: none;
            color: #A2152D;
            text-decoration: none;
			font-size: 22px;
        }
		
		body {
		  background-color: #DED0BD;
		}
		
		.list-header {
			display: flex;
			justify-content: space-between;
		}

		.list-title {
			font-size: 40px;
			font-weight: bold;
			margin-bottom: 10px;
			border: outset #cdb775;
			padding: 5px;
			max-width: fit-content;
			border-radius: 5px;
			background-color: #A2152D;
			color: #F4EDDC;
			margin-left: 15px;
		}

		.list-description {
			margin-right: 15px;
			font-size: 20px;
		}
		
		.list_frame{
			border: double #916639; 
			border-width: 4px;
			padding: 20px; 
			margin-bottom: 10px; 
			border-radius: 20px; 
			background-color: #F4EDDC;
			width:95%;
			margin-left: auto;
			margin-right: auto;
		}




        .wrap {
                text-align: center;
                padding-top: 20%;
               

                }
        .btn {
            color: #F4EDDC;  
            border: outset #cdb775;           
            border-radius: 50%;
            background-color: #A2152D;
            position:fixed;
            width:40px;
            height:40px;
            bottom:20px;
            right:20px;
            box-shadow: 2px 2px 3px #999;
            text-decoration: none;
            padding: 16px;
                       
            }

            .popup-wrap {           
            width: 100%;
            height: 100%;
            display: none;
            position: fixed;
            top: 0px;
            left: 0px;
            content: '';
            font-size: 32px;
            /*background: rgba(0, 0, 0, 0.85);*/
            }

            .popup-box  {
            width: 800px;
            
            padding: 30px 75px;
            transform: translate(-50%, -50%) scale(0.5);
            position: absolute;
            top:75%;
            left:80%;
            box-shadow: 0px 2px 16px rgba(0, 0, 0, 0.5);
            border-radius: 3px;
            background: #fff;
            text-align: center;
            font-size: 32px;
     
        }
            
        #selected_list{

            font-size:24px;

        }
       

            .close-btn {
            width: 50px;
            height: 50px;
            display: inline-block;
            position: absolute;
            top: 10px;
            right: 10px;
            border-radius: 100%;
            background: #d75f70;
            font-weight: bold;
            text-decoration: none;
            color: #fff;
            line-height: 40px;
            font-size: 32px;           
            }
        
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
      
        $(window).on('resize', function() {
            // 當視窗大小改變時觸發的函式
            adjustLayout(); // 調整版面布局
        });
        
        function adjustLayout() {
        }
    </script>
</head>
<body>
    <header>
        <!-- LOGO的超連結 -->
        <div class="logo-container">
            <a href="Homepage.php" class="logo-link">
			<img src="004.png" alt="Logo">
			</a>
        </div>
        
        <!-- 建立清單及搜尋欄 -->
        <div class="center-right">
			<div class="search-container">
			<form id="search" method="POST" action="search.php">
				<input type="text" name="keyword" placeholder="請輸入清單名稱">
				<input type="submit" value="搜尋" >
			</form>
			</div>
            <a href="trip_form.php">建立清單</a>
			<a href="Homepage.php">我的清單</a>
            <a href="logout.php">登出</a>
        </div>
    </header>
    
<div class="content">
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 查詢用戶的清單數據
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM lists WHERE user_id = '$user_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $current_list_id = null; // follow當前的 list_id
    // 顯示用戶的清單
    while ($row = $result->fetch_assoc()) {
        $list_title = $row['list_title'];
        $list_id = $row['list_id'];
        $list_description = $row['description']; // 獲取清單的描述

        // 只在 list_id 改變時顯示清單資訊
        if ($list_id !== $current_list_id) {
            echo "<div class='list_frame'>";
            echo "<div class='list-header'>";
            echo "<div class='list-title'>$list_title</div>";
            echo "<div class='list-description'>$list_description</div>";
            echo "</div>";
            $current_list_id = $list_id;
        }

        // 查詢清單項數據
        $item_query = "SELECT * FROM items WHERE list_id = '$list_id'";
        $item_result = mysqli_query($conn, $item_query);

        // 輸出清單項數據及地圖圖片
        while ($item_row = mysqli_fetch_assoc($item_result)) {
            $item_text = $item_row['item_text'];

            // 提取Google Maps嵌入URL
            preg_match('/src="(.*?)"/', $item_text, $matches);
            if (isset($matches[1])) {
                $map_url = $matches[1];
                // 顯示地图，並設置寬度和高度
                echo "<iframe src='$map_url' style='width: 400px; height: 200px; margin-left: 15px;'></iframe>";
            } else {
                // 没有匹配到有效的地圖嵌入代碼
                echo "<p>無法顯示地圖</p>";
            }
        }

        echo "</div>";
    }
} else {
    // 沒有找到用戶的清單
    echo "";
}
?>

</div>



<!--隨機餐廳-->
<div class="wrap">

  <a class="btn popup-btn" href="#letmeopen">吃啥?</a>
</div>
<div class="popup-wrap" id="letmeopen">
  <div class="popup-box transform-out">
    <h2 style=" font-size:32px;">不知道要吃什麼嗎?來個隨便吧!</h2>
    <form id="rand_restaurant" method="POST" action="rand_restaurant.php">
  <select name='selected_list' id='selected_list'>
    
    <?php
   
        $title_sql = "SELECT list_id, list_title, theme FROM lists WHERE user_id = ?";
        $stmt = $conn->prepare($title_sql);
        $stmt->bind_param('s', $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $current_list_id = null;

            while ($row = $result->fetch_assoc()) {
                $list_id = $row['list_id'];
                $list_title = $row['list_title'];
                $theme = $row['theme'];

                // 只有在 "theme" 為 "food" 時才將其放入 <option> 中顯示
                if ($theme === 'food' && $list_id !== $current_list_id) {
                    echo "<option value='$list_id'>$list_title</option>";
                    $current_list_id = $list_id;
                }
            }
        } else {
            // 沒有找到用戶的清單
            echo "<option>沒有找到清單</option>";
        }

    
    // 關閉連接
    $stmt->close();
    $conn->close();

  
   ?>   
    </select>

    <input type="submit" name="random_select" value="隨便" style= "font-size:30px">
    </form>
    <div id="resultContainer"><?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    include('rand_restaurant.php');
}
?></div> 


    <a class="close-btn popup-close" href="#">x</a>
  </div> 
</div>



<script>
$(document).ready(function() {
  $("#rand_restaurant").submit(function(e) {
    e.preventDefault(); // 阻止表單提交

    // 發送 AJAX 請求到 rand_restaurant.php
    $.ajax({
      type: "POST",
      url: "rand_restaurant.php",
      data: $(this).serialize(),
      success: function(response) {
        // 在結果容器中顯示地圖的 iframe 代碼
        $("#resultContainer").html(response);
      },
      error: function() {
        alert("無法獲取結果。");
      }
    });
  });
});

</script>


<script>
$(".popup-btn").click(function() {
  var href = $(this).attr("href");
  $(href).fadeIn(250);
  $(href).children(".popup-box").removeClass("transform-out").addClass("transform-in");
  event.preventDefault();
});

$(".popup-close").click(function() {
  closeWindow();
});

function closeWindow(){
  $(".popup-wrap").fadeOut(200);
  $(".popup-box").removeClass("transform-in").addClass("transform-out");
  event.preventDefault();
}
</script>








</body>
</html>
