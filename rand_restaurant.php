<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "travelv2";

    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
    if ($conn->connect_errno) {
        echo "連接數據庫失敗: " . $conn->connect_error;
        exit();
    }

    $selected_list_id = $_POST["selected_list"];
    $sql = "SELECT item_text,item_name ,item_url FROM `items` JOIN `lists` ON items.list_id = lists.list_id WHERE items.list_id = '$selected_list_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $item_texts = array();
        $item_name = array();
        $item_url = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $item_texts[] = $row['item_text'];
            $item_name[] = $row['item_name'];
            $item_url[] = $row['item_url'];
        }

        $random_index = array_rand($item_texts);
        $random_item_text = $item_texts[$random_index];
         
       echo"<br><a href='$item_url[$random_index]' target='_blank' style='text-decoration: none; color: black;'>$item_name[$random_index]</a>";
        preg_match('/src="(.*?)"/', $random_item_text, $matches);

        if (isset($matches[1])) {
            $map_url = $matches[1];
            // 返回地图的 iframe 代碼
            echo "<iframe src='$map_url' style='width: 800px; height: 500px; margin-left: 15px;'></iframe>";
        } else {
            // 没有匹配到有效的地圖嵌入代碼
            echo "<p>無法顯示地圖</p>";
        }
    } else {
        echo "沒取到值";
    }

    $conn->close();
} else {
    echo "請通過表單提交來訪問此頁面。";
}
?>
