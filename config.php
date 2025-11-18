<?php
try {
    session_start();
} catch (Exception $e) {
    // 忽略錯誤，不顯示錯誤訊息
}
$conn = mysqli_connect("localhost", "root", "", "travelv2");
?>