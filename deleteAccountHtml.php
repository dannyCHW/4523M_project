<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>First Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">

    <style>
        .p_input {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
            -webkit-transition: 0.5s;
            transition: 0.5s;
            outline: none;

        }

        .p_input:focus {
            border: 3px solid #d11313;
        }

        .profile_container {
            padding: 5%;
        }

        .Updatebtn {
            background-color: #6B13D1;
            color: white;
            padding: 16px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 20%;
            opacity: 0.9;
        }

        .deletebtn {
            background-color: #d11313;
            color: white;
            padding: 16px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 20%;
            opacity: 0.9;

        }

        .backbtn {
            background-color: #6B13D1;
            color: white;
            padding: 16px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 50%;
            opacity: 0.9;
        }
    </style>

    <script src="http://kit.fontawesome.com/a076d05399.js"></script>
    <script src="http://code.jquery.com/jquery-3.4.1.js"></script>
    <script>
        $(document).ready(function() {
            $('#icon').click(function() {
                $('ul').toggleClass('show');
            });
        });
    </script>
</head>


<body>

    <?php include 'checkLoginSession.php'; ?>

    <?php

    if (!$isLogin) {
        echo "<script type='text/javascript'>window.location.href = 'indexHtml.php';</script>";
    }

    ?>

    <div class="profile_container">

        <form action="deleteAccountHtml.php" method="POST">


            <center>
                <h1 class="r_text">Delete Account</h1>
                <p class="r_text">Are you sure you want to delete your account?<br><br> Please be advised that this procedure cannot be reverse !</p>

                <br>
                <label><b>You are now login as <i><?php $cusName = $_SESSION['customerName'];
                                                    echo "$cusName"; ?></i></b></label>
                <hr>
                <br>

                <label><b><u>I am fully aware of the consequences of this action.</u></b></label>
                <input type="checkbox" id="check" name="consequences_check" value="consequences">
            </center>







            <center>
                <label>Enter Password: </label>
                <input type="password" class="p_input" id="Pswd" name="Pswd" placeholder="Enter Password" required>
                <button type="submit" name="submit" class="deletebtn"><b>Delete Account</b></button>


            </center>

        </form>

    </div>



    <center>
        <br><button class="backbtn" onclick="location.href='profileHtml.php';">Back</button>
    </center>




</body>

</html>

<?php

if (isset($_POST['submit'])) {
    if (empty($_POST['consequences_check'])) {
        echo "<script type='text/javascript'>
	        alert('Check the box to make sure you fully aware of the consequences of this action before continues.');
            window.location.href = 'deleteAccountHtml.php';
	        </script>";
    } else {

        $password;
        require_once('connectDB.php');
        $sql = "SELECT customerPassword FROM customer WHERE customerEmail = '$cusEmail'";
        $rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        if (mysqli_num_rows($rs) > 0) {
            $rc = mysqli_fetch_assoc($rs);
            $password = $rc['customerPassword'];
        }

        if ($_POST['Pswd'] != $password) {
            echo "<script type='text/javascript'>
	        alert('Wrong password.');
            window.location.href = 'deleteAccountHtml.php';
	        </script>";
        } else {

            $airWayBillNumbers;
            $sql = "SELECT airWaybillNo FROM airwaybill WHERE customerEmail = '$cusEmail' ";
            $rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            if (mysqli_num_rows($rs) > 0) {
                for ($i = 0; $i < mysqli_num_rows($rs); $i++) {
                    $rc = mysqli_fetch_assoc($rs);
                    $airWayBillNumbers[$i] = $rc['airWaybillNo'];
                }
            }

            for ($n = 0; $n < count($airWayBillNumbers); $n++) {
                $airNum = $airWayBillNumbers[$n];
                $sql = "DELETE FROM airwaybilldeliveryrecord WHERE airWaybillNo = $airNum";
                mysqli_query($conn, $sql) or die(mysqli_error($conn));
            }

            $sql = "DELETE FROM airwaybill WHERE customerEmail = '$cusEmail' ";
            mysqli_query($conn, $sql) or die(mysqli_error($conn));

            $sql = "DELETE FROM customer WHERE customerEmail = '$cusEmail' ";
            mysqli_query($conn, $sql) or die(mysqli_error($conn));

            session_start();
            if ($_SESSION['customerEmail'] != null) {
                session_unset();     // unset $_SESSION variable for the run-time 
                session_destroy();
            }

            echo "<script type='text/javascript'>
	        alert('account Deleted');
            window.location.href = 'indexHtml.php';
	        </script>";
        }
    }
}


?>