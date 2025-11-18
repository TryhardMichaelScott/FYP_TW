<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>胃遊-建立清單</title>
<link rel="icon" href="001.ico" type="image/ico">
<link rel="stylesheet" href="list.css">

<style>

  html, body {
    height: 100%;
    margin: 50;
    padding: 0;
  }

 .remove   {
  font-size: 20px;
    background-color: #de4e66;
    color: #F4EDDC;
    text-decoration: none;
    margin-left: 20px;
    border: 2px solid #F4EDDC;
            padding: 5px 10px;
            margin-right: 10px;
		border-radius: 5px;
    float: right;    
}


  * {
padding: 0;
margin: 0;
}

.row-label {
display: flex;
align-items: center;
justify-content: center;
font-size: 50px;
}

.row-label label {
margin-right: 10px;
}

header {
        background-color: #A2152D;
        display: flex;
        align-items: center;
        justify-content: space-between;
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

</style>
</head>

<body>   
<!--
清單名稱:list_title
說明:Description
主題:name="trip_food" type="radio" id="choose"
項目:name="mytext[]"
 -->

	<header>
        <div class="logo-container">
            <a href="HomePage.php" class="logo-link"><img src="004.png" alt="Logo"></a>
        </div>
    </header>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBAdCKFDHiu-Z3lf4S_b9u7GYy-POQ59mY&libraries=places&callback=initMap"
    async defer></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script type="text/javascript">
      let map;
      let currentPosition;
      let selectedPlace;
      let marker;
      var items={
        mytext:[],
        item_name:[],
        item_url:[],
        item_order:[]
      };
      
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: 23.5531118, lng: 121.0211024},
          zoom: 8,
        });


        navigator.geolocation.getCurrentPosition(function(position){
          currentPosition={
            lat:position.coords.latitude,
            lng:position.coords.longitude,

          };
          map.setCenter(currentPosition);
          map.setZoom(16);

          const autocomplete = new google.maps.places.Autocomplete(
        document.getElementById('search_map_input'),
          {
            bounds: {
            east: currentPosition.lng + 0.001,
            west: currentPosition.lng - 0.001,
            south: currentPosition.lat - 0.001,
            north: currentPosition.lat + 0.001,
          },
            strictBounds:false,
          }
          );
          autocomplete.addListener('place_changed',function(){

            const place = autocomplete.getPlace();
            //console.log(place);
            selectedPlace={
              location:place.geometry.location,
              placeID:place.place_id,
              name:place.name,
              address:place.formatted_address,
              url:place.url,
            };
           // console.log(selectedPlace);
              map.setCenter(selectedPlace.location);
                      
            if(!marker){
              marker=new google.maps.Marker({
                map: map,
                animation:google.maps.Animation.BOUNCE,
              });
            }
            marker.setPosition(selectedPlace.location);
          });
        });

      }
      document.addEventListener('DOMContentLoaded', function() {    
        item_count = 0;

        document.getElementById('add').addEventListener('click', function() {  
         
          items.mytext.push(`<iframe width="600" height="450" frameborder="0" style="border:0"
           src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBAdCKFDHiu-Z3lf4S_b9u7GYy-POQ59mY&q=${selectedPlace.name}"allowfullscreen></iframe>`);
          items.item_name.push(selectedPlace.name);
          items.item_url.push(selectedPlace.url);

          item_count++;
          console.log(items.item_name);

          listmarkers=new google.maps.Marker({
                position: selectedPlace.location,
                map: map,
                data: selectedPlace.name,
                icon:'http://www.google.com/mapfiles/ms/micons/red-pushpin.png'
          });

        document.getElementById('list_ul').innerHTML += `
         <li class="list_li" data-index="${item_count}"> 
          <label>${item_count}.</label>
          <a href="${selectedPlace.url}" target="_blank" style="text-decoration: none; color: black;">${selectedPlace.name}</a>
          <a href="#" class=" remove">刪除</a>
          </li>      
        `;
        console.log(items.item_name.length);
        // 找到具有指定类名的元素
        const liElements = document.getElementsByClassName('list_li');

        // 遍历每个元素并获取其 data-index 属性的值并打印到控制台
        for (let i = 0; i < liElements.length; i++) {
          const dataIndex = liElements[i].getAttribute('data-index');
          console.log(`Element ${i + 1} data-index: ${dataIndex}`);
        }
       
          
       document.getElementById('search_map_input').value='';

       document.getElementById('mytext_input').value = JSON.stringify(items);
      });

      document.getElementById('list_ul').addEventListener('click', function(e) {
        if (e.target.classList.contains('remove')) {
            const li = e.target.parentNode;
            const index = li.getAttribute('data-index');
            items.mytext.splice(index, 1);
            li.remove();
            document.getElementById('mytext_input').value = JSON.stringify(items);
        }
    });

    // 初始化排序插件
$(function(){
  $('.sortable').sortable({
    stop: function () {
        // 获取排序后的项目顺序
        var item_orders = [];
        $('.sortable li').each(function (index) {
            item_orders.push(index + 1);
        });

        // 更新项目顺序
        var newItems = { mytext: [], item_name: [], item_url: [], item_order: [] };
        for (var i = 0; i < item_orders.length; i++) {
          var dataIndex = item_orders[i] - 1; // 注意减去1以匹配 JavaScript 数组索引
          newItems.mytext[i] = items.mytext[dataIndex];
          newItems.item_name[i] = items.item_name[dataIndex];
          newItems.item_url[i] = items.item_url[dataIndex];
          newItems.item_order[i] = item_orders[i] + 1;
        }
        
        // 更新表单字段
        document.getElementById('mytext_input').value = JSON.stringify(newItems);
        
        // 更新 items 对象
        items = newItems;
        
        // 更新每个 <li> 的 data-index 标签和 <label> 显示
        const liElements = document.getElementsByClassName('list_li');
        for (let i = 0; i < liElements.length; i++) {
          liElements[i].setAttribute('data-index', i + 1);
          // 更新 <label> 显示
          const labelElement = liElements[i].querySelector('label');
          if (labelElement) {
            labelElement.textContent = `${i + 1}.`;
          }
        }
        for (var j = 0; j < item_orders.length; j++) {
          console.log(`Item Order: ${item_orders[j]}`);
        }
        for (var j = 0; j < items.item_name.length; j++) {
          console.log(`Item Name: ${items.item_name[j]}`);
        }
    }
  });
});



});

