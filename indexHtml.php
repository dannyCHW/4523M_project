<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>First Page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/style.css">
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

	<div class="slider">
	</div>


	<div class="Mian_Title">
		<h1>Our services are all over the world！</h1>
		<h3>Register your account now and use EDE Delivery to send your shipments instantly to get discounts.</h3>
		<h3><a href="login.html" class="start">Delivery Now</a></h3>
	</div>

	<div class="subTitle">
		<h1>Consignment is easy! Just complete three simple steps:</h1>
	</div>


	<div class="allStep" style="width:100%; height:100%;">
		<div class="step1" align="center" style="float:left; width:33.3%;">
			<h3> Step 1</h3>
			<img src="user.jpg" width=20%;>
			<h3>Create Account</h3>
		</div>

		<div class="step2" align="center" style="width:33.3%; float:left;">
			<h3> Step 2</h3>
			<img src="user.jpg" width=20%;>
			<h3>Create EDE ID</h3>
		</div>

		<div class="step3" align="center" style="float:right; width:33.3%;">
			<h3> Step 3</h3>
			<img src="step3.jpg" width=20%;>
			<h3>Ship Online</h3>
		</div>
</body>


</html>