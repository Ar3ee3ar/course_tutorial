<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="style/editpass.css">
    <script src="https://kit.fontawesome.com/48f6528c57.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@500&display=swap" rel="stylesheet">
    <script>
        var httpRequest;
        function checkpassword(){
            httpRequest = new XMLHttpRequest();
            httpRequest.onreadystatechange = showResult;

            var one = document.getElementById("i-newPassword").value;
            var two = document.getElementById("i-passwordAgain").value;
            var url = "check_passw.php?one="+one+"&two="+two;

            httpRequest.open("GET",url);
            httpRequest.send();

            function showResult(){
                var result = httpRequest.responseText;
                if(result=="false"){
                    document.getElementById("check").innerHTML = "password and password again is not the same";
                }
                else if(result=="true"){
                    document.getElementById("check").innerHTML = "";
                }
            }
        }
        function seepass() {
            let x = document.getElementById("i-password");
            let x2 = document.getElementById("i-passwordAgain");
            let x3 = document.getElementById("i-newPassword");
            if (x.type === "password" && x2.type === "password"&& x3.type === "password") {
                x.type = "text";
                x2.type = "text";
                x3.type = "text";
            } else {
                x.type = "password";
                x2.type = "password";
                x3.type = "password";
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
                    <form action="editpass_data.php" method="POST"> 
                        <div class="custom-change">
                            <table class="tb-fix">
                                <tr>
                                    <th>
                                        <a href="editprofile.php" onmouseover="mouse_in4()" onmouseout="mouse_out4()"
                                            id="home4" class="link-home">
                                            แก้ไขข้อมูล
                                        </a>
                                    </th>
                                    <th>
                                        <a href="editpass.php" class="change_color_red">
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
                            <label id="l-password">Old Password</label>
                            <input type="password" name="m_old_password" id="i-password" minlength="8" required><br>
                        </div>
                        <div class="snipped">
                            <label id="l-newPassword">New Password&nbsp</label>
                            <input type="password" name="m_new_password" id="i-newPassword" minlength="8" required><br>
                        </div>
                        <div class="snipped">
                            <label id="l-passwordAgain">Password Again</label>
                            <input type="password" name="PasswordAgain" id="i-passwordAgain" minlength="8" required onblur="checkpassword()"><br>
                        </div>
                        <div class="show-password">
                            <input type="checkbox" onclick="seepass()" class="checkbox1"><label class="lb-con">Show
                                Password</label>
                        </div>
                        <div class="snipped change_color_red">
                            <label id="check"></label>
                        </div>
                        <div>
                            <a href="" type="submit">
                                <button class="botton1" type="submit" value="ยืนยัน">ยืนยัน</button><br>
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