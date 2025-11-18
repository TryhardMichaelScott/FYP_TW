<?php
require 'config.php';

if (isset($_POST['item_orders'])) {
    $item_orders = rtrim($_POST['item_orders'], ',');
    $arr = explode(',', $item_orders);

    for ($i = 0; $i < count($arr); $i++) {
        $item_order = $arr[$i];
        $item_id = $i + 1; // 项目的唯一标识符，可能需要根据您的数据库结构进行修改

        $q = "UPDATE items SET item_order = $item_order WHERE item_id = $item_id";
        mysqli_query($conn, $q);
    }
}

?>
