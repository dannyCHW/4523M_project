<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Login Page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/loginStyle.css">
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

	<h2>Sign In/Up EDE Account</h2>

	<div class="container" id="container">

		<!-- /signup table -->
		<div class="form-container sign-up-container">
			<form action="#">
				<h1>Create Account</h1>
				<button> <a href="registerHtml.php" style="color:white;">Sign Up</a></button>
			</form>
		</div>
		<!-- /signup table end-->

		<!-- /signup table-->
		<div class="form-container sign-in-container" id="nameform">
			<form action="login.php" method="POST" id="loginForm">
				<h1>Sign in</h1>
				<div class="social-container">
				</div>
				<input type="email" placeholder="Email" name="cusEmail" style="width: 100%;" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="following order: Wrong Email Or Password Format" required />
				<input type="password" placeholder="Password" name="cusPassword" style="width: 100%;" required />
				<a href="#">Forgot your password?</a>
				<button type="submit" form="loginForm" value="Submit" name="submit">Sign In</button>
			</form>
		</div>
		<!-- /login table end-->

		<div class="overlay-container">

			<!-- /Signup to login-->
			<div class="overlay">
				<div class="overlay-panel overlay-left">
					<h1>Welcome back!</h1>
					<p>If you already have a EDE account, pleasse click the sign in button</p>
					<button class="ghost" id="signIn">Sign In</button>
				</div>

				<!-- /Login to signup-->
				<div class="overlay-panel overlay-right">
					<h1>Good to see you!</h1>
					<p>Enter your details and start journey with us</p>
					<button class="ghost" id="signUp">Sign Up</button>
				</div>

			</div>
		</div>
	</div>
	<script src="main.js"></script>

</body>

</html>