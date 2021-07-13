<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Staff Login</title>
	<meta name = "viewport" content="width=device-width, initial-scale=1.0">
	<link rel = "stylesheet" href="css/style.css">
  <link rel = "stylesheet" href="css/staffLoginStyle.css">
	<script src="http://kit.fontawesome.com/a076d05399.js"></script>
	<script src="http://code.jquery.com/jquery-3.4.1.js"></script>
	<script>
	$(document).ready(function(){
		$('#icon').click(function(){
			$('ul').toggleClass('show');
		});
	});
	</script>
</head>


<body>

	<?php include 'staffLoginSession.php'; ?>

	<?php

	if ($isLogin) {
		include 'verifyHTML.php';
	} else {
		include 'menu.php';
	}

	?>

	<!-- <nav class="head">
		<label class="logo">EDE Delivery</label>
		<ul>
			<li><a class="active" href="index.html">Home</a></li>
				<li><a href="Shipment.html">Shipping</a></li>
				<li><a href="tracking.html">Tracking</a></li>
				<li><a href="login.html">Sign In/UP</a></li>
				<li><a href="profile.html">Profile</a></li>
				<li><a href="staffLogin.html">Staff</a></li>
		</ul>
		<label id="icon">
			<i class="fas fa-bars"></i>
		</label>
	</nav> -->

<div class="staff-login">
	<h1>Staff Login</h1>
	<form action="staffLogin.php" method="POST" id="staffLoginForm">
		<p>Identify ID</p>
		<input type="text" name="staffID" placeholder="Staff ID">
		<p>Password</p>
			<input tpye="password" name="staffPassword" placeholder="Password">
			<button type="submit" form="staffLoginForm" value="Submit" name="submit">Login</button>
			<!-- 正式做會唔用href,宜家用住href黎show,所以click background會跳唔到form -->
		</form>
</div>


</body>
</html>
