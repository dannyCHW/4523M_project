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

        .deletebtn{
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
        $(document).ready(function () {
            $('#icon').click(function () {
                $('ul').toggleClass('show');
            });
        });
    </script>
</head>


<body>
    <?php include 'menu.php';?>

    </br>

    <div class="profile_container">

        <center>

            <h1 class="r_text">Update your profile</h1>
            <p class="r_text">Fill in this form and submit if you need to update your profile.</p>
            <hr>

            <form>

                <label>Name: </label><br>
                <input type="text" class="p_input" id="name" name="name" placeholder="John">
                <input type="checkbox" id="name_check" name="name_check" value="name_check">
                <br>

                <label>Phone: </label><br>
                <input type="text" class="p_input" id="phoneNumber" name="phoneNumber" placeholder="852-12345678">
                <input type="checkbox" id="phone_check" name="phone_check" value="phone_check">
                <br>

                <label>Address: </label><br>
                <input type="text" class="p_input" id="address" name="address"
                    placeholder="fake address, xxxxxxxx,xxxxxxx,xxxx">
                <input type="checkbox" id="address_check" name="address_check" value="address_check">
                <br>

                <label>New Password: </label><br>
                <input type="password" class="p_input" id="password" name="password" placeholder="new password">
                <input type="checkbox" id="address_check" name="address_check" value="address_check">
                <br>

                <br>

        </center>

        <center>
            <label>Enter current Password: </label>
            <input type="password" class="p_input" id="currentPwd" name="currentPwd" placeholder="Enter current Password">
            <button type="submit" class="Updatebtn">Update profile</button>
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