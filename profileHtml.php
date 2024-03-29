<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Profile Page</title>
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
            border: 3px solid #6B13D1;
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

    if ($isLogin) {
        include 'loginedMenu.php';
    } else {
        echo "<script type='text/javascript'>
            alert('Login First');
            window.location.href = 'indexHtml.php';
            </script>";
    }

    ?>

    </br>

    <div class="profile_container">

        <center>

            <h1 class="r_text">Update your profile</h1>
            <p class="r_text">Fill in this form and submit if you need to update your profile.</p>
            <hr>

            <form action="profileHtml.php" id="profileForm" method="POST">

                <label>Name: </label><br>
                <input type="text" class="p_input" id="name" name="name" disabled>
                <input type="checkbox" id="name_check" value="name_check" onclick="EnableDisableTextBox(this, 'name')">
                <br>

                <label>Phone: </label><br>
                <input type="text" class="p_input" id="phoneNumber" name="phoneNumber" onkeypress="return onlyNumberKey(event)" pattern="[0-9]{4}[0-9]{4}" title="Number, Format : xxxxxxxx" disabled>
                <input type="checkbox" id="phone_check" value="phone_check" onclick="EnableDisableTextBox(this, 'phoneNumber')">
                <br>

                <label>Address: </label><br>
                <input type="text" class="p_input" id="address" name="address" disabled>
                <input type="checkbox" id="address_check" value="address_check" onclick="EnableDisableTextBox(this, 'address')">
                <br>

                <label>New Password: </label><br>
                <input type="password" class="p_input" id="password" name="npassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" disabled>
                <input type="checkbox" id="address_check" value="address_check" onclick="EnableDisableTextBox(this, 'password')">
                <br>

                <br>

        </center>

        <center>
            <label>Enter current Password: </label>
            <input type="password" class="p_input" id="currentPwd" name="currentPwd" placeholder="Enter current Password" required>
            <button type="submit" form="profileForm" name="submit" class="Updatebtn">Update profile</button>
        </center>

        </form>

        <hr>

        <center>

            <h1 class="r_text">Delete Account</h1>
            <p class="r_text">Click the button if you need to delete your account.</p>
            <button onclick="location.href='deleteAccountHtml.php';" class="deletebtn">Delete Account</button>
            <hr>

        </center>
    </div>

    </form>




</body>

</html>

<script>
    function EnableDisableTextBox(name_check, id) {
        var txtBox = document.getElementById(id);
        txtBox.disabled = name_check.checked ? false : true;
        if (!txtBox.disabled) {
            txtBox.focus();
        }
    }

    function onlyNumberKey(evt) {

        // Only ASCII character in that range allowed
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
    }
</script>


<?php

$cusEmail = $_SESSION['customerEmail'];
$cusName = $_SESSION['customerName'];
$dbphoneNum = "";
$dbAddress = "";
$dbcurrentPwd = "";

require_once('connectDB.php');
$sql = "SELECT * FROM customer WHERE customerEmail='$cusEmail'";
$rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));

if (mysqli_num_rows($rs) > 0) {
    $rc = mysqli_fetch_assoc($rs);
    $nonSessionCusName = $rc['customerName'];
    $dbphoneNum = $rc['phoneNumber'];
    $dbAddress = $rc['address'];
    $dbcurrentPwd = $rc['customerPassword'];
}



echo "<script>
    document.getElementById('name').value = '$nonSessionCusName';
    document.getElementById('phoneNumber').value = '$dbphoneNum';
    document.getElementById('address').value = '$dbAddress';
	 </script>";

?>


<?php

