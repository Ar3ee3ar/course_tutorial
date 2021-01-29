<?php
session_start();
if(empty($_SESSION["admin_username"])){
    header("location: ../admin/index.html");
}
$admin_username = $_SESSION["admin_username"];
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
    </script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> 
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
    <script type="text/javascript" src="paging.js"></script> 
    <script type="text/javascript">
    $(document).ready(function() {
        $('#sub_table').paging({limit:8});
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
    
    <!-- nav -->
    <nav>
        <a href="listcost_page.php"><img src="image/ALL-LOGO.png" class="logo-nav-top"></a> 
        <a href="logout.php" style="float:right;margin-right:20px; margin-top:40px;">Logout
                <i class="fas fa-sign-out-alt"></i>
            </a>         
    </nav><hr>
    
    <!-- nav End -->
    
    <img src="image/main.png" style="max-width: 100%;">
    <!-- รายการ ใต้รูป -->
    <div style="background-color: #efefef;">
        <div class="container row m-auto" onclick="shownav()" >
            <div class="filter-btn py-3 px-0 col" id='nav-none'>
                <i class="fa fa-sort-desc"></i> รายการ
            </div>
            <div class="filter-btn filter-attribute-vichar py-3 px-0 col">
            </div>
            <div class="filter-btn filter-attribute-how py-3 px-0 col">
            </div>
            <div class="filter-btn filter-attribute-cost py-3 px-0 col" id='nav-none'>
            </div>
        </div>
    </div> 
    
    <div class="filter-selection" style="display: none;" id="filter-sl">
        <div class="container row m-auto">
            <div class="col filter-attribute-class" id='nav-none'>
            </div>
            <div class="col py-3 filter-attribute-vichar" id='nav-block'>
            <ul id="category" class="cat">
                    <li><a href='member_page.php' style="text-decoration:none; color: #000;">ดูรายชื่อสมาชิก</a></li>
                    <li><a href='order_page.php' style="text-decoration:none; color: #000;">ดูรายการคำสั่งซื้อ</a></li>
                </ul>
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
            
        </div>
        <!-- จำนวนรายการ end-->
        <div class="col">
            <div class="row ">
                <!-- card -->
                <!-- card end -->
            </div>
        </div>
    </div>
    <!-- แสดงรายการ end -->
    <br><br>
</body>

</html>