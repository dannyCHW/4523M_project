<?php
        session_start();
    if($_SESSION['staffID'] != null)
    {
        unset($_SESSION['staffID']);     // unset $_SESSION variable for the run-time 
        session_unset();
    }

    echo "<script type='text/javascript'>
            alert('Log Out');
            window.location.href = 'staffLoginHTML.php';
            </script>";
?>
