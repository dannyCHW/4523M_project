<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Shipment Page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/shipmentStyle.css">
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
		include 'menu.php';
	}

	?>

	<!-- required input from customer : location, receiverName, receiverPhoneNum, receiverAddress, weight -->

	</br></br></br>
	<center>
		<h1 class="r_text">Create the delivery request</h1>
		<p class="r_text">Please fill in this form to Create the delivery request.</p>
	</center>

	<div class="container">
		<h1>Shipment Info</h1>
		<hr></br>
		<form action="/action_page.php">
			<div class="row">
				<label for="rname">Receiver Name</label>
				<input type="text" id="fname" name="receiverName" placeholder="Name" required>
			</div>
			<div class="row">
				<label for="rPhoneNum">Receiver Phone Number</label>
				<input type="text" id="rPhoneNum" name="receiverPhoneNum" placeholder="852-12345678" pattern="[0-9]{3}-[0-9]{8}" required>
			</div>
			<div class="row">
				<label for="location">Location</label>
				<select id="location" name="location" required>
					<option value="australia">Australia</option>
				</select>
			</div>
			</br>
			<div class="row">

				<label for="receiverAddress">Address</label>
				<textarea id="receiverAddress" name="receiverAddress" placeholder="please fill in the receiver address.." style="height:50px" required></textarea>

			</div>

			</br>
			<center>
				<div class="row">
					<button type="submit" class="registerbtn">Create delivery request</button>
				</div>
			</center>
		</form>
	</div>

</body>


</html>