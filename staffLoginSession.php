<?php
    $isLogin = false;
		session_start();


		if($_SESSION != null)
		{
			try{
				$staffID = $_SESSION['staffID'];
           	 	$isLogin = true;
			}catch(Exception $e){

			}

		}


	?>
