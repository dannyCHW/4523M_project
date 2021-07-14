<?php
    if($_SESSION['staffID'] != null)
    {
        session_unset();     // unset $_SESSION variable for the run-time
        session_destroy();

    }

    echo "<script type='text/javascript'>
            alert('Log Out');
            window.location.href = 'staffLoginHTML.php';
            </script>";
?>
