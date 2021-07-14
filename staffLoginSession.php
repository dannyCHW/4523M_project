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
      $staffLogin = true;
      $stfID = $_SESSION['staffID'];
    }

	?>
