<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // 接收清單名稱
	$listTitle = $_POST["list_title"];
	
	// 接收說明
	$description = $_POST["Description"];
	
	// 接收主題
	$theme = $_POST["trip_food"];
	
	// 接收項目
	//$items = json_decode($_POST["mytext"]);
	$jsonString = $_POST["items"];
	$items_obj = json_decode($jsonString, true);
	$items = $items_obj["mytext"];
    $item_name_array = $items_obj["item_name"];
    $item_url_array = $items_obj["item_url"];
	$item_order_array = $items_obj["item_order"];
	sort($item_order_array);
	

	// 在這裡執行其他操作，例如存儲清單到數據庫等
	$servername = "localhost"; //數據庫服務器名稱
	$dbusername = "root"; //數據庫用戶名
	$dbpassword = ""; //數據庫密碼
	$dbname = "travelv2";//數據庫名稱
	
	$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname); //創建與數據庫的連接
	
	//檢查連接是否成功
	if ($conn->connect_errno) {
		echo "連接數據庫失敗: " . $conn->connect_error;
		exit();
	}
	
	//檢測用戶登錄並獲取用戶ID（使用session）
	
	session_start();
	/*
	// 檢查用戶是否已登錄
	if (!isset($_SESSION['user_id'])) {
		// 用戶未登錄，執行相應的操作，如跳轉到登錄頁面
		header("Location: login.php");
		exit;
	}
	*/
	// 獲取用戶ID
	$user_id = $_SESSION['user_id'];
	
	
	//插入數據到 "lists" 資料表
	$sql = "INSERT INTO lists (list_title, description, theme, user_id) VALUES ('$listTitle', '$description', '$theme', '$user_id')";

	
	//檢查資料表數據插入
	if ($conn->query($sql) === TRUE) {
		$listId = $conn->insert_id; //獲取剛插入的記錄的自增 ID
		echo "資料表數據插入成功！資料表ID: " . $listId . "<br>"; // 重定向或顯示成功消息
	} else {
		echo "資料表數據插入失敗: " . $conn->error;
	}
	
	foreach ($items as $index => $item) {
		$itemText = $conn->real_escape_string($item); // 防止 SQL 注入攻击，对特殊字符进行转义处理
    	$itemName = $conn->real_escape_string($item_name_array[$index]);
    	$itemUrl = $conn->real_escape_string($item_url_array[$index]);
    	$itemOrder = $conn->real_escape_string($item_order_array[$index]);

		$sql = "INSERT INTO items (list_id, item_text, item_name, item_url, item_order) VALUES ('$listId', '$itemText', '$itemName', '$itemUrl', '$item_order')";
		
		if ($conn->query($sql) !== TRUE) {
			echo "項目數據插入失敗: " . $conn->error;
		}
	}
	$conn->close();
	
	// 例如使用 header 函式重定向到另一個頁面
	header("Location: HomePage.php");
}



?>
