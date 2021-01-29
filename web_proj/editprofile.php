<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="style/editprofile.css">
    <script src="https://kit.fontawesome.com/48f6528c57.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@500&display=swap" rel="stylesheet">
    <script>
        function seepass() {
            let x = document.getElementById("i-password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
        function mouse_in1() {
            let y = document.getElementById("home")
            y.className = "change_color_red";
        }
        function mouse_out1() {
            let y = document.getElementById("home")
            y.className = "change_color_black";
        }

        function mouse_in2() {
            let y = document.getElementById("home2")
            y.className = "change_color_red";
        }
        function mouse_out2() {
            let y = document.getElementById("home2")
            y.className = "change_color_black";
        }
        function mouse_in4() {
            let y = document.getElementById("home4")
            y.className = "change_color_red";
        }
        function mouse_out4() {
            let y = document.getElementById("home4")
            y.className = "change_color_black";
        }
    </script>
</head>
<?php
  session_start();
  require 'connect.php';
  $m_username = $_SESSION["m_username"];
  $meSql = 'SELECT * FROM `member` WHERE m_username="'.$m_username.'"';
  $meQuery = mysqli_query($conn,$meSql);
  $meResult = mysqli_fetch_array($meQuery)
?>
<body>

    <header class="login-header" id="header">
        <div>
            <a href="shop\listcost_page.php" onmouseover="mouse_in1()" onmouseout="mouse_out1()" id="home" class="link-home">Home&nbsp<i
                    class="fas fa-home">&nbsp</i></a><b>|</b>
            <a href="" onmouseover="mouse_in2()" onmouseout="mouse_out2()" id="home2" class="link-home">Logout
                <i class="fas fa-sign-out-alt"></i>
            </a>
        </div>
    </header>

    <section class="section">
        <article>
            <div class="bg-color-white">
                <div class="block_container">
                    <form action="editprofile_data.php" method="post">
                        <div class="custom-change">
                            <table class="tb-fix">
                                <tr>
                                    <th>
                                        <a href="editprofile.php" class="change_color_red" id="home3">
                                            แก้ไขข้อมูล
                                        </a>
                                    </th>
                                    <th>
                                        <a href="editpass.php" onmouseover="mouse_in4()" onmouseout="mouse_out4()" id="home4"
                                            class="link-home">
                                            เปลี่ยนรหัสผ่าน
                                        </a>
                                    </th>
                                </tr>
                            </table>
                        </div>
                        <div class="user-name">
                            <label>User Name : <?php echo $meResult["m_username"];?></label>
                        </div>
                        <div class="snipped">
                            <label id="l-name">Name</label>
                            <input type="text" name="m_name" id="i-name" required value="<?php echo $meResult["m_name"];?>"><br>
                        </div>
                        <div>
                            <a href="" type="submit">
                                <button class="botton1" value="ยืนยัน">ยืนยัน</button><br>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </article>
    </section>

    <footer>
        <div class="div-footer">
            <table>
                <tr>
                    <td class="td-1">
                        <img src="img/ondemand-logo1.png" width="190px" height="50px">
                    </td>
                    <td>
                        <label class="td-2">
                            Contact<br>
                        </label>
                        <label class="td-2">
                            089-999-9999
                        </label>
                    </td>
                </tr>
            </table>
        </div>
    </footer>
</body>

</html>