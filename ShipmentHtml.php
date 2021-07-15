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
		<form action="ShipmentHtml.php" method="GET">
			<div class="row">
				<label for="rname">Receiver Name</label>
				<input type="text" id="fname" name="receiverName" placeholder="Name" required>
			</div>
			<div class="row">
				<label for="rPhoneNum">Receiver Phone Number</label>
				<input type="text" id="rPhoneNum" name="receiverPhoneNum" onkeypress="return onlyNumberKey(event)" placeholder="Phone number (e.g : 61234567)" pattern="[0-9]{8}" required>
			</div>
			<div class="row">
				<label for="location">Location</label>
				<select id="location" name="location" required>

					<?php
					require_once('connectDB.php');
					$sql = "SELECT * FROM Location";
					$rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));
					if (mysqli_num_rows($rs) > 0) {
						for ($i = 0; $i < mysqli_num_rows($rs); $i++) {
							$rc = mysqli_fetch_assoc($rs);
							$dbLocationID = $rc['locationID'];
							$dbLocationName = $rc['locationName'];
							echo "<option value='$dbLocationID'>$dbLocationName</option>";
						}
					}
					?>

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
					<button type="submit" name="shipmentFormSubmit" class="registerbtn">Create delivery request</button>
				</div>
			</center>
		</form>
	</div>

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

if (isset($_GET['shipmentFormSubmit'])) {
	$inputReceiverName = $_GET['receiverName'];
	$inputReceiverPhone = $_GET['receiverPhoneNum'];
	$inputLocationID = $_GET['location'];
	$inputAddress = $_GET['receiverAddress'];
	$cusEmail = $_SESSION['customerEmail'];
	$dateTime = date("Y-m-d h:i:s");

	// echo "<script type='text/javascript'>
	//         alert('yoyoyo | $inputReceiverName | $inputReceiverPhone | $inputLocationID | $inputAddress | $cusEmail | $dateTime');
			
	//         </script>";

	require_once('connectDB.php');

	$sql = "INSERT INTO airwaybill (customerEmail, locationID, date, receiverName, receiverPhoneNumber, receiverAddress)
	VALUES ('$cusEmail', '$inputLocationID', '$dateTime', '$inputReceiverName', '$inputReceiverPhone', '$inputAddress')";

	$last_id = "";

	if (mysqli_query($conn, $sql)) {
		$last_id = mysqli_insert_id($conn);
	} else {
		echo "<script type='text/javascript'>
	        alert('Error: $sql <br> mysqli_error($conn)');
	        </script>";
	}

	//airWaybillDeliveryRecordID(auto)	airWaybillNo	deliveryStatusID	recordDateTime	currentLocation

	$sql = "INSERT INTO airwaybilldeliveryrecord (airWaybillNo, deliveryStatusID, recordDateTime)
	VALUES ('$last_id', 1, '$dateTime')";

	if ($conn->query($sql) === TRUE) {
		echo "<script type='text/javascript'>
	        alert('Inserted');
	        </script>";
	} else {
		echo "<script type='text/javascript'>
	        alert('Error: $sql <br> mysqli_error($conn)');
	        </script>";
	}

	mysqli_close($conn);

	echo "<script type='text/javascript'>window.location.href = 'ShipmentHtml.php';</script>";
}

?>