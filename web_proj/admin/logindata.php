<?php
    session_start();
    require('../connect.php');
    if (isset($_REQUEST['m_username']) and isset($_REQUEST['m_password'])){
	
        // Assigning POST values to variables.
        $m_username = $_REQUEST['m_username'];
        $m_password = $_REQUEST['m_password'];

        // CHECK FOR THE RECORD FROM TABLE
        $query = "SELECT * FROM `admin` WHERE admin_username='$m_username' and admin_password='$m_password'";
 
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        $count = mysqli_num_rows($result);

        if ($count == 1){
            $_SESSION["admin_username"] = $m_username;
            echo '<script>
            var str = new String("Welcome");
            alert( " Welcome \n Admin:'. $m_username .'");
            window.location.href="listcost_page.php";
            </script>';

        }else{
            echo '<script>
            var str = new String("Sign In Error");
            alert("Sign In Error\nSorry, your username or password is incorrect\n Please try again");
            window.location.href="../admin/index.html";
            </script>';
        }
    }
    else{
        echo "ppppppppppppppppppppp";
    }
?>