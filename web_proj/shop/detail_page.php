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

    <script>
        function confirmAdd(ID_sub){
            <?php
            session_start();
            if(empty($_SESSION["m_username"])){
                echo '<script>
            alert("Please sign in before buy course");
            window.location.href="index.php";
            </script>';
            }
            ?>
            let ans = confirm("ต้องการซื้อวิชารหัส"+ID_sub);
            if(ans==true)
                document.location = "buy.php?id="+ID_sub;
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
    <nav >
        <img src="image/ALL-LOGO.png" class="logo-nav-top">              
        <input type="text" placeholder="  พิมพ์รหัส , ชื่อคอร์ส"  id="cost-hiddin">
    </nav><hr>
    <!-- nav End -->
    <div class="container">
        <button class="btn btn-outline-dark" onclick="document.location='listcost_page.php'"><i class="fa fa-chevron-left"></i><i class="fa fa-chevron-left"></i> ย้อนกลับ</button>
            <!-- จ่ายเงิน -->
            <?php
            $i = $_GET["id"];
            echo '<div class="float-right responsive" >
                <div class="card" style="width: 30rem;"">
                    <div style="font-size: 20px;padding: 20px;">
                        <h4><b>ช่องทางการเรียน</b></h4>
                        <div class="float-left " style="padding-left: 30px;">
                            <div class="card " style="width: 10rem;align-items: center;">
                                <h5>เรียนที่สาขา</h5>
                                <img src="image/ondemand-branch.png" style="width: 50px;" >
                            </div>
                        </div>
                        <div class="float-right" style="padding-right: 30px;">
                            <div class="card " style="width: 10rem;align-items: center;">
                                <h5>เรียนบนระบบ</h5>
                                <img src="image/ondemand-anywhere.png"  style="width: 150px;">
                            </div>
                        </div> 
                    </div>
                    <hr>
                    <div style="text-align: right;padding-right: 30px;">
                        <div style="font-size: 30px;"><b>'.$characters->Detail[$i]->Price.'</b></div>
                        <a href=\'#\' onclick=\'confirmAdd("'.$characters->Detail[$i]->ID.'")\'>
                        <button class="btn btn-danger" style="border-radius: 20px;"><i class="fa fa-shopping-cart"></i> เพิ่มลงรถเข็น</button>
                        </a>
                    </div>
                    <br>
                </div>
            </div>';
            echo '<!-- จ่ายเงิน end  -->
            <!-- รูป และชื่อคอร์ส -->
        <div class="container main-first" >
            <div class="float-left responsive" >
            
            </div>
            <div class="float-right responsive" id=\'dtp-ni\'>
                <div class="card" style="width: 28rem;border-color: aliceblue;">
                    <div style="font-size: 20px;padding: 20px 20px 0px 20px;">
                        <h4>'.$characters->Detail[$i]->Name.'</h4>
                        <p>รหัส : '.$characters->Detail[$i]->ID.'</p>
                    </div>
                    <br>
                </div>
                <div style="text-align: center;">
                    <i class="fa fa-clock-o fa-3x"></i><br>ความยาววีดิโอ<br><b>'.$characters->Detail[$i]->Hour.' ชั่วโมง</b>
                </div>
            </div>
            <!-- รูป และชื่อคอร์ส end -->
        </div>';
    ?>
    </div>
</body>

</html>