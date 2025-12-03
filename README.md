TasteVenture — 美食與旅遊愛好者的交流社群

TasteVenture 是一個為熱愛美食與旅遊的人所打造的社群平台。
這個專案的目標是建立一個有意義的空間，讓使用者能夠分享自己的美食體驗、旅遊冒險與個人觀點。

透過 TasteVenture，我們希望能夠：

促進文化交流：透過分享美食與旅遊經驗，讓人們理解彼此的文化背景

強化社群連結：建立友善互助的社群環境，增進彼此交流

激發探索欲望：鼓勵大家前往新的目的地、品嚐新的風味

無論是隱藏版小吃、難忘的旅程，或是其他旅人提供的小技巧，TasteVenture 讓人們能在這裡一起分享世界帶來的驚喜 —— 一口食物、一段旅程。

使用方法（Quick Start）

以下為本專案的基本安裝與操作方式。

1.環境需求

PHP 8+

MySQL

Apache / Nginx（建議使用 XAMPP）

瀏覽器（Chrome / Edge）


2. 安裝步驟
(1) 將專案放置到伺服器目錄

例如 XAMPP 的話放在：

/xampp/htdocs/TasteVenture/

(2) 匯入資料庫

開啟 phpMyAdmin

建立資料庫 travelv2

匯入專案內的 SQL 檔案：

travelv2(1127).sql

(3) 設定資料庫連線（如需）

修改：

sql_connect.php


填入你的資料庫設定：

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "travelv2";

(4) 在瀏覽器開啟網站
http://localhost/../index.php


基本使用功能:

註冊 / 登入帳號

建立美食或旅遊清單（Create List）

為清單新增多個景點／餐廳（Items）

在清單上留言與回覆

收藏清單（Like / Save）

透過 Google Maps 查看每個景點位置

瀏覽他人公開的清單
