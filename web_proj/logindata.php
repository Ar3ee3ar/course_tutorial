<?php
    session_start();
    require('connect.php');
    if (isset($_REQUEST['m_username']) and isset($_REQUEST['m_password'])){
	
        // Assigning POST values to variables.
        $m_username = $_REQUEST['m_username'];
        $m_password = $_REQUEST['m_password'];

        // CHECK FOR THE RECORD FROM TABLE
        $query = "SELECT * FROM `member` WHERE m_username='$m_username' and m_password='$m_password'";
 
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        $count = mysqli_num_rows($result);

        if ($count == 1){
            $_SESSION["m_username"] = $m_username;
            echo '<script>
            var str = new String("Welcome");
            alert( " Welcome \n'. $m_username .'");
            window.location.href="shop/listcost_page.php";
            </script>';

        }else{
            echo '<script>
            var str = new String("Sign In Error");
            alert("Sign In Error\nSorry, your username or password is incorrect\n Please try again");
            window.location.href="index.html";
            </script>';
        }
    }
    else{
        echo "ppppppppppppppppppppp";
    }
?>