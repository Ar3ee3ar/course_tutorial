<?php
session_start();
if(empty($_SESSION["m_username"])){
    header("location: ../index.html");
}
$m_username = $_SESSION["m_username"];
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ondemand">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ondemand</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/style_cost.css" type="text/css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../style/editpass.css">
    <script src="https://kit.fontawesome.com/48f6528c57.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@500&display=swap" rel="stylesheet">
    <style>
        .paging-nav {
  text-align: center;
  padding-top: 2px;
}

.paging-nav a {
  margin: auto 1px;
  text-decoration: none;
  display: inline-block;
  padding: 1px 7px;
  background:  	#DEB887;
  color: white;
  border-radius: 3px;
}

.paging-nav .selected-page {
  background: #CF0000;
  font-weight: bold;
}

.paging-nav,
#tableData {
  width: 400px;
  margin: 0 auto;
  font-family: Arial, sans-serif;
}
ul.cat {
  list-style-type: none;
  margin: 0;
  padding: 0;
}
.dropbtn {
  background-color: white;
  color: black;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}
.dropbtn:hover, .dropbtn:focus {
  color: #CF0000;
}

.dropdown {
  position: relative;
  display: inline-block;
  float:right;
  margin-right: 40px;
  margin-top: 10px;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  overflow: auto;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown a:hover {background-color: #ddd;}

.show {display: block;}
    </style>
    <script>
        function mouse_in2() {
            let y = document.getElementById("home2")
            y.className = "change_color_red";
        }
        function mouse_out2() {
            let y = document.getElementById("home2")
            y.className = "change_color_black";
        }
        function shownav(){
            if(document.getElementById("filter-sl").style.display=='block'){
                document.getElementById("filter-sl").style="display:none";
            }
            else{
                document.getElementById("filter-sl").style="display:block";
            }
        }
    </script>
    <script>
        
        function search(){
            httpRequest = new XMLHttpRequest();
            httpRequest.onreadystatechange = showResult;

            var search = document.getElementById("input-bottom").value;
            <?php
                if(!isset($_GET["cat"])){
                    echo 'var url = "search.php?search="+search;';
                }
                else{
                    echo 'var url = "search.php?cat='.$_GET["cat"].'&search="+search;';
                }
            ?>
            

            httpRequest.open("GET",url);
            httpRequest.send();

            function showResult(){
                var result = httpRequest.responseText;
                    document.getElementById("sub_table").innerHTML = result;
            }
        }
        function onlyUnique(value, index, self) {
            return self.indexOf(value) === index;
        }
        async function getDataFromAPI() {
            let response = await fetch('course.json')
            let rawData = await response.text() // อ่านผลลพธั ์
            let objectData = JSON.parse(rawData) // แปลผลลพธั ์เป็น object

            let cate = document.getElementById('category');

            var cat =["ทั้งหมด"];
            var count=0;
            var check = false;
            for(let i=0;i<objectData.Detail.length;i++){
                cat[cat.length] = objectData.Detail[i].Category;            
            }
            var unique = cat.filter(onlyUnique);
            /*elements = unique.join(',')
            console.log(elements)
            $.post('adddata.php', {elements: elements})*/
            for(let j=0;j<unique.length;j++){
                let li = document.createElement('li');
                if(j==0){
                    //<a href="" style="text-decoration:none; color: #000;">GAT</a><br>
                    li.innerHTML += "<a href='listcost_page.php'style="+'"'+"text-decoration:none; color: #000;"+'"'+">"+unique[j]+"</a>"
                }
                else{
                    li.innerHTML += "<a href='listcost_page.php?cat="+unique[j]+"'style="+'"'+"text-decoration:none; color: #000;"+'"'+">"+unique[j]+"</a>"
                }
                cate.appendChild(li);
            }


            
        }
        getDataFromAPI() // เรียกฟังก์ชัน
    </script>
    <!--แบ่งหน้า-->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> 
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
    <script type="text/javascript" src="paging.js"></script> 
    <script type="text/javascript">
    $(document).ready(function() {
        $('#sub_table').paging({limit:8}); /*แบ่งหน้า*/
    });
    </script>
    <script type="text/javascript">

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-36251023-1']);
    _gaq.push(['_setDomainName', 'jqueryscript.net']);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();

</script>
<!---แบ่งหน้า--->
<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
</head>

<body>
    <?php
    $url = 'course.json';
        $data = file_get_contents($url); //ดึง data จาก url
        $characters = json_decode($data);
        $numobj_Data = count((array)$characters->Detail);
    ?>
    <!-- nav -->
    <nav>
        <a href="listcost_page.php"><img src="image/ALL-LOGO.png" class="logo-nav-top"></a>
        <div class="dropdown">
        <button class="dropbtn" onclick="myFunction()"><i class="fas fa-user"></i>&nbsp&nbsp|&nbsp<?php echo $m_username?></button>
        <div id="myDropdown" class="dropdown-content">
            <a href="../editprofile.php">แก้ไขข้อมูล</a>
            <a href="../logout.php">Logout
                <i class="fas fa-sign-out-alt"></i>
            </a>
            <a href="history_page.php" >ประวัติการซื้อ</a>
        </div>  
        </div>            
    </nav><hr>
    
    <!-- nav End -->
    
    <img src="image/main.png" style="max-width: 100%;">
    <!-- รายการ ใต้รูป -->
    <div style="background-color: #efefef;">
        <div class="container row m-auto" onclick="shownav()" >
            <div class="filter-btn py-3 px-0 col" id='nav-none'>
                <i class="fa fa-sort-desc"></i> ตัวกรอง
            </div>
            <div class="filter-btn filter-attribute-vichar py-3 px-0 col">
                วิชา
            </div>
            <div class="filter-btn filter-attribute-how py-3 px-0 col">
            </div>
            <div class="filter-btn filter-attribute-cost py-3 px-0 col" id='nav-none'>
            </div>
        </div>
    </div> 
    
    <div class="filter-selection" style="display: none;" id="filter-sl">
        <div class="container row m-auto">
            <div class="col filter-attribute-class" id='nav-none'></div>
            <div class="col py-3 filter-attribute-vichar" id='nav-block'>
            <ul id="category" class="cat"></ul> <!---for categories read from JSON by javascript-->
            </div>
            <div class="col py-3 filter-attribute-how " id='nav-block'>
            </div>
            <div class="col py-3 filter-attribute-cost " id='nav-none'>
            </div>
            
        </div><hr>
    </div>
    <!-- รายการ ใต้รูป end -->

    <!-- แสดงรายการ -->
    <div class="container main-first" >
        <!-- จำนวนรายการ -->
        <div class="col-12 px-0 pt-4">
            <input type="text" placeholder="  พิมพ์รหัส , ชื่อคอร์ส"  id="input-bottom" name ="search" onkeyup="search()"><i class="fa fa-search" style="padding-left: 10px;"></i>
        </div>
        <!-- จำนวนรายการ end-->
        <div class="col">
            <div class="row ">
                <!-- card -->
                <?php
                echo'<table id="sub_table" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>หมวดหมู่</th>
                    <th>ชื่อวิชา</th>
                    <th>ราคา</th>
                    <th>&nbsp</th>
                </tr>
                </thead>
                <tbody>';
                
                for($i=0;$i<$numobj_Data;$i++){
                    if(!isset($_GET["cat"])){
                        echo "<tr>
                        <td>".$characters->Detail[$i]->ID."</td>
                        <td>".$characters->Detail[$i]->Category."</td>
                        <td>".$characters->Detail[$i]->Name."</td>
                        <td>".$characters->Detail[$i]->Price."</td>
                        <td><a href='detail_page.php?id=".$i."'>ดูรายละเอียด</a></td>
                    </tr>";
                    }
                    else{
                        if($_GET["cat"]==$characters->Detail[$i]->Category){
                            echo "<tr>
                        <td>".$characters->Detail[$i]->ID."</td>
                        <td>".$characters->Detail[$i]->Category."</td>
                        <td>".$characters->Detail[$i]->Name."</td>
                        <td>".$characters->Detail[$i]->Price."</td>
                        <td><a href='detail_page.php?id=".$i."'>ดูรายละเอียด</a></td>
                    </tr>";
                        }
                    }
                }
                echo '
                </tbody>
                </table>';
        
            ?>
                <!-- card end -->
            </div>
        </div>
    </div>
    <!-- แสดงรายการ end -->
    <br><br>
</body>

</html>