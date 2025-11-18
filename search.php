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
            <a href="list_form.html">建立清單</a>
			<a href="Homepage.php">我的清單</a>
            <a href="logout.php">登出</a>
        </div>
    </header>
    
<div class="content">
<?php

// 查詢用戶的清單數據
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM lists WHERE user_id = '$user_id'";
$result = $conn->query($sql);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $keyword = $_POST["keyword"];

    // 使用 SQL 查询执行搜索
    $sql = "SELECT * FROM lists WHERE list_title LIKE '%$keyword%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // 显示搜索结果
        while ($row = $result->fetch_assoc()) {
            $list_title = $row['list_title'];
            $list_id = $row['list_id'];
            $list_description = $row['description'];
            // ...显示搜索结果的其他信息
            // 这里可以根据需要自定义结果的展示方式
            // 例如，可以将搜索结果的标题和描述包装在一个 HTML 块中
            echo "<div class='list_frame'>";
            echo "<div class='list-header'>";
            echo "<div class='list-title'>$list_title</div>";
            echo "<div class='list-description'>$list_description</div>";
            echo "</div>";

            // 查询匹配的清单的项目
            $item_query = "SELECT * FROM items WHERE list_id = '$list_id'";
            $item_result = mysqli_query($conn, $item_query);

            // 显示清单的项目
            while ($item_row = mysqli_fetch_assoc($item_result)) {
                $item_text = $item_row['item_text'];

                // 提取Google Maps嵌入URL
                preg_match('/src="(.*?)"/', $item_text, $matches);
                if (isset($matches[1])) {
                    $map_url = $matches[1];
                    // 显示地图，设置宽度和高度
                    echo "<iframe src='$map_url' style='width: 400px; height: 200px; margin-left: 15px;'></iframe>";
                } else {
                    // 没有匹配到有效的地图嵌入代码
                    echo "<p>无法显示地图</p>";
                }
            }

            echo "</div>";
        }
    } else {
        echo "找不到符合搜索条件的结果";
    }
}

?>

</div>



</body>
</html>
	