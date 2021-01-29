<!DOCTYPE html>
<html lang="zxx">
  <?php
  session_start();
  if(empty($_SESSION["admin_username"])){
    header("location: ../admin/index.html");
}
  ?>

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
    <script src="https://kit.fontawesome.com/48f6528c57.js" crossorigin="anonymous"></script>

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
      function search(){
            httpRequest = new XMLHttpRequest();
            httpRequest.onreadystatechange = showResult;

            var search = document.getElementById("cost-hiddin").value;
            <?php
                    echo 'var url = "search_order.php?search="+search;';
            ?>
            

            httpRequest.open("GET",url);
            httpRequest.send();

            function showResult(){
                var result = httpRequest.responseText;
                console.log(result);
                    document.getElementById("his_table").innerHTML = result;
            }
        }
        function confirmPay(ID_his){
            let ans = confirm("ยืนยันการจ่ายเงินของคำสั่งซื้อที่ "+ID_his);
            if(ans==true)
                document.location = "confirm.php?id="+ID_his;
        }

    </script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> 
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
    <script type="text/javascript" src="paging.js"></script> 
    <script type="text/javascript">
    $(document).ready(function() {
        $('#his_table').paging({limit:8});
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
</head>
<?php
  require '../connect.php';
  $admin_username = $_SESSION["admin_username"];
  $meSql = 'SELECT * FROM `history`
  JOIN subject
  ON history.ID_sub = subject.ID_sub
  JOIN status
  ON history.ID_status = status.ID_status ORDER BY ID_history DESC';
  $meQuery = mysqli_query($conn,$meSql);
?>
<body>
    <!-- nav -->
    <nav >
      <a href="listcost_page.php"><img src="image/ALL-LOGO.png" class="logo-nav-top"></a>              
        <input type="text" placeholder="  พิมพ์ชื่อคอร์ส"  id="cost-hiddin" onkeyup="search()">
    </nav><hr>
    <!-- nav End -->
    
    <div class="container">
        <div class="col-12 card" style="padding-top: 20px;padding-left: 20px;" id="htrp-card">
            <h4>ประวัติการสั่งซื้อ</h4>
            <div style="padding-top: 50px;" class="table-responsive">
              <!-- ตาราง -->
                <table class="table" id="his_table">
                    <thead class="thead-dark">
                        <tr>
                        <th>ผู้ซื้อ</th>
                          <th>คำสั่งซื้อที่</th>
                          <th>วันที่</th>
                          <th>หมวดหมู่</th>
                          <th>ชื่อวิชา</th>
                          <th>เวลา (ชั่วโมง)</th>
                          <th>ราคา (บาท)</th>
                          <th>สถานะ</th>
                          <th>&nbsp</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                        while ($meResult = mysqli_fetch_array($meQuery)){
                          $monthNamesThai = array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤษจิกายน","ธันวาคม");
                          $splitTimeStamp = explode(" ",$meResult["history_date"]);
                          $date_a = $splitTimeStamp[0];
                          $time_a = $splitTimeStamp[1];
                          $date = explode("-",$date_a);
                          echo '<tr>
                          <td>'.$meResult["m_username"].'</td>
                          <td>'.$meResult["ID_history"].'
                          <td>'.intval($date[2])." ".$monthNamesThai[$date[1]-1]." ".($date[0]+543).'</td>
                          <td>'.$meResult["cat_name"].'</td>
                          <td>'.$meResult["sub_name"].'</td>
                          <td>'.$meResult["sub_hour"].'</td>
                          <td>'.$meResult["sub_price"].'</td>
                          <td>'.$meResult["status_name"].'</td>';
                          if($meResult["ID_status"]==1){
                            echo "<td>
                            <a href='#' onclick='confirmPay(".$meResult["ID_history"].")'>";
                            echo'<button class="btn btn-success btn-lg" ><i class="far fa-check-circle"></i>ยืนยันชำระเงิน</button>
                            </a>
                                        </td>';
                          }
                          else{
                            echo '<td>&nbsp</td>';
                          }
                        echo '</tr>';
                        }
                      ?>
                      </tbody>
                </table>
                <!-- ตาราง end -->
                <br><hr><br>
            </div>
        </div>
    </div>

    <br><br>
</body>

</html>