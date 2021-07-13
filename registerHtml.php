<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Register</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="http://kit.fontawesome.com/a076d05399.js"></script>
	<script src="http://code.jquery.com/jquery-3.4.1.js"></script>
	<link rel="stylesheet" href="css/style.css">
	<script>
		$(document).ready(function() {
			$('#icon').click(function() {
				$('ul').toggleClass('show');
			});
		});
	</script>
</head>


<body>
	<?php include 'menu.php'; ?>

	</br></br></br>
	<center>
		<div class="main">
			<form action="registerHtml.php" method="POST">
				<div class="container">
					<h1 class="r_text">Register</h1>
					<p class="r_text">Please fill in this form to create an account.</p>
					<hr>

					<label for="email"><b></b></label>
					<input type="text" placeholder="Email (eg. characters@characters.domain)" name="email" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="following order: characters@characters.domain" required>

					<br>
					<label for="Name"><b></b></label>
					<input type="text" placeholder="Name (Your name)" name="name" id="name" required>

					<br>
					<label for="Phone Number"><b></b></label>
					<input type="text" placeholder="Phone Number (eg. 61234578)" name="phoneNum" id="phoneNum" onkeypress="return onlyNumberKey(event)" pattern="[0-9]{4}[0-9]{4}" title="Number, Format : xxx-xxxx-xxxx" required>

					<br>
					<label for="address"><b></b></label>
					<input type="text" placeholder="Address (eg. HK, NT, xx Road, xx Building, 14/Floor, 1405 Room)" name="address" id="address" required>

					<br>
					<label for="psw"><b></b></label>
					<input type="password" placeholder="Password (eg. C123456a)" name="psw" id="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" required>

					<br>
					<label for="psw-repeat"><b></b></label>
					<input type="password" placeholder="Repeat Password (Needs to the same as above)" name="psw_repeat" id="psw_repeat" required>
					<hr>

					<p>By creating an account means that you agree to our <a href="#">Terms & Privacy</a>.</p>
					<button type="submit" class="registerbtn" name="registerFormSubmit">Register</button>
				</div>


			</form>
		</div>
	</center>


</body>

</html>

<script>
	function onlyNumberKey(evt) {

		// Only ASCII character in that range allowed
		var ASCIICode = (evt.which) ? evt.which : evt.keyCode
		if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
			return false;
		return true;
	}
</script>


<?php

if (isset($_POST['registerFormSubmit'])) {
	$email = $_POST['email'];
	$name = $_POST['name'];
	$password = $_POST['psw'];
	$rePwd = $_POST['psw_repeat'];
	$date = date("Y-m-d");
	$phone = $_POST['phoneNum'];
	$address = $_POST['address'];

	// echo "<script type='text/javascript'>
	//         alert('hi $email, $name, $pwd, $rePwd, $date, $phone, $address');
	//         </script>";



	if ($password != $rePwd) {

		echo "<script type='text/javascript'>
            alert('Password and repeat password does not match.');
            </script>";
	} else {

		require_once('connectDB.php');

		$sql = "SELECT customerEmail FROM customer WHERE customerEmail='$email'";
		$rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));
		if (mysqli_num_rows($rs) > 0) {
			echo "<script type='text/javascript'>
        	alert('Invaild! User already exist.');
        	</script>";
		} else {

			$sql = "INSERT INTO Customer (customerEmail, customerName, customerPassword, accountCreationDate, phoneNumber, address)
			VALUES ('$email', '$name', '$password', '$date', '$phone', '$address')";

			if ($conn->query($sql) === TRUE) {

				echo "<script type='text/javascript'>
            alert('Account cearted');
			window.location.href = 'loginHtml.php';
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