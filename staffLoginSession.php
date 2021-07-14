<?php
    if(!isset($_SESSION))
    {
        session_start();
    }
    else
    {
        session_destroy();
        session_start();
    }

    if($_SESSION != null){
      session_unset();
      $staffID = $_SESSION['staffID'];
      $staffLogin = true;
    }else {
      $staffID = $_SESSION['staffID'];
      $staffLogin = true;
    }

	?>