</script>
    
  <div class="container" id="form1">
    <form action="list_form.php" method="post" name="form">
  
        
          <h2 style="text-align: center;" >✦現在開始創建一個新的胃遊清單吧!✦</h2><br>          
          <div class="leftdiv">
          <label for="textfield">清單名稱:</label><br>
             
          <input name="list_title" type="text" autofocus required id="list_title" size="18" maxlength="12" style="font-size:20px"><br>  
          <input name="trip_food" type="hidden" autofocus required id="choose" size="18" maxlength="12" value="food"> 
          <label for="subject">項目:</label><br>
          <input type="text" id="search_map_input" placeholder="請輸入搜尋地點" style="font-size:20px "> 
          <button type="button" id="add" style="font-size:20px ">加入清單</button>
          <div id="map"></div></div>
          <div class="rightdiv">

         
            <label for="Description">說明:</label><br>
  
            <textarea id="Description" name="Description" placeholder="清單說明" style="height:100px; font-size:20px;"></textarea><br>
         <div id="itemlLst" >
         <h4 style="padding: auto;"> List:</h4>
         <hr style="border: 1px solid #F4EDDC; " />
         <ul class="list_ul sortable" id="list_ul">
         </ul>
        </div>

        <input type="hidden" id="mytext_input" name="items"> </div>
       
         <input style="font-size:30px; font-weight:bold;" type="submit" value="Submit" style="font-size:20px ">  
          </div>


    </form>

  

</body>
</html>