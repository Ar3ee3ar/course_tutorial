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
                    echo 'var url = "search_name.php?search="+search;';
            ?>
            

            httpRequest.open("GET",url);
            httpRequest.send();

            function showResult(){
                var result = httpRequest.responseText;
                console.log(result);
                    document.getElementById("his_table").innerHTML = result;
            }
        }
        function confirmDel(username){
            let ans = confirm("ต้องการยกเลิกการเป็นสมาชิกของ"+username);
            if(ans==true)
                document.location = "cancel.php?id="+username;
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
  $meSql = 'SELECT * FROM member';
  $meQuery = mysqli_query($conn,$meSql);
?>
<body>
    <!-- nav -->
    <nav >
      <a href="listcost_page.php"><img src="image/ALL-LOGO.png" class="logo-nav-top"></a>              
        <input type="text" placeholder="  พิมพ์ชื่อสมาชิก"  id="cost-hiddin" onkeyup="search()">
    </nav><hr>
    <!-- nav End -->
    
    <div class="container">
        <div class="col-12 card" style="padding-top: 20px;padding-left: 20px;" id="htrp-card">
            <h4>รายชื่อสมาชิก</h4>
            <div style="padding-top: 50px;" class="table-responsive">
              <!-- ตาราง -->
                <table class="table" id="his_table">
                    <thead class="thead-dark">
                        <tr>
                          <th>username</th>
                          <th>ชื่อ-สกุล</th>
                          <th>&nbsp</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                        while ($meResult = mysqli_fetch_array($meQuery)){
                          echo '<tr>
                          <td>'.$meResult["m_username"].'
                          <td>'.$meResult["m_name"].'</td>';
                            echo '<td>
                            <a href=\'#\' onclick=\'confirmDel("'.$meResult["m_username"].'")\'>
                            <button class="btn btn-danger" style="border-radius: 20px;"><i class="fas fa-trash"></i>ลบสมาชิก</button>
                            </a>
                                        </td>';
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