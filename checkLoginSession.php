<?php
$isLogin = false;
session_start();


if ($_SESSION != null) {
	try {
		if (isset($_SESSION['customerEmail'])) {
			$cusEmail = $_SESSION['customerEmail'];
			$isLogin = true;
		}
	} catch (Exception $e) {
	}
}
