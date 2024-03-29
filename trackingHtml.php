<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Tracking Page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/trackingStyle.css">
	<script src="http://kit.fontawesome.com/a076d05399.js"></script>
	<script src="http://code.jquery.com/jquery-3.4.1.js"></script>
	<script>
		$(document).ready(function() {
			$('#icon').click(function() {
				$('ul').toggleClass('show');
			});
		});
	</script>

	<style>
		table {
			font-family: arial, sans-serif;
			border-collapse: collapse;
			width: 100%;
		}

		td,
		th {
			border: 1px solid #dddddd;
			text-align: left;
			padding: 8px;
		}

		tr:nth-child(even) {
			background-color: #dddddd;
		}

		#airWayBill {
			font-family: Arial, Helvetica, sans-serif;
			border-collapse: collapse;
			width: 100%;
		}

		#airWayBill td,
		#airWayBill th {
			border: 1px solid #ddd;
			padding: 8px;
		}

		#airWayBill tr:nth-child(even) {
			background-color: #f2f2f2;
		}

		#airWayBill tr:hover {
			background-color: #ddd;
		}

		#airWayBill th {
			padding-top: 12px;
			padding-bottom: 12px;
			text-align: left;
			background-color: #04AA6D;
			color: white;
		}
	</style>
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
		<p class="r_text"></p>

		</br>
		<hr>
	</center>

	<center>
		<div class="main">

				<?php


				// airWaybillNo	
				// customerEmail	
				// staffID	
				// locationID	
				// date	
				// receiverName	
				// receiverPhoneNumber	
				// receiverAddress	
				// weight	
				// totalPrice

				require_once('connectDB.php');

				$status;

				$sql0 = "SELECT * FROM deliverystatus";
				$rsDelivery = mysqli_query($conn, $sql0) or die(mysqli_error($conn));
				if (mysqli_num_rows($rsDelivery) > 0) {
					for ($row = 0; $row < mysqli_num_rows($rsDelivery); $row++) {
						$rcD = mysqli_fetch_assoc($rsDelivery);
						$status[$row][0] = $rcD['deliveryStatusID'];
						$status[$row][1] = $rcD['deliveryStatusName'];
					}
				}



				$sql1 = "SELECT * FROM airwaybill WHERE customerEmail = '$cusEmail' ORDER BY date DESC";
				$rs1 = mysqli_query($conn, $sql1) or die(mysqli_error($conn));
				if (mysqli_num_rows($rs1) > 0) {
					for ($i1 = 0; $i1 < mysqli_num_rows($rs1); $i1++) {
						$rc = mysqli_fetch_assoc($rs1);

						$displayAirWaybillNo = $rc['airWaybillNo'];
						$displayRecordDatetime = $rc['date'];
						$displaySenderName = $_SESSION['customerName'];
						$displayReceiverName = $rc['receiverName'];
						$displayReceiverPhoneNumber = $rc['receiverPhoneNumber'];
						$displayParcelWeight = $rc['weight'];

						echo "<div class='container'>";

						echo "<table id='airWayBill'>";

						echo "<tr>
						 <th>AirWaybillNo</th>
						 <th>RecordDatetime</th>
						 <th>SenderName</th>
						 <th>ReceiverName</th>
						 <th>ReceiverPhoneNumber</th>
						 <th>ParcelWeight</th>
						 </tr></br>";

						echo "<tr>
						 <td>$displayAirWaybillNo</td>
						 <td>$displayRecordDatetime</td>
						 <td>$displaySenderName</td>
						 <td>$displayReceiverName</td>
						 <td>$displayReceiverPhoneNumber</td>
						 <td>$displayParcelWeight</td>
						 </tr></br>";

						echo "</table></br>";

						$sql2 = "SELECT airWaybillDeliveryRecordID,deliveryStatusID,recordDateTime,currentLocation FROM airwaybilldeliveryrecord WHERE airWaybillNo = $displayAirWaybillNo ORDER BY recordDateTime DESC";
						$rs2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
						if (mysqli_num_rows($rs2) >= 1) {
							for ($i2 = 0; $i2 < mysqli_num_rows($rs2); $i2++) {
								$rc2 = mysqli_fetch_assoc($rs2);

								$idOfdeliveryStatus = $rc2['deliveryStatusID'];
								$displayRecordDateTime = $rc2['recordDateTime'];
								$displayCurrentLocation	= $rc2['currentLocation'];

								$displayDeliveryStatusName;
								for ($rows = 0; $rows < count($status); $rows++) {
									if ($idOfdeliveryStatus == $status[$rows][0]) {
										$displayDeliveryStatusName = $status[$rows][1];
									}
								}

								echo "<table>";

								echo "<tr>
								<th>DeliveryStatusName</th>
								<th>RecordDateTime</th>
								<th>CurrentLocation</th>
								</tr>";

								echo "<tr>
								<td>$displayDeliveryStatusName</td>
								<td>$displayRecordDateTime</td>
								<td>$displayCurrentLocation</td>
								</tr>";

								echo "</table></br>";
							}
						}

						echo "</div>";
					}
				}

				?>

		</div>
	</center>

</body>

</html>