if (isset($_POST['submit'])) {
    $inputName = $_POST['name'];
    $inputPhone = $_POST['phoneNumber'];
    $inputAddress = $_POST['address'];
    $inputNewPwd = $_POST['npassword'];
    $inputCurPwd = $_POST['currentPwd'];


    //echo "<script>
    //alert('$inputName | $inputPhone | $inputAddress | $inputNewPwd | $inputCurPwd | $dbcurrentPwd');
	// </script>";

    if ($inputCurPwd != $dbcurrentPwd) {
        echo "<script>
        alert('Wrong password');
	     </script>";
    } else if (empty($inputName) && empty($inputPhone) && empty($inputAddress) && empty($inputNewPwd)) {
        echo "<script>
        alert('You did not select any checkbox.');
         </script>";
    } else {

        require_once('connectDB.php');

        if (empty($inputName) != true && empty($inputPhone) && empty($inputAddress) && empty($inputNewPwd)) {
            //only name

            $sqlName = "UPDATE customer SET customerName = '$inputName' WHERE customerEmail = '$cusEmail';";

            if (mysqli_query($conn, $sqlName)) {
                echo "<script type='text/javascript'>
                alert('Updated, re login to see the changes.');
            window.location.href = 'profileHtml.php';
            </script>";
            } else {
                echo "<script type='text/javascript'>
            alert('Error:  . $sqlName . <br> . $conn->error');
            </script>";
            }
        } else if (empty($inputName) && !empty($inputPhone) && empty($inputAddress) && empty($inputNewPwd)) {
            //only phone

            $sql = "UPDATE customer SET phoneNumber = '$inputPhone' WHERE customerEmail = '$cusEmail';";

            if (mysqli_query($conn, $sql)) {
                echo "<script type='text/javascript'>
                alert('Updated, re login to see the changes.');
            window.location.href = 'profileHtml.php';
            </script>";
            } else {
                echo "<script type='text/javascript'>
            alert('Error:  . $sql . <br> . $conn->error');
            </script>";
            }
        } else if (empty($inputName) && empty($inputPhone) && !empty($inputAddress) && empty($inputNewPwd)) {
            //only address

            $sql = "UPDATE customer SET address = '$inputAddress' WHERE customerEmail = '$cusEmail';";

            if (mysqli_query($conn, $sql)) {
                echo "<script type='text/javascript'>
                alert('Updated, re login to see the changes.');
            window.location.href = 'profileHtml.php';
            </script>";
            } else {
                echo "<script type='text/javascript'>
            alert('Error:  . $sql . <br> . $conn->error');
            </script>";
            }
        } else if (empty($inputName) && empty($inputPhone) && empty($inputAddress) && !empty($inputNewPwd)) {
            //only password

            $sql = "UPDATE customer SET customerPassword = '$inputNewPwd' WHERE customerEmail = '$cusEmail';";

            if (mysqli_query($conn, $sql)) {
                echo "<script type='text/javascript'>
                alert('Updated, re login to see the changes.');
            window.location.href = 'profileHtml.php';
            </script>";
            } else {
                echo "<script type='text/javascript'>
            alert('Error:  . $sql . <br> . $conn->error');
            </script>";
            }
        } else if (!empty($inputName) && !empty($inputPhone) && !empty($inputAddress) && !empty($inputNewPwd)) {
            //all

            $sql = "UPDATE customer SET customerPassword = '$inputNewPwd', address = '$inputAddress', phoneNumber = '$inputPhone', customerName = '$inputName'WHERE customerEmail = '$cusEmail';";

            if (mysqli_query($conn, $sql)) {
                echo "<script type='text/javascript'>
                alert('Updated, re login to see the changes.');
            window.location.href = 'profileHtml.php';
            </script>";
            } else {
                echo "<script type='text/javascript'>
            alert('Error:  . $sql . <br> . $conn->error');
            </script>";
            }
        } else if (!empty($inputName) && !empty($inputPhone) && !empty($inputAddress) && empty($inputNewPwd)) {
            //name, phone, address

            $sql = "UPDATE customer SET customerName = '$inputName', phoneNumber = '$inputPhone', address = '$inputAddress' WHERE customerEmail = '$cusEmail';";

            if (mysqli_query($conn, $sql)) {
                echo "<script type='text/javascript'>
                alert('Updated, re login to see the changes.');
            window.location.href = 'profileHtml.php';
            </script>";
            } else {
                echo "<script type='text/javascript'>
            alert('Error:  . $sql . <br> . $conn->error');
            </script>";
            }
        } else if (!empty($inputName) && !empty($inputPhone) && empty($inputAddress) && empty($inputNewPwd)) {
            //name, phone

            $sql = "UPDATE customer SET customerName = '$inputName', phoneNumber = '$inputPhone' WHERE customerEmail = '$cusEmail';";

            if (mysqli_query($conn, $sql)) {
                echo "<script type='text/javascript'>
                alert('Updated, re login to see the changes.');
            window.location.href = 'profileHtml.php';
            </script>";
            } else {
                echo "<script type='text/javascript'>
            alert('Error:  . $sql . <br> . $conn->error');
            </script>";
            }
        } else if (empty($inputName) && !empty($inputPhone) && !empty($inputAddress) && !empty($inputNewPwd)) {
            //phone, address, password

            $sql = "UPDATE customer SET customerName = '$inputName', phoneNumber = '$inputPhone', address = '$inputAddress', customerPassword = '$inputNewPwd' WHERE customerEmail = '$cusEmail';";

            if (mysqli_query($conn, $sql)) {
                echo "<script type='text/javascript'>
                alert('Updated, re login to see the changes.');
            window.location.href = 'profileHtml.php';
            </script>";
            } else {
                echo "<script type='text/javascript'>
            alert('Error:  . $sql . <br> . $conn->error');
            </script>";
            }
        } else if (empty($inputName) && empty($inputPhone) && !empty($inputAddress) && !empty($inputNewPwd)) {
            //address, password

            $sql = "UPDATE customer SET customerPassword = '$inputNewPwd', address = '$inputAddress' WHERE customerEmail = '$cusEmail';";

            if (mysqli_query($conn, $sql)) {
                echo "<script type='text/javascript'>
                alert('Updated, re login to see the changes.');
            window.location.href = 'profileHtml.php';
            </script>";
            } else {
                echo "<script type='text/javascript'>
            alert('Error:  . $sql . <br> . $conn->error');
            </script>";
            }
        } else if (!empty($inputName) && empty($inputPhone) && !empty($inputAddress) && empty($inputNewPwd)) {
            //name, address

            $sql = "UPDATE customer SET address = '$inputAddress', customerName = '$inputName'WHERE customerEmail = '$cusEmail';";

            if (mysqli_query($conn, $sql)) {
                echo "<script type='text/javascript'>
                alert('Updated, re login to see the changes.');
            window.location.href = 'profileHtml.php';
            </script>";
            } else {
                echo "<script type='text/javascript'>
            alert('Error:  . $sql . <br> . $conn->error');
            </script>";
            }
        } else if (!empty($inputName) && empty($inputPhone) && empty($inputAddress) && !empty($inputNewPwd)) {
            //name, password

            $sql = "UPDATE customer SET customerPassword = '$inputNewPwd', customerName = '$inputName'WHERE customerEmail = '$cusEmail';";

            if (mysqli_query($conn, $sql)) {
                echo "<script type='text/javascript'>
                alert('Updated, re login to see the changes.');
            window.location.href = 'profileHtml.php';
            </script>";
            } else {
                echo "<script type='text/javascript'>
            alert('Error:  . $sql . <br> . $conn->error');
            </script>";
            }
        } else if (empty($inputName) && !empty($inputPhone) && !empty($inputAddress) && empty($inputNewPwd)) {
            //phone, address

            $sql = "UPDATE customer SET  address = '$inputAddress', phoneNumber = '$inputPhone' WHERE customerEmail = '$cusEmail';";

            if (mysqli_query($conn, $sql)) {
                echo "<script type='text/javascript'>
                alert('Updated, re login to see the changes.');
            window.location.href = 'profileHtml.php';
            </script>";
            } else {
                echo "<script type='text/javascript'>
            alert('Error:  . $sql . <br> . $conn->error');
            </script>";
            }
        } else if (empty($inputName) && !empty($inputPhone) && empty($inputAddress) && !empty($inputNewPwd)) {
            //phone, password

            $sql = "UPDATE customer SET customerPassword = '$inputNewPwd', phoneNumber = '$inputPhone' WHERE customerEmail = '$cusEmail';";

            if (mysqli_query($conn, $sql)) {
                echo "<script type='text/javascript'>
                alert('Updated, re login to see the changes.');
            window.location.href = 'profileHtml.php';
            </script>";
            } else {
                echo "<script type='text/javascript'>
            alert('Error:  . $sql . <br> . $conn->error');
            </script>";
            }
        } else if (!empty($inputName) && empty($inputPhone) && !empty($inputAddress) && !empty($inputNewPwd)) {
            //name, address, password

            $sql = "UPDATE customer SET customerPassword = '$inputNewPwd', address = '$inputAddress', customerName = '$inputName' WHERE customerEmail = '$cusEmail';";

            if (mysqli_query($conn, $sql)) {
                echo "<script type='text/javascript'>
                alert('Updated, re login to see the changes.');
            window.location.href = 'profileHtml.php';
            </script>";
            } else {
                echo "<script type='text/javascript'>
            alert('Error:  . $sql . <br> . $conn->error');
            </script>";
            }
        } else if (!empty($inputName) && !empty($inputPhone) && empty($inputAddress) && !empty($inputNewPwd)) {
            //name, phone, password

            $sql = "UPDATE customer SET customerPassword = '$inputNewPwd', phoneNumber = '$inputPhone', customerName = '$inputName'WHERE customerEmail = '$cusEmail';";

            if (mysqli_query($conn, $sql)) {
                echo "<script type='text/javascript'>
            alert('Updated, re login to see the changes.');
            window.location.href = 'profileHtml.php';
            </script>";
            } else {
                echo "<script type='text/javascript'>
            alert('Error:  . $sql . <br> . $conn->error');
            </script>";
            }
        }

        $conn->close();
    }
}


?>