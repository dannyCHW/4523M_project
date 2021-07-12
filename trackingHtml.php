<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>First Page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/trackingStyle.css">
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
	
<?php include 'checkLoginSession.php'; ?>

<?php

if ($isLogin) {
	include 'loginedMenu.php';
} else {
	include 'menu.php';
}

?>

	</br></br>
	<center>
		<h1 class="r_text">Track your delivery request</h1>
		<p class="r_text">Please enter Air Waybill Number to Create the delivery request.</p>

		<form>
			<input type="text" class="ts_input" name="track" placeholder="Track..">
			<button type="submit" class="trackbtn">Track Now</button>
		</form>

		</br>
		<hr>
	</center>

	<center>
		<div class="main">
			<form onsubmit="myFunction()">
				<div class="container">
					<h1 class="r_text">Result</h1>
					<p class="r_text">Delivery Request info</p>
					<hr>
					<br>

					<label for="airwaybillNum">Air Waybill’s Number</label>
					<input type="text" class="t_output" placeholder="1012345678" name="airwaybillNum" id="airwaybillNum"
						readonly>

					</br>
					</br>
					<label for="recordDatetime">Record’s Datetime</label>
					<input type="text" class="t_output" placeholder="2021/4/5 14:00:34" name="recordDatetime"
						id="recordDatetime" readonly>

					</br>
					</br>
					<label for="senderName">Sender’s Name</label>
					<input type="text" class="t_output" placeholder="Mr. sender" name="senderName" id="senderName"
						readonly>

					</br>
					</br>
					<label for="receiverPhoneNumber">Receiver’s Phone Number</label>
					<input type="text" class="t_output" placeholder="852-61453728" name="receiverPhoneNumber"
						id="receiverPhoneNumber" readonly>

					</br>
					</br>
					<label for="parcelWeight">Parcel’s Weight(kg)</label>
					<input type="text" class="t_output" placeholder="45" name="parcelWeight" id="parcelWeight" readonly>

					</br>
					</br>
					<label for="shipmentStatusName">Shipment Status Name</label>
					<input type="text" class="t_output" placeholder="Delivering" name="shipmentStatusName"
						id="shipmentStatusName" readonly>

					</br>
					</br>
					<label for="currentLocation">Current Location</label>
					<input type="text" class="t_output" placeholder="Hong kong" name="currentLocation"
						id="currentLocation" readonly>


					</br>
					<hr>

				</div>


			</form>
		</div>
	</center>

</body>

</html>