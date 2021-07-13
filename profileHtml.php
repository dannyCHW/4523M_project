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
                <input type="text" class="p_input" id="phoneNumber" name="phoneNumber" disabled>
                <input type="checkbox" id="phone_check" value="phone_check" onclick="EnableDisableTextBox(this, 'phoneNumber')">
                <br>

                <label>Address: </label><br>
                <input type="text" class="p_input" id="address" name="address" disabled>
                <input type="checkbox" id="address_check" value="address_check" onclick="EnableDisableTextBox(this, 'address')">
                <br>

                <label>New Password: </label><br>
                <input type="password" class="p_input" id="password" name="npassword" disabled>
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
            <p class="r_text">Click the button if you need to delete your profile.</p>
            <button onclick="location.href='deleteAccount.html';" class="deletebtn">Delete Account</button>
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
    $dbphoneNum = $rc['phoneNumber'];
    $dbAddress = $rc['address'];
    $dbcurrentPwd = $rc['customerPassword'];
}

$conn->close();

echo "<script>
    document.getElementById('name').value = '$cusName';
    document.getElementById('phoneNumber').value = '$dbphoneNum';
    document.getElementById('address').value = '$dbAddress';
	 </script>";

?>


<?php

if(isset($_POST['submit'])){
    $inputName = $_POST['name'];
    $inputPhone = $_POST['phoneNumber'];
    $inputAddress = $_POST['address'];
    $inputNewPwd = $_POST['npassword'];
    $inputCurPwd = $_POST['currentPwd'];

    // if(empty($inputName)){

    // }
    echo "<script>
    alert('$inputName | $inputPhone | $inputAddress');
	 </script>";
}


?>