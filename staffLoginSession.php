<?php
    $staffLogin = false;
		session_start();

			try{
				$staffID = $_SESSION['staffID'];
           	 	$staffLogin = true;
			}catch(Exception $e){


		}


	?>